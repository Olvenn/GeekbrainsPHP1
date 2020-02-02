<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Интернет-магазин</title>
	<!-- <link rel="stylesheet" href="style/normalize.css"> -->

	<!-- <link rel="stylesheet" href="style/style.css"> -->
</head>
<style>
	input {
		font-size: 20px;
		padding: 10px;
		background-color: #ccc;
		margin-bottom: 10px;
	}

	.text,
	.selectOp,
	.btn {
		font-size: 24px;
		font-weight: 700;
		color: #666;
	}

	.selectOp {
		display: inline-block;
	}

	select {
		font-size: 24px;
	}

	.result2 {
		width: 300px;
		height: 60px;
		font-size: 20px;
		line-height: 60px;
		font-weight: 700;
		text-align: center;
		color: #000;
		border: 2px solid rgba(26, 22, 153, 0.5);
		margin-top: 20px;
		border-radius: 10px;
		background-color: rgba(108, 28, 141, 0.1);
	}

	.single {
		width: 200px;
		padding: 10px;
		font-size: 18px;
		font-weight: 700;
		text-align: center;
		color: #fff;
		background-image: radial-gradient(rgb(9, 21, 156), rgb(26, 22, 153), rgb(42, 23, 151), rgb(59, 25, 148), rgb(75, 26, 146), rgb(92, 27, 143), rgb(108, 28, 141), rgb(125, 29, 138), rgb(141, 30, 136), rgb(158, 32, 133), rgb(174, 33, 131), rgb(191, 34, 128));
		margin: 20px 0;
	}

	.formCover {
		width: 600px;
		display: flex;
		justify-content: space-between;
	}

	.wrapDiv {
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.actionFormAct {
		font-size: 20px;
		color: rgb(26, 22, 153);
	}
</style>

<body>

	<?php

	include "config.php";
	$sql = "select * from calc";
	$res = mysqli_query($connect, $sql);

	$data = mysqli_fetch_assoc($res);
	$a = $data['action'];
	$x = $data['number_one'];
	$y = $data['number_two'];
	$action = $data['exponent'];
	// $res = $x . $a . $y;

	if (isset($_GET["action"]) ? htmlspecialchars($_GET["action"]) : "") {
		$a = $_GET["action"];
	} else {
		$a = $a;
	};

	if (isset($_GET['x']) ? (int) ($_GET['x']) : "") {
		$x = (float) $_GET["x"];
	} else {
		$x = $x;
	};

	if (isset($_GET['y']) ? (int) ($_GET['y']) : "") {
		$y = (float) $_GET["y"];
	} else {
		$y = $y;
	};

	if (isset($_GET['exponent']) ? (int) ($_GET['exponent']) : "") {
		$action = (float) $_GET["exponent"];
	} else {
		$action = $action;
	};

	// if (isset($_GET['res']) ? (int)($_GET['res']) : ""){
	// 		$result=(float)$_GET["res"];
	// 		} else {
	// 		$result= $res;
	// 		};
	// 		echo "pre";
	// 		print_r($_GET);
	// 		echo "/pre";

	switch ($a) {
		case "plus":
			$result = $x + $y;
			$pl = "selected";
			break;
		case "-":
			$result = $x - $y;
			$sb = "selected";
			break;
		case "*":
			$result = $x * $y;
			$ml = "selected";
			break;
		case "/":
			if ($y != 0) {
				$result = round(($x / $y), 2);
				$dv = "selected";
			} else {
				$result = "деление на ноль";
			};
			break;

		default:
			$result = $res;
	};

	switch ($action) {
		case "Возведение в степень":
			$result2 =  pow($x, $y);
			break;
		case "Корень квадратный":
			$result2 = "1-e число " . round(sqrt($x), 2) . " - "  . "2-e число " . round(sqrt($y), 2);
			break;
		case "Процент от деления":
			$result2 = round(($x % $y), 2);
			break;
		default:
			$result2 = $result2;
	};

	?>
	<div class="formCover">
		<form method="get" enctype="multipart/form-data">
			<form action="calculator.php" method=get>
				<div class="text">Введите первое число: </div>
				<input class="dataInput" type=text name="x" value="<?= $x ?>"><br>
				<div class="text">Введите второе число: </div>
				<input class="dataInput" type=text name="y" value="<?= $y ?>"><br>
				<div class="wrap">
					<div class="selectOp dataInput">Выберите действие:</div>
					<select name=action id="id_of_select">
						<option value="plus" <?= $pl ?>>+</option>
						<option value="-" <?= $sb ?>>-</option>
						<option value="*" <?= $ml ?>>*</option>
						<option value="/" <?= $dv ?>>/</option>

					</select>
				</div>
				<br />
				<div class="text">Результат: </div>
				<input class="dataInput" type=text name="res" value="<?= $result ?>"><br>
				<input class="btn" type=submit value="Получить результат">
			</form>
			<form class="formAct" method="get" enctype="multipart/form-data">
				<div class="wrapDiv">
					<div class="single">Возведение в степень</div>
					<div class="single">Корень квадратный</div>
					<div class="single">Процент от деления</div>
					<div class="actionFormAct"><?= $action ?></div>
					<div class="result2"><?= $result2;  ?></div>
				</div>
			</form>
	</div>
	<?php
	?>
</body>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
	let single = document.querySelectorAll(".single");

	console.log(single);
	let innerText = "";

	single.forEach(function(item) {
		item.addEventListener("click", function() {
			let formAtc = document.querySelector(".formAct");
			formAtc.submit();
			innerText = item.innerHTML;
			let query2 = "exponent=" + innerText

			function send() {
				$.ajax({
					type: "POST",
					url: "server2.php",
					data: query2,
					success: function(answer) {
						alert(answer);
					}
				});
			}
			send();
		});
	});


	let btn = document.querySelector(".btn");
	btn.addEventListener("click", function() {
		let dataInput = Array.from(document.querySelectorAll(".dataInput"));
		let dataInput2 = document.getElementById('id_of_select');
		let opt = document.querySelectorAll("option");
		let sign = dataInput2[dataInput2.selectedIndex].value;
		let query = "number_one=" + dataInput[0].value + "&number_two=" + dataInput[1].value + "&action=" + sign + "&res=" + dataInput[3].value;

		function send() {
			$.ajax({
				type: "POST",
				url: "server.php",
				data: query,
				success: function(answer) {
					alert(answer);
				}
			});
		}
		send();
	});
</script>

</body>

</html>