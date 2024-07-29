<?php

include '../config.php';

$id = $_GET['id'];

$deletequery = "delete from `apple` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:../apple.php');

?>