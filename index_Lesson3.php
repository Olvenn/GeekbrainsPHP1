<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Интернет-магазин</title>
	<link rel="stylesheet" href="style/normalize.css">
	<style>
		td {
			border: 1px solid black;
			padding: 5px;
			color: brown;
		}

		.answer {
			width: auto;
			display: inline-block;
			border: 2px solid green;
			padding: 5px;
			margin: 10px 0;
		}

		.menu {
			display: flex;
		}

		.submenu {
			position: absolute;
			display: none;
			top: 30px;
			left: -10px;
			right: 10px;
		}

		.dropdown:hover .submenu {
			display: inherit;
		}

		.menu li {
			list-style-type: none;
			padding: 5px 10px;
			background-color: blueviolet;
			border: 2px solid #ccc;
			color: #ccc;
		}


		.menu .dropdown {
			position: relative;
			width: 180px;
			background-color: blue;
		}

		li {
			list-style-type: none;
		}

		.region {
			font-size: 1.2em;
			font-weight: 800;
			color: #666;
		}

		.town {
			color: #777;
			padding-left: 20px;
		}
	</style>
	<link rel="stylesheet" href="style/style.css">
</head>

<body>
	<?php
	echo "Task 1" . '<br>';

	$numStart = 1;
	$numEnd = 100;

	echo '<table>';
	echo '<tr>';
	while ($numStart < $numEnd) {
		if ($numStart % 3 == 0) {
			echo '<td>' . $numStart . '</td>';
		}
		$numStart++;
	}
	echo '</tr>';
	echo '</table>';

				echo '<hr>';
				echo "Task 2" . '<br>';
				echo "<br>";

	$i = 0;
	$num = 10;

	do {
		if ($i == 0) {
			echo "<span style='color:#ff0000'>$i - это ноль</span>";
		} else if ($i % 2 != 0) {

			echo "<span style='color:blue'>$i - нечетное число</span>";
		} else   echo "$i - четное число";
		$i++;
		echo "<br>";
	} while ($i <= $num);

				echo '<hr>';
				echo "Task 3" . '<br>';
				echo "<br>";

	$regions = [
		'Московская область' => [
			'Москва',
			'Зеленоград',
			'Клин',
			'Коломна'
		],
		'Ленинградская область' => [
			'Санкт-Петербург',
			'Всеволожск',
			'Павловск',
			'Кронштадт'
		],
		'Рязанская область' => [
			'Рязань',
			'Касимов',
			'Сасово',
			'Скопин'
		]
	];
	?>

	<?php foreach ($regions as $key => $town) : ?>
		<ul>
			<li class="region"><?= $key; ?>:
				<?php foreach ($town as $key => $item) : ?>
			<li class="town"><?= $item; ?>,
			<?php endforeach; ?>
			</li>
		</ul>
	<?php endforeach; ?>

	<?php
	echo "<pre>";
	print_r($regions);
	echo "</pre>";

				echo '<hr>';
				echo "Task 4" . '<br>';
				echo "<br>";

	$rus = 'абвгдеёжзийклмнопрстуфхцчшщыэюяьЬъЪАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЫЭЮЯ';
	$eng = [
		"a", "b", "v", "g", "d", "e", "yo", "j", "z", "i", "i", "k", "l", "m", "n", "o", "p", "r", "s", "t", "y", "f", "h", "tc", "ch", "sh", "sch", "i", "e", "u", "ya", "'", "'", "'", "'", "A", "B", "V", "G", "D", "E", "YO",
		"J", "Z", "I", "I", "K", "L", "M", "N", "O", "P", "R", "S", "T", "Y", "F", "H", "C", "CH", "SH", "SCH", "I", "E", "U", "YA"
	];
	function createArray($rus, $eng) {
		$rusEng = [];
		foreach ($eng as $key => $value) {
			$item = mb_substr($rus, $key, 1, 'utf-8');
			$rusEng[$item] = $value;
		}
		return $rusEng;
	}
	print_r(createArray($rus, $eng));
	echo "<br>";

	function getTransliteration($text, $rus, $eng)	{
		echo strtr($text, createArray($rus, $eng));
	}
	echo '<div class = "answer">' . "Исходный текст - ";
	echo $text = "Привет мир";
	echo "<br>";
	echo "<b>"  . "Текст английскими буквами - ";
	getTransliteration($text, $rus, $eng);
	echo "</b>";
	echo '</div>';

				echo '<hr>';
				echo "Task 5" . '<br>';
				echo "<br>";

	function replaceWhitespace($text)
	{
		echo str_ireplace(" ", "_", $text);
	}

	$text = "   Функция, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку";

	echo '<div class = "answer">' . "Исходный текст - ";
	echo $text;
	echo "<br>";
	echo "<b>"  . "Измененный текст - ";
	echo replaceWhitespace($text);
	echo "</b>";
	echo '</div>';

				echo '<hr>';
				echo "Task 6" . '<br>';
				echo "<br>";

	$menu = [
		'Главная', 'Статьи', 'Изучение PHP',
		'Функции PHP' => ["Перечень функций PHP по категориям", "Перечень функций PHP по алфавиту", "Стандартные функции PHP", "Пользовательские функции в PHP"],
		'FAQ', 'PHP скрипты', 'MySQL', 'Установка', 'Учебники', 'Уроки', 'Download', 'Форум'
	];

	print_r($menu);
	echo is_array($menu[2]);

	echo "<ul class = 'menu'>";
	foreach ($menu as $key => $value) {
		if (is_int($key)) {
			echo "<li>";
			echo $value;
			echo "</li>";
		} else {
			echo "<li class = 'dropdown'>";
			echo $key;
			echo "<ul class = 'submenu'>";
			foreach ($value as $key => $item) {
				echo "<li>";
				echo $item;
				echo "</li>";
			}
			echo "</ul>";
			echo "</li>";
		}
	}
	echo "</ul>";
	echo "<div> </div>";

				echo '<hr>';
				echo "Task 7" . '<br>';
				echo "<br>";

	for ($i = 0; $i < 10; print $i . " ", $i++);


				echo '<hr>';
				echo "Task 8" . '<br>';
				echo "<br>";

	foreach ($regions as $my_key => $region) {
		echo "<b>" . $my_key . "</b><br/>";
		foreach ($region as $city) {
			if (mb_substr($city, 0, 1) == "К") {
				echo "$city<br/>";
			}
		}
	}

				echo '<hr>';
				echo "Task 9" . '<br>';
				echo "<br>";


	function replaceText($text,$rus, $eng)
	{
		$text = trim($text);
		$text = strtr($text, createArray($rus, $eng));
		echo str_ireplace(" ", "_", $text);
	}

	$text = " Функция, которая заменяет в строке пробелы на подчеркивания, 
меняет русские символы на английские и возвращает видоизмененную строчку";

	echo '<div class = "answer">' . "Исходный текст - ";
	echo "<pre>";
	echo $text;
	echo "</pre>";

	echo "<pre><b>"  . "Измененный текст - ";
	echo replaceText($text,$rus, $eng);
	echo "</b> </pre>";
	echo '</div>';

	?>


</body>

</html>