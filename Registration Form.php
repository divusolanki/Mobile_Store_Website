<?php

session_start();

include 'php/config.php';

if(isset($_POST['submit'])){

    $user = $_POST['name'];
    $email = $_POST['email'];
    $pass =  $_POST['pass'];

    $select = "SELECT * FROM userlogin WHERE email='$email' && password='$pass'";

    $result = mysqli_query($con, $select);

    if(mysqli_num_rows($result) > 0){
        $result_fetch=mysqli_fetch_assoc($result);
        if($result_fetch['username']==$name){
            $error[] = 'user already exist!';
        }
        else{
            $error[] = 'email already resgistered!';
        }
    }
    else{
        $sql = "INSERT INTO `userlogin`(`username`, `email`, `password`) VALUES ('$user','$email','$pass')";
        if(mysqli_query($con, $sql)){
            header('location:index.php');
        }
        else{
            $error[] = 'user or email already exist!';
        }
    }
}
$con->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <title>Registration Form</title>
    <style media="screen">
 body {
    background-color: white;
}

form {
    height: 670px;
    width: 400px;
    background-color: rgba(110, 80, 80, 0.13);
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    padding: 50px 35px;
}

form * {
    font-family: 'Poppins', sans-serif;
    color: black;
    letter-spacing: 0.5px;
    outline: none;
}
form h3 {
    font-size: 32px;
    font-weight: 700;
    line-height: 42px;
    text-align: center;
    margin-bottom:40px;
}

label {
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}

input {
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
    border-top: none;
    border-left: none;
    border-right: none;
}

::placeholder {
    color: #272323;
}

button {
    margin-top: 40px;
    width: 100%;
    background-color: coral;
    color: #fff;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    border: none;
}

p {
    margin-top: 20px;
    text-align: center;
}

a {
    margin-left: 5px;
    text-decoration: none;
}

a:hover {
    color: rgb(167, 84, 54);
}
.back-btn a:hover{
    color: coral;
    text-decoration: none;
}

    </style>
</head>
<body>
    <form method="POST">

         <div class="back-btn" style="position:absolute;top:50px;left:30px;font-size:25px;">
                <a href="index.php">&#8592</a>
            </div>

        <h3 style="margin-left: 15px;">Create Account</h3>

        <?php
        if(isset($error)){
            foreach($error as $error){
                echo "<p style='text-align:center;color:red;'>".$error."</p>";
            }
        }
        ?>

        <label for="username">Username</label>
        <input type="text" placeholder="Username" name="name" id="username" required>

        <label for="email">Email</label>
        <input type="email" placeholder="Email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="pass" id="password" required>

        <button name="submit">Sign Up</button>

        <p><a href="index.php">Already Have Account? Log In</a></p>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
<!-- partial -->
