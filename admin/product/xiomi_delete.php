<?php

include '../config.php';

$id = $_GET['id'];

$deletequery = "delete from `xiomi` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:../xiomi.php');

?>