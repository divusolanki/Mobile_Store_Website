<?php

include '../config.php';

$id = $_GET['id'];

$deletequery = "delete from `oppo` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:../oppo.php');

?>