<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Luka Cvrk (www.solucija.com)" />
	<link rel="stylesheet" href="main.css" type="text/css" />
	<?php
	$title = "minimalistica";
	$dateYear = date('Y');
	$titleH1 = "minimalisticaNew";
	echo "<title>$title</title>";
	?>
	<style>

		.myh3 {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			color: #333366;
			margin-bottom: 0;
			font-size: 30px;
		}
		.wrapper {
			margin-left: 100px;
			font-size: 20px;
		}
		hr {
		margin: 20px 0;
		}
	</style>

</head>

<body>

<div class="wrapper">
		<?php
		echo "<hr>";

		echo "<h4 class = \"myh3\">Task 1</h4>";

		$a = -10;
		$b = -1;
		echo "<i>Первая переменная - </i>" . $a . "<br>";
		echo "<i>Вторая переменная - </i>" . $b . "<br>";
		echo "<br>";

		if ($a >= 0 && $b >= 0) {
			echo "Переменные больше или = 0 находим их разницу - результат " . ($a - $b) . "<br>";
		} else if ($a < 0 && $b < 0) {
			echo "Переменные меньше 0 находим их произведение - результат " . ($a * $b) . "<br>";
		} else {
			echo "Переменные разные по знаку находим их сумму - результат " . ($a + $b) . "<br>";
		}
		

		echo "<hr>";
		
		echo "<h4 class = \"myh3\">Task 2</h4>";
		$a = 5;
		switch ($a) {
			case '0':
				echo '0; ';

			case '1':
				echo '1; ';

			case '2':
				echo '2; ';

			case '3':
				echo '3; ';

			case '4':
				echo '4; ';

			case '5':
				echo '5; ';

			case '6':
				echo '6; ';

			case '7':
				echo '7; ';

			case '8':
				echo '8; ';

			case '9':
				echo '9; ';

			case '10':
				echo '10; ';

			case '11':
				echo '11; ';

			case '12':
				echo '12; ';

			case '13':
				echo '13; ';

			case '14':
				echo '14; ';

			case '15':
				echo '15';
				break;

			default:
				echo 'Число не находится в диапазоне от 0 до 15';
				break;
		};

		echo "<hr>";

		echo "<h4 class = \"myh3\">Task 3</h4>";

		$x = 2;
		$y = 4;
		echo "<i>Первая переменная - </i>" . $x . "<br>";
		echo "<i>Вторая переменная - </i>" . $y . "<br>";
		echo "<br>";

		function summ($x, $y)
		{
			return $x + $y;
		}

		function diff($x, $y)
		{
			return $x - $y;
		}

		function multipl($x, $y)
		{
			return $x * $y;
		}

		function div($x, $y)
		{
			if ($y === 0) {
				echo 'На ноль делить нельзя! ' . '<br>';
			} else {
				return $x / $y;
			}
		}
		echo 'Cумма чисел равна: ' . summ($x, $y) . '<br>';
		echo 'Разность чисел равна: ' . diff($x, $y) . '<br>';
		echo 'Произведение чисел равно: ' . multipl($x, $y) . '<br>';
		echo 'Частное чисел равно: ' . div($x, $y) . '<br>';

		echo "<hr>";
		echo "<h4 class = \"myh3\">Task 4</h4>";


		function getСalculation($arg1, $arg2, $operation)
		{
			echo "<i>Первая переменная - </i>" . $arg1 . "<br>";
			echo "<i>Вторая переменная - </i>" . $arg2 . "<br>";
			echo "<br>";
			if ($arg2 === 0) {
				echo 'На ноль делить нельзя! ' . '<br>';
				echo 'Замените вторую переменную ' . '<br>';
			} else if(!(is_numeric($arg1) && is_numeric($arg2))) {
				echo 'Вводить можно только числовы значения' . '<br>';
			} else {
				switch ($operation) {
					case '+':
						echo 'Cумма чисел равна: ' . summ($arg1, $arg2) . '<br>';
						break;
					case '-':
						echo 'Разность чисел равна: ' . diff($arg1, $arg2) . '<br>';
						break;
					case '*':
						echo 'Произведение чисел равно: ' . multipl($arg1, $arg2) . '<br>';
						break;
					case '/':
						echo 'Частное чисел равно: ' . div($arg1, $arg2) . '<br>';
						break;
					default:
						echo 'Оператор введен не верно!';
						break;
				}
			}

			// if ($z == "+") {
			// 	echo 'Cумма чисел равна: ' . ($x + $y) . '<br>';
			// } else if($z == "-") {
			// 	echo 'Разность чисел равна: ' . ($x - $y) . '<br>';
			// }  else if($z == "*") {
			// 	echo 'Произведение чисел равно: ' . ($x * $y) . '<br>';
			// }	else if($z == "/") {
			// 	if ($y === 0) {
			// 		echo 'На ноль делить нельзя! ' . '<br>';
			// 	} else {
			// 	echo 'Частное чисел равно: ' . ($x / $y) . '<br>';
			// 	}
			// }
		}

		getСalculation(5, '8', "/");

		echo "<hr>";
		echo "<h4 class = \"myh3\">Task 5</h4>";
		$date = date('Y');
		echo "<footer>" . " Сейчас  " . $date . " год </footer>";


		echo "<hr>";
		echo "<h4 class = \"myh3\">Task 6</h4>";

		function power($val, $pow)
		{

			$result = $val;
			if ($pow === 0) {
				$result = 'Возведение в нулевую степень = 1';
			} else if ($pow > 1) {
				$result *= power($val, ($pow - 1));
			}
			return $result;
		}
		$val = 3;
		$pow = 4;
		echo "<i>Число - </i>" . $val . "<br>";
		echo "<i>Степень - </i>" . $pow . "<br>";
		echo "<br>";
		echo "Результат - :" . power($val, $pow);

		echo "<hr>";
		echo "<h4 class = \"myh3\">Task 7</h4>";
		date_default_timezone_set("UTC"); 
		$time = time();
		$time += 3 * 3600;

		// $hour = date("H", $time);
		// $min = date("i", $time);
		// $sec = date("s", $time);
			$hour =3;
		$min = 21;
		$sec = 76;
		$hourEnding = ['час', 'часa', 'часов'];
		$minEnding = ['минута', 'минуты', 'минут'];
		$secEnding = ['секунда', 'секунды', 'секунд'];


		function findEnd ($checkNumber, $arrayOfEndings){

			$temp = $checkNumber % 10;
	
			if($temp >= 5) {
				$endig = $arrayOfEndings[2];
			
			} else if($temp > 1 && $temp < 5) {
				$endig = $arrayOfEndings[1];
			} else if ($temp = 1) {
				$endig = $arrayOfEndings[0];
			} else {
				$endig = $arrayOfEndings[2];
			} 
			
			return $endig;
		};
		echo "<br>";

		echo "Сейчас " . $hour. " " . findEnd($hour, $hourEnding) . " " .
		$min. " " . findEnd($min, $minEnding) . " " .
		$sec. " " . findEnd($sec, $secEnding);

		echo "<br>";
		echo "<hr>";
		?>


</div>







<div id="content">
		<?php
		echo "<h1>$titleH1</h1>"
		?>
<ul id="menu">
	<li><a href="#">home</a></li>
	<li><a href="#">archive</a></li>
	<li><a href="#">contact</a></li>
</ul>


<div class="post">
	<div class="details">
		<h2><a href="#">Nunc commodo euismod massa quis vestibulum</a></h2>
		<p class="info">posted 3 hours ago in <a href="#">general</a></p>

	</div>
	<div class="body">
		<p>Nunc eget nunc libero. Nunc commodo euismod massa quis vestibulum. Proin mi nibh, dignissim a pellentesque at, ultricies sit amet sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel lorem eu libero laoreet facilisis. Aenean placerat, ligula quis placerat iaculis, mi magna luctus nibh, adipiscing pretium erat neque vitae augue. Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at ipsum.</p>
	</div>
	<div class="x"></div>
</div>

<div class="col">
	<h3><a href="#">Ut enim risus rhoncus</a></h3>
	<p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
	<p>&not; <a href="#">read more</a></p>
</div>
<div class="col">
	<h3><a href="#">Maecenas iaculis leo</a></h3>
	<p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
	<p>&not; <a href="#">read more</a></p>
</div>
<div class="col last">
	<h3><a href="#">Quisque consectetur odio</a></h3>
	<p>Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus, rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit amet at.</p>
	<p>&not; <a href="#">read more</a></p>
</div>

<div id="footer">
	<p>Copyright &copy; <b><?=$date = date('Y')?></b> год <em>minimalistica</em> &middot; Design: Luka Cvrk, <a href="http://www.solucija.com/" title="Free CSS Templates">Solucija</a></p>
</div>
</div>
</body>

</html>