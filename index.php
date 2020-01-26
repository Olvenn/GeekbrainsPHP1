<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Интернет-магазин</title>
	<!-- <link rel="stylesheet" href="style/normalize.css"> -->

	<!-- <link rel="stylesheet" href="style/style.css"> -->
</head>
<style>
.wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 20px 10px;
}
.message {
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-size: 25px;
    font-weight: 500;
    color: rgb(125, 187, 33);
}
.messageGood {
    color: rgb(125, 187, 33);
}
.messageBad {
    color: red;
}
.messageName {
    color: blue;
}
.pictureItem {
    padding: 10px;
    border: 5px inset #ccc;
    margin: 5px;
}

body {font-family: Arial, Helvetica, sans-serif;}

.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.myImg:hover 
{opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    padding-top: 50px; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgba(0,0,0,0.9); 
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: auto;
    max-height: 90%;
    color: rgb(125, 187, 33);
/*max-height: 100vh;*/
}

/* Add Animation */
.modal-content {    
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 80px;
    color: #999;
    background-color: #ccc;
    padding: 10px;
    font-size: 40px;
    font-weight: bold;
    border-radius: 20px;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

.scalePicture {
    margin: 0 auto;
    width: 200px;
    text-align: center;
    position: relative;
    font-size: 15px;
    margin-top: 20px;
    color: white;
    text-decoration: none;
    text-shadow: 0 -1px 1px #222;
    user-select: none;
    padding: 10px;
    outline: none;
    border-radius: 1px;
    background: linear-gradient(to left, rgba(0,0,0,.3), rgba(0,0,0,.0) 50%, rgba(0,0,0,.3)), linear-gradient(#999, #999, #999);
    background-size: 100% 100%, auto;
    background-position: 50% 50%;
    box-shadow: inset rgb(91, 139, 212) 0 -1px 1px, inset 0 1px 1px rgb(126, 162, 204), rgb(25, 89, 150) 0 0 0 1px, #000 0 10px 15px -10px;
    transition: 0.2s;
}
input {
    font-size:20px;
    padding: 10px;
    background-color: #ccc;
}

.name {
    font-size: 17px;
    font-weight: 700;
    color: #666;
}

</style>
<body>

	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="12097152">
		<input  type="file" name="picture">
		<input type="submit" value="Загрузить файл!">
	</form>

	<?php
	$message = "";
	require_once 'engine/resizeImage.php';
	require_once 'engine/fuctions.php';

	// если была произведена отправка формы
	// $filePath  = $_FILES['picture'];

	if (isset($_FILES['picture'])) {

		function checkSubmit () {
		$check = can_upload($_FILES['picture']);		// проверяем, можно ли загружать изображение
		$pictureUserName = $_FILES['picture']['name'];

		if ($check === true) {

			make_upload($_FILES['picture']);			// загружаем изображение на сервер
			return "Файл успешно загружен!@|@Имя загруженного файла: $pictureUserName";
			} else {
				return "<strong>$check</strong>";			// выводим сообщение об ошибке
			}
		}
		$message =   checkSubmit(); 
	}

	function can_upload($file) 	{

		$filePathTmp  = $_FILES['picture']['tmp_name'];
		$errorCode = $_FILES['picture']['error'];

		echo"<br>";
		if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePathTmp)) { 

			// Массив с названиями ошибок
			$errorMessages = [
				UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
				UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
				UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
				UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
				UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
				UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
				UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
			];

			$unknownMessage = 'При загрузке файла произошла неизвестная ошибка.'; // Если в массиве нет кода ошибки	
			$outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
			echo ($outputMessage); // Выводим название ошибки
		}


		// если имя пустое, значит файл не выбран
		if ($file['name'] == '')
			return 'Вы не выбрали файл.';

		// если это не картинка, а какой-то то файл типа php 
		if	(!checkFileType($filePathTmp)) {
			return 'Можно загружать только изображения.'; 
		}

		// проверка изображений на максиальную высоту изображения 
		if (!checkSizesWidth($filePathTmp)) {
			return 'Высота изображения не должна превышать 1920 точек.';
		}

		// проверка изображений на максиальную ширину изображения		
		if (!checkSizesHeight($filePathTmp)) {
			return 'Ширина изображения не должна превышать 1200 точек.';
		}

		$mime = pathinfo($_FILES['picture']['name'])['extension']; //получаем расширение файла заказчика
		/* Вариант 2
		разбиваем имя файла по точке и получаем массив
		$getMime = explode('.', $file['name']);
		нас интересует последний элемент массива - расширение
		$mime = strtolower(end($getMime));
		*/

		$types = array('jpg', 'png', 'gif', 'jpeg');//массив допустимых расширений
		if (!in_array($mime, $types)) {
			return 'Недопустимый тип файла.';		// если расширение не входит в список допустимых
		}
		// проверка повторной загрузки изображений 
		if (!checkRepeatFile($filePathTmp)) {
			return "Такой файл уже загружен"; 
		}
			return true;
	}
	?>


	<?php
	$bigDir = 'img/big/';
	$smallDir = 'img/small/';
	$bigImages = scandir($bigDir);
	$smallImages = scandir($smallDir);

	if(!empty($bigImages) && !empty($smallImages)) {
	$arr = explode("@|@", $message);
	if (count($arr) != 1) {?>
		<div class="message messageGood">
			<?=$arr[0]?> 
		</div>
		<div class="message messageName">
			<?=$arr[1]?>
		</div>
<?php 
	} else { ?>
		</div>
		<div class="message messageBad">
		<?=$arr[0]?> 		<!-- Сообщение об ошибке -->
		</div>
	<?php
	}?>


	<div class="wrapper">
		<?php foreach ($smallImages as $key => $picture) : ?>
			<?php if($key > 1) : ?>
		
		<div class = "pictureItem">
			<a class = "bigSrc" href='<?=$bigDir . $picture;?>' target='_blank'>
				<img class = "myImg" src='<?=$smallDir . $picture;?>'>
			</a>
				<?php
				$temp = $picture;
				$tempEnd = explode('_', $temp);			//разбиваем имя файла по точке и получаем массив
				$tempEnd = strtolower(end($tempEnd));	//нас интересует последний элемент массива - расширение
				$tempEnd = explode('.', $tempEnd);
				$name = ucfirst(array_shift($tempEnd));
				?>
			<div class = "name">
				<?=$name?>
			</div>
			<div class = "scalePicture">
				Посмотреть увеличеное изображение.
			</div>
		</div>	

			<?php endif; ?>
			<?php endforeach; ?>

	</div>

		<div class="modal">
  			<div class="close">×</div>
  			<img class="modal-content">		 
		</div>
</div>
	 <?php }
	 	?>


<script src="js/script.js"></script>
</body>

</html>