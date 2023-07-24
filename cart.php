<?php
    session_start();
    require 'php/config.php';
    $user_products_query="select * from `cart`";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No items in the cart!!");
        </script>
    <?php
        header('location:home.php');
    }else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['price']; 
       }
    }
?>


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
    .cart-page{
        margin: 80px auto;
        margin-left: 13%;
        margin-right: 17%;
    }
    table{
        width: 100%;
        border-collapse: collapse;
    }
    .cart-info{
        display: flex;
        flex-wrap: wrap;
    }
    th{
        text-align: left;
        padding: 5px;
        color: #fff;
        background: #ff523b;
        font-weight: normal;
    }
    td{
        padding: 10px 5px;
    }
    td input{
        width: 40px;
        height: 30px;
        padding: 5px;
    }
    td a{
        color: #ff523b;
        font-size: 12px;
    }
    .total-price{
        display: flex;
        justify-content: flex-end;
    }
    .total-price table{
        border-top: 3px solid #ff523b;
        width: 100%;
        max-width: 390px;
    }
    td:last-child{
        text-align: right;
    }
    th:last-child{
        text-align: right;
    }
    .btn{
        display: inline-block;
        background: coral;
        color: #fff;
        padding: 8px 30px;
        margin-top: 2%;
        margin-left: 83%;
        border-radius: 30px;
    }
    .btn:hover{
        color: black;
    }
    table tr td a:hover{
        color: black;
    }
    </style>
</head>
<body>
<?php
include "header.html";
?>

<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Total</th>
            <th>Remove</th>
        </tr>
        <?php
        include 'php/config.php';
        $selectquery = "select * from `cart`";
        $query = mysqli_query($con, $selectquery);
        $nums = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="admin/<?php echo $res['image']?>" width="80" height="80">
                    <div style="margin-left: 15px;margin-top: 30px;">
                        <p><?php echo $res['name']?></p>
                        <br>
                        
                    </div>
                </div>
            </td>
            <td>₹<?php echo $res['price']?></td>
            <td><a href="remove.php?id=<?php echo $res['id'] ?>" style="font-size: 16px;text-decoration:none;">Remove</a></td>
        </tr>
        <?php } $con->close(); ?>
    </table>

    <div class="total-price">
        <table>
            <tr>
                <td>Total</td>
                <td>₹ <?php echo $sum ?></td>
            </tr>
        </table>
    </div>

    <a href="order.php" class="btn">Confirm Order</a> 
</div>

<?php
include "footer.html";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->

</body>
</html>