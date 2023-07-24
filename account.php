<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>Cart | Mobile.com</title>
    <style>
        h1{
            margin-left: 15%;
            margin-top: 5%;
        }
        .btn{
            margin-left: 15%; 
            margin-top: 5%;
            display: inline-block;
            background: coral;
            color: #fff;
            padding: 8px 30px;
            border-radius: 30px;
            cursor: pointer; 
        }
        .btn:hover{
            color: black;
        }
        .btn:last-child{
            margin-left: 25%;
            margin-top: -5%;
        }
    </style>
</head>
<body>
<?php
include "header.html";
?>

<h1>Hello, User</h1>

<button class="btn" name="shop">Shop</button>
<form action="php/logout.php" method="post">
<button class="btn" type="submit" name="logout">Log Out</button>
</form>


<?php
include "footer.html";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->

</body>
</html>