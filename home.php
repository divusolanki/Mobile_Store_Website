<?php
session_start();

include 'php/config.php';

if(isset($_POST['addToCart'])){
    $product_image = $_POST['image'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_quantity = 1;

    $select_cart = mysqli_query($con, "select * from `cart` where name='$product_name'");

    if(mysqli_num_rows($select_cart) > 0){
        echo "product aleredy add";
    }
    else{
        $insert_product = mysqli_query($con, "insert into `cart`(image,name,price,quantity) values('$product_image','$product_name','$product_price','$product_quantity')");
        echo "product add";
    }
}
$con->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>Mobile Phones | Online Mobile Shopping Website</title>
</head>
<body>
<?php
include "header.html";
?>

<div class="first">
<div class="row">
    <div class="col-2">
        <h1>Your Dream Phone<br>Is Here!</h1> 
        <p>The future of mobile is the future of online. It is <br> how people access online content now.</p>
        <a href="#about" class="btn">Explore Now &#8594;</a>
    </div>
    <div class="col-2">
        <img src="images/Picsart_22-07-16_17-56-50-392.png" >
    </div>
</div>
</div>

<div class="about" id="about">
    <h2>MOBILE.COM</h2><hr>
    <p>Launched in 2022, mobile.com is the largest gadget discovery site in India, focused on smartphones. It provides information and interactive tools to help people decide which phone to buy and where to buy it from. We soon become recognized for our hard work, expertise and the finest range of products. We brought hi-tech devices ranging from the latest mobile phones.</p>
</div>

<!-- imageslider -->
<div class="container imageslider">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/imageslider1.jpg" class="d-block w-100" style="height: 370px;">
            </div>
            <div class="carousel-item">
            <img src="images/imageslider2.jpg" class="d-block w-100" style="height: 370px;">
            </div>
            <div class="carousel-item">
            <img src="images/imageslider3.jpeg" class="d-block w-100" style="height: 370px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" style="opacity:0;cursor:pointer;">
            <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
            <span class="visually-hidden" class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" style="opacity:0;cursor:pointer;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- imageslider -->


<!-- featured-products -->
<div class="featured-products">
    <h2>FEATURED PRODUCTS</h2><hr>
    <div class="row" style="margin-left: 15%;">
    <?php
        include 'php/config.php';
        $selectquery = "select * from `featured-products`";
        $query = mysqli_query($con, $selectquery);
        $nums = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
    ?>
        <div class="col-3">
            <img src="admin/<?php echo $res['image']; ?>" width="400" height="120" style="margin-top:5px;margin-left:-10px;">
            <h4 style="margin-top:5px;"><?php echo $res['name']?></h4>
            <p><?php echo $res['storage']?><br><?php echo $res['ram']?><br><?php echo $res['processor']?></p>
            <p style="color: coral;font-size: 30px;">Coming Soon...</p>
        </div>
        <?php }
        $con->close();
        ?>
    </div>
</div>
<!-- featured-products -->


<!-- products -->
<div class="products">
    <h2>PRODUCTS</h2><hr>
    <div class="row" style="margin-left: 15%;">
    <?php
        include 'php/config.php';
        $selectquery = "select * from `product`";
        $query = mysqli_query($con, $selectquery);
        $nums = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
        ?>
        <div class="col-3">
            <img src="admin/<?php echo $res['image']; ?>" width="350" height="150" style="margin-top:5px;margin-left:7px;">
            <h4 style="margin-top:5px;"><?php echo $res['name']?></h4>
            <p><?php echo $res['storage']?><br><?php echo $res['ram']?><br><?php echo $res['processor']?></p>
            <p style="font-size:25px;">₹<?php echo $res['price']?></p>
            <a href="company/home_cart.php?image=<?php echo $res['image']?>&&name=<?php echo $res['name'] ?>&&price=<?php echo $res['price'] ?>" class="btn" name="addToCart">Add to Cart</a> 
        </div>
        <?php }
        $con->close();
        ?>
    </div>
</div>
<!-- products -->

<?php
include "footer.html";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->

</body>
</html>