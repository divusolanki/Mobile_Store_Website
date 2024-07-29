<?php

include '../config.php';

$id = $_GET['id'];

$deletequery = "delete from `oneplus` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:../oneplus.php');

?>