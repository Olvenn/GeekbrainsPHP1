<?php
include "config.php";
$exponent = $_POST['exponent'];

echo $exponent;

$sql = "update calc set `exponent`= \"$exponent\"";
if(mysqli_query($connect,$sql)){
    echo "Data success updated!";
}