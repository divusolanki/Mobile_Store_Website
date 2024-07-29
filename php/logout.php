<?php
@include 'config.php';

$query = "DELETE FROM `cart`";
$queryrun=mysqli_query($con,$query) or die(mysqli_error($con));

session_unset();
session_destroy();

header('location:../index.php');
   
?>