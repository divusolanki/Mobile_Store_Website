<?php
include '../config.php';

if(isset($_POST['update_product'])){

    $ids = $_POST['product_id'];
    $image = $_FILES['image'];
    $phonename = $_POST['phonename'];
    $storage = $_POST['storage'];
    $ram = $_POST['ram'];
    $processor = $_POST['processor'];
    $launch_date = $_POST['launch_date'];
    $camera = $_POST['camera'];
    $display = $_POST['display'];
    $battery = $_POST['battery'];
    $price = $_POST['price'];

    $query = "UPDATE `vivo` SET name='$phonename', storage='$storage', ram='$ram', processor='$processor', launch_date='$launch_date', camera='$camera', display='$display', battery='$battery', price='$price' WHERE id='$ids' ";

    $query_run = mysqli_query($con, $query);

    if($query_run){
        header('location:../vivo.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>Mobile Phones - Admin </title>
    <style>
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
        margin-left:10%;
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
    }

    input {
        margin-left:10%;
        display: block;
        height: 50px;
        width: 30%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
    }

    textarea {
        display: block;
        height: 100px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
        border: 2px solid black;
    }
    ::placeholder {
        color: #272323;
    }
    button {
        margin-top: 40px;
        margin-left: 10%;
        width: 75%;
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
<div>
<form method="POST" enctype="multipart/form-data">
        <?php

        include '../config.php';

        if(isset($_GET['id'])){

        $ids = mysqli_real_escape_string($con, $_GET['id']);
        $query = "select * from `vivo` where id=$ids";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0){
            $product = mysqli_fetch_array($query_run);
        ?>
    
    <div class="back-btn" style="position:absolute;top:25px;right:50px;font-size:35px;cursor: pointer;">
        <a href="../vivo.php">&#10006</a>
    </div>

        <h3 style="margin-top: 30px;text-align:center;">Update Vivo Product</h3>

        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

        <label for="username">Phone Name</label>
        <input type="text" style="" placeholder="Phone name" name="phonename" id="phonename" value="<?php echo $product['name']; ?>" required>
        
        <div style="margin-left: 50%;margin-top:-8%;">
        <label for="image">Upload Image</label>
        <input type="file" name="image" id="image" style="width:60%;" value="<?php echo $product['image']; ?>">
        </div>

        <label for="storage">Storage</label>
        <input type="text" placeholder="storage" name="storage" id="storage" value="<?php echo $product['storage']; ?>"></input>

        <div style="margin-left: 50%;margin-top:-8%;">
        <label for="ram">Ram</label>
        <input type="text" placeholder="ram" name="ram" id="ram" style="width:60%;" value="<?php echo $product['ram']; ?>" ></input>
        </div>

        <label for="processor">Processor</label>
        <input type="text" placeholder="processor" name="processor" id="processor" value="<?php echo $product['processor']; ?>" ></input>

        <div style="margin-left: 50%;margin-top:-8%;">
        <label for="launch_date">Launch Date</label>
        <input type="text" placeholder="launch date" name="launch_date" id="launch_date" style="width:60%;" value="<?php echo $product['launch_date']; ?>"></input>
        </div>

        <label for="camera">Camera</label>
        <input type="text" placeholder="camera" name="camera" id="camera" value="<?php echo $product['camera']; ?>" ></input>

        <div style="margin-left: 50%;margin-top:-8%;">
        <label for="display">Display</label>
        <input type="text" placeholder="display" name="display" id="display" style="width:60%;" value="<?php echo $product['display']; ?>" ></input>
        </div>

        <label for="battery">Battery</label>
        <input type="text" placeholder="battery" name="battery" id="battery" value="<?php echo $product['battery']; ?>" ></input>

        <div style="margin-left: 50%;margin-top:-8%;">
        <label for="price">Price</label>
        <input type="number" placeholder="price" name="price" id="price" style="width:60%;" value="<?php echo $product['price']; ?>" required>
        </div>
       
        <button name="update_product">Update Product</button><br><br><br><br>
</form>
<?php } } ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>