<?php
session_start();

include 'php/config.php';

if(isset($_POST['submit'])){

    $email =  $_POST['email'];
    $pass =  $_POST['pass'];

    $select = "SELECT * FROM userlogin WHERE email='$email' && password='$pass'";

    $result = mysqli_query($con, $select);

    if(mysqli_num_rows($result) == 1){
        $result_fetch=mysqli_fetch_assoc($result);
        if(password_verify($pass,$result_fetch['pass'])){
            $error[] = "Password not match!";
        }
        else{
            header('location:home.php');
        }
    }
    else if($email == 'admin@gmail.com' && $pass == 'admin'){
        
            header('location:admin/index.php');
        
    }
    else{
        $error[] = "Invalid email or password!";
    }
    
}
$con->close();
?>





<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <title>Login Form</title>
    <style media="screen">
    *,
    *:before,
    *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: white;
    }

    form {
        height: 550px;
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
    </style>
</head>

<body>
    <form method="POST">
        <h3>Welcome</h3>

        <?php
        if(isset($error)){
            foreach($error as $error){
                echo "<p style='text-align:center;color:red;'>".$error."</p>";
            }
        }
        ?>

        <label for="Email">Email</label>
        <input type="email" placeholder="Email" name="email" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="pass" required>

        <button type="submit" name="submit">Log In</button>

        <p><a href="Registration Form.php">Don't Have Account? Create Account</a></p>

    </form>

</body>

</html>
<!-- partial -->