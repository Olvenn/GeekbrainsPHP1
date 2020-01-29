<?php
    require_once 'check.php';

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

function getUserPicName($picture) {
    $temp = $picture;
    $tempEnd = explode('_', $temp);		//разбиваем имя файла по точке и получаем массив
    $tempEnd = strtolower(end($tempEnd));	//нас интересует последний элемент массива - расширение
    $tempEnd = explode('.', $tempEnd);
    $name = ucfirst(array_shift($tempEnd));
    return $name;
    }
?>