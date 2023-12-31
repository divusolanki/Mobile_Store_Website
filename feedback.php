<?php

session_start();

include 'php/config.php';

$insert = false;
if(isset($_POST['email'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `feedback`(`username`, `email`, `message`) VALUES ('$name','$email','$message')";

    if($con->query($sql) == true){
        //echo "successfully inserted";
        $insert = true;
    }
    else{
        echo "Error : $sql <br> $con->error";
    }

    $con->close();
}
?>



<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/feedback.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <title>Feedback | Mobile.com</title>
</head>

<body>
<?php
include 'header.html';
?>
<div class="picture">
    <img src="images/Apple-iPhone-11-PNG-File.png">
</div>
<form method="post">
    <h3>Feedback</h3>

    <?php
        if($insert == true){
            echo "<p style='text-align:center;color:green;'>Form Submitted!</p>";
        }
    ?>

    <label for="username">Username</label>
    <input type="text" placeholder="Username" name="name" required>

    <label for="Email">Email</label>
    <input type="email" placeholder="Email" name="email" required>

    <label for="textarea">Message</label>
    <textarea placeholder="Message" name="message" required></textarea>

    <button style="margin-top: 27px;">Submit</button>
</form>
<br><br><br><br><br><br>
<?php
include 'footer.html';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
<!-- partial -->
