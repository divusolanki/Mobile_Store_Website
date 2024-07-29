<?php

include '../config.php';

$id = $_GET['id'];

$deletequery = "delete from `samsung` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:../samsung.php');

?>