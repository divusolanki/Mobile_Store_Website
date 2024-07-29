<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>OnePlus | Mobile Phones</title>
    <style>
        .view {
            height: 900px;
            width: 1200px;
            background-color: white;
            position: absolute;
            top: 1%;
            left: 6%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
            margin-top: 10px;
        }
        .view .row{
            background-size: cover;
            width: 100%;
            margin-top: 50px;
            margin-bottom: 30px;
            padding-right: 400px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .btn{
            display: inline-block;
            background: coral;
            color: #fff;
            padding: 8px 30px;
            margin: 6px -63px;
            border-radius: 30px;
        }
        .btn:hover{
            color: black;
        }
        .col-3 p:nth-child(1){
            font-size: 25px;
        }

        .view .row .image img{
            margin-top: 30px;
            margin-left: 50px;
            width: 300px;
            height: 400px;
        }
        .view .row .content h3{
            margin-top: 20px;
            color: coral;
            text-align: left;
        }
        .view .row .content p{
            font-weight: 500;
        }
        a:hover {
        color: rgb(167, 84, 54);
        }
        .close-btn a:hover{
            color: coral;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="view">
        <div class="close-btn" style="position:absolute;top:40px;right:60px;font-size:25px;cursor: pointer;">
            <a href="oneplus.php">&#10006</a>
        </div>
        <div class="row" style="width:100%;">
        <?php

            include '../php/config.php';

            if(isset($_GET['id'])){

            $ids = mysqli_real_escape_string($con, $_GET['id']);
            $query = "select * from `oneplus` where id=$ids";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0){
                $res = mysqli_fetch_array($query_run);
            ?>
            <div class="image">
                <img src="../admin/<?php echo $res['image']; ?>" >
            </div>
            <div class="content" style="margin-left: 15%;margin-top: 10px;margin-right:-35%;">
                <h1 style="margin-bottom: 50px;"><?php echo $res['name']?></h1>
                <h3>Storage : </h3><p><?php echo $res['storage']?></p>
                <h3>Ram : </h3><p><?php echo $res['ram']?></p>
                <h3>Processor : </h3><p><?php echo $res['processor']?></p>
                <h3>Launch Date : </h3><p><?php echo $res['launch_date']?></p>
                <h3>Camera : </h3><p><?php echo $res['camera']?></p>
                <h3>Display : </h3><p><?php echo $res['display']?></p>
                <h3>Battery : </h3><p><?php echo $res['battery']?></p>
                <h3>Price : </h3><p>₹ <?php echo $res['price']?></p>
            </div>
            <?php } }?>
        </div>
    </div>
</body>
</html>