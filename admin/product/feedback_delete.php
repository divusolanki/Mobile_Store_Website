<?php

include '../config.php';

$id = $_GET['id'];

$deletequery = "delete from `feedback` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:../feedback.php');

?>