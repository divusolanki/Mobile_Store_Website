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
    <title>Apple | Mobile Phones</title>
    <style>
        .apple .row{
            background-size: cover;
            width: 85%;
            margin-top: 50px;
            margin-bottom: 30px;
            padding-right: 200px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .apple .row .col-3{
            flex-basis: 30%;
            padding: 10px;
            min-width: 100px;
            margin-left: 10px;
            margin-bottom: 50px; 
            border: 1px solid grey;
            border-radius: 30px;
        }
        .apple .row .col-3 img{
            width: 60%;
            margin-left: -20px;
            margin-top: -40px;
        }
        .btn{
            display: inline-block;
            background: coral;
            color: #fff;
            padding: 8px 30px;
            margin: 6px -63px;
            border-radius: 30px;
        }
        .apple .row .col-3 .btn{
            margin-left:1px;
            margin-top:-10px;
            margin-bottom: 10px;
        }
        .btn:hover{
            color: black;
        }
        .apple .row .col-3 a i{
            margin-left: 77px;
            margin-top: -30px;
            font-size: 30px;
            cursor: pointer;
        }
        .col-3 p:nth-child(1){
            font-size: 25px;
        }

    </style>
</head>
<body>

<?php
    include 'header.html';
?>

<div class="brands">
    <h2>Let's Find a Mobile For You!</h2><hr>
    <a href="apple.php"><img src="images/apple.png" style="margin-left: 25%;"></a>
    <a href="vivo.php"><img src="images/vivo.png" ></a>
    <a href="oppo.php"><img src="images/oppo.png" ></a>
    <a href="samsung.php"><img src="images/samsung.jpg" ></a>
    <a href="oneplus.php"><img src="images/oneplus.png" ></a>
    <a href="xiomi.php"><img src="images/xioami.png" ></a>
</div>

<div class="apple">
    <h3 style="text-align:center;font-size:40px;">Apple</h3> 
    <hr style="margin-top:-10px;width:105px;margin-left:46%;border: 2px solid coral;">   
    <div class="row" style="margin-left: 15%;">
    <?php
        include '../php/config.php';
        $selectquery = "select * from `apple`";
        $query = mysqli_query($con, $selectquery);
        $nums = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
        ?>
        <div class="col-3">
        <img src="../admin/<?php echo $res['image']; ?>" width="350" height="150" style="margin-top:5px;margin-left:7px;">
            <h4 style="margin-top:5px;"><?php echo $res['name']?></h4>
            <p><?php echo $res['storage']?><br><?php echo $res['ram']?><br><?php echo $res['processor']?></p>
            <p style="font-size:25px;">₹<?php echo $res['price']?></p>
            <a href="apple_cart.php?image=<?php echo $res['image']?>&&name=<?php echo $res['name'] ?>&&price=<?php echo $res['price'] ?>" class="btn">Add to Cart</a>
            <a href="apple_view.php?id=<?php echo $res['id'] ?>" style="text-decoration:none;color:black;"><i class="far fa-eye"></i></a>
        </div>
        <?php } $con->close(); ?>
    </div>
</div>

<?php
    include 'footer.html';
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>   


</body>
</html>