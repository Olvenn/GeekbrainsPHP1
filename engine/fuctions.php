<?php
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

	function make_upload($file)	{
		$newName =  time() . "_" . $file['name']; // формируем уникальное имя картинки: случайное число и name
		$image = getimagesize($file['tmp_name']); //Получаем размеры файла
		// $width  = $image[0] *.3;
		// $height = $image[1] *.3;
		$widthTemp  = $image[0];
		$height = 200;
		$ratio = $height / $image[1];
		$width = $widthTemp * $ratio;
		create_thumbnail($file['tmp_name'], 'img/small/' . $newName, $width, $height);
		move_uploaded_file($file['tmp_name'], 'img/big/' . $newName);
		}
?>