<?php

include 'php/config.php';

$id = $_GET['id'];

$deletequery = "delete from `cart` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location: cart.php');

?>