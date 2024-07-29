<?php
    require '../php/config.php';
    //require 'header.php';
    session_start();
    $image=$_GET['image'];
    $name=$_GET['name'];
    $price=$_GET['price'];
    $add_to_cart_query="insert into `cart`(image,name,price) values ('$image','$name','$price')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: ../home.php');

    if(mysqli_num_rows($add_to_cart_result) > 0){
        echo "product already add";
    }
    else{
        echo "hii";
    }
?>