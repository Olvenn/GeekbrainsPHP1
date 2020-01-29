<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Интернет-магазин</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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

	body {
		font-family: Arial, Helvetica, sans-serif;
	}

	.myImg {
		border-radius: 5px;
		cursor: pointer;
		transition: 0.3s;
	}

	.myImg:hover {
		opacity: 0.7;
	}

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
		background-color: rgba(0, 0, 0, 0.9);
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
		from {
			transform: scale(0)
		}

		to {
			transform: scale(1)
		}
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
		background: linear-gradient(to left, rgba(0, 0, 0, .3), rgba(0, 0, 0, .0) 50%, rgba(0, 0, 0, .3)), linear-gradient(#999, #999, #999);
		background-size: 100% 100%, auto;
		background-position: 50% 50%;
		box-shadow: inset rgb(91, 139, 212) 0 -1px 1px, inset 0 1px 1px rgb(126, 162, 204), rgb(25, 89, 150) 0 0 0 1px, #000 0 10px 15px -10px;
		transition: 0.2s;
	}

	input {
		font-size: 20px;
		padding: 10px;
		background-color: #ccc;
	}

	.name {
		display: flex;
		justify-content: space-between;
		padding: 5px 10px;
		font-size: 17px;
		font-weight: 700;
		color: #666;
	}

	.list-group-item {
		color: rgb(230, 94, 94);
	}
</style>

<body>

	<form method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="12097152">
		<input type="file" name="picture">
		<input type="submit" value="Загрузить файл!">
	</form>

	<?php
	$message = "";
	require_once 'engine/resizeImage.php';
	require_once 'engine/fuctions.php';
	require_once 'engine/check.php';
	include "config.php";
	include "db/db.php";

	// если была произведена отправка формы
	// $filePath  = $_FILES['picture'];

	if (isset($_FILES['picture'])) {

		function checkSubmit()
		{
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
	?>


	<?php
	$bigDir = 'img/big/';
	$smallDir = 'img/small/';
	$bigImages = scandir($bigDir);
	$smallImages = scandir($smallDir);


	echo "<pre>";
	print_r($data);

	echo "</pre>";

	if (!empty($bigImages) && !empty($smallImages)) {
		$arr = explode("@|@", $message);
		if (count($arr) != 1) { ?>
			<div class="message messageGood">
				<?= $arr[0] ?>
			</div>
			<div class="message messageName">
				<?= $arr[1] ?>
			</div>
		<?php
		} else { ?>
			</div>
			<div class="message messageBad">
				<?= $arr[0] ?>
				<!-- Сообщение об ошибке -->
			</div>
		<?php
		}



		?>


		<div class="wrapper">

			<?php $arrPic = getArrPicBD($connect);
			foreach ($arrPic as $key => $pictures) : ?>

				<div class="pictureItem">
					<a class="bigSrc" href='<?= $bigDir . $pictures['title']; ?>' target='_blank'>
						<img class="myImg" src='<?= $smallDir . $pictures['title']; ?>'>
					</a>

					<div class="name">
						<?= $pictures['user_title']; ?>

						<div class="list-group-item" href="#">
							<span class="span" id=<?= $pictures['id']; ?>><?= $pictures['count']; ?></span>

							<i class="fa fa-heart fa-fw" aria-hidden="true"></i></div>
					</div>

					<div class="scalePicture">
						Посмотреть увеличеное изображение.
					</div>
				</div>
			<?php endforeach; ?>
			}
		</div>

		<div class="modal">
			<div class="close">×</div>
			<img class="modal-content">
		</div>
		</div>
	<?php }
	?>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		let images = document.querySelectorAll(".scalePicture");
		let countPicSP = Array.from(document.querySelectorAll(".span"));

		let countPicNL = document.querySelectorAll(".vvkk");

		let countPic = Array.from(countPicNL);

			
			images.forEach(function(el, key) {
			el.addEventListener("click", function() {
				function countForClick() {
					let countPicItem =  countPicSP[key];
					// console.log(countPic);
					let countVal = countPicSP[key].innerHTML;
					console.log(countVal);
					let countId = countPicSP[key].id;
					// console.log(countId);
					countVal++;
					countPicSP[key].innerHTML = countVal;

			
					let query = "id=" + countId + "&count=" + countVal;
					$.ajax({
						type: "POST",
						url: "server.php",
						data: query,
						success: function(answer) {
							alert(answer);
						}
						
					});
				}
				countForClick();
				});
			});

	
				
	</script>
	<script src="js/script.js"></script>
</body>

</html>