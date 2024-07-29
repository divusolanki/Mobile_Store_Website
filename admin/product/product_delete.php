<?php

include '../config.php';

$id = $_GET['id'];

$deletequery = "delete from `product` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:../product.php');

?>