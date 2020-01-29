<?php
	function can_upload($file) 	{

		$filePathTmp  = $_FILES['picture']['tmp_name'];
		$errorCode = $_FILES['picture']['error'];

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

	function checkRepeatFile($filePathTmp)  {
		$newHashFile = hash_file('md5', $filePathTmp);
		$file = file_get_contents("hash.txt");
		$hashArray = explode("@|@", file_get_contents("hash.txt"));
		$hashStorage = 'hash.txt';
		if (!in_array($newHashFile, $hashArray)) {
			file_put_contents($hashStorage, $newHashFile  . "@|@", FILE_APPEND);
			return true;
		}
	}

	function checkFileType($filePathTmp) {
		$fi = finfo_open(FILEINFO_MIME_TYPE);		// Определяем настоящий MIME-тип картинки 
		$mimes = (string) finfo_file($fi, $filePathTmp);		// Получим MIME-тип
		finfo_close($fi);		// Закроем ресурс
		if (strpos($mimes, 'image') !== false) {		// Проверим ключевое слово image (image/jpeg, image/png и т. д.)
			return true;
			} 
		};

		function checkSizesWidth($filePathTmp) { //    Проверяем не превышает ли ширина изображения разрешенной
			$image = getimagesize($filePathTmp); //Получаем размеры файла
			$limitWidth  = 1920;
			if ($image[0] < $limitWidth) {
			   return true;
			}
		 }
		 
		 function checkSizesHeight($filePathTmp) { //    Проверяем не превышает ли высота изображения разрешенной
			$image = getimagesize($filePathTmp); //Получаем размеры файла
			$limitHeight = 1200;
			if ($image[1] < $limitHeight) {
			   return true;
			}
		}
?>