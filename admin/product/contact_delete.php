<?php

include '../config.php';

$id = $_GET['id'];

$deletequery = "delete from `contactus` where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:../contact.php');

?>