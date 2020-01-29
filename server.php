<?php
include "config.php";
$id = $_POST['id'];
$newcount = $_POST['count'];

$sql = "update gallery set count=$newcount where id=$id";
if(mysqli_query($connect,$sql)){
    echo "Data success updated!";
}