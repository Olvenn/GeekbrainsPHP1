<?php
include 'config.php';

function getArrPicBD ($connect) {
$sql = "select * from gallery";
$res = mysqli_query($connect, $sql);
$rez = mysqli_query($connect, $sql);
$arrr = [];
while ($data = mysqli_fetch_assoc($rez)) {

	array_push($arrr, $data);
}
return $arrr;
}

?>