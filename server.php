<?php
include "config.php";
$number_one = $_POST['number_one'];
$number_two = $_POST['number_two'];
$action = $_POST['action'];
$res = $_POST['res'];
echo $number_one;
echo $number_two;
echo $res;
echo $action;

$sql = "update calc set `number_two`=$number_two, `number_one`=$number_one, `res` = $res, `action` = \"$action\"";
if(mysqli_query($connect,$sql)){
    echo "Data success updated!";
}