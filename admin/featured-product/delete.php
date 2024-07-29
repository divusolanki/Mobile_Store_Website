<?php

include '../config.php';

$id = $_GET['id'];

$deletequery = "delete from `featured-products` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:../featured-product.php');

?>