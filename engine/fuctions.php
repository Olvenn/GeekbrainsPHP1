<?php

// include "config.php";
const SERVER = "localhost";
const DB = "user_gallery";
const LOGIN = "root";
const PASS = "";


	function getUserTitle($picture) {

		$tempEnd = explode('_', $picture);			//разбиваем имя файла по точке и получаем массив
		$tempEnd = strtolower(end($tempEnd));	//нас интересует последний элемент массива - расширение
		$tempEnd = explode('.', $tempEnd);
		$name = ucfirst(array_shift($tempEnd));
		return $name;
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
		$fileHash  =  hash_file('md5', $_FILES['picture']['tmp_name']);
		$userTitle = getUserTitle($file['name']);
		echo $fileHash . "<br>";
		echo $userTitle . "<br>" ;
		// while($data = mysqli_fetch_assoc($res)){
		// 	echo "Автомобиль ".$data['title']." стоит ".$data['price']."<br>";
		// }

		$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or 
			die("Ошибка соединения с базой данных");
			
		$sql = "INSERT INTO gallery (title, hash_title, user_title, `count`) VALUES ('$newName', '$fileHash', '$userTitle', 0)";
			
		if (mysqli_query($connect, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}
		mysqli_close($connect);

		create_thumbnail($file['tmp_name'], 'img/small/' . $newName, $width, $height);
		move_uploaded_file($file['tmp_name'], 'img/big/' . $newName);

	}
?>