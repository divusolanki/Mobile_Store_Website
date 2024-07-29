<?php
$insert = false;
if(isset($_POST['submit'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "mobilecom";

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con){
        die("connection to this database failed due to ".mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    $image = $_FILES['image'];
    $phonename = $_POST['phonename'];
    $storage = $_POST['storage'];
    $ram = $_POST['ram'];
    $processor = $_POST['processor'];
    $price = $_POST['price'];

    $filename = $image['name'];
    $filepath = $image['tmp_name'];
    $fileerror = $image['error'];

    if($fileerror == 0){
        $destfile = 'images/product/'.$filename;
        move_uploaded_file($filepath, $destfile);

        $sql = "INSERT INTO `product`(`image`, `name`, `storage`, `ram`, `processor`, `price`) VALUES ('$destfile','$phonename','$storage','$ram','$processor','$price')";
        // echo $sql;
    }

    if($con->query($sql) == true){
        //echo "successfully inserted";
        $insert = true;
    }
    else{
        $error[] = 'Product Already add!';
    }

    $con->close();
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
    <title>Mobile Phones - Admin </title>
    <style>
    header nav ul{
        margin-bottom: 45px;
    }
    .popup {
        height: 850px;
        width: 700px;
        background-color: white;
        position: absolute;
        transform: translate(-50%, -50%) scale(0.1);
        top: 0;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
        margin-top: 100px;
        visibility: hidden;
        transition: transform 0.4s, top 0.4s;
    }
    .open-popup{
        visibility: visible;
        top: 50%;
        transform: translate(-50%, -50%) scale(1);
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
    .product-detail{
        margin: 80px auto;
        margin-left: 13%;
        margin-right: 13%;
    }
    table{
        width: 100%;
        border-collapse: collapse;
    }
    th{
        text-align: left;
        padding: 5px;
        color: #fff;
        background: #ff523b;
        font-weight: normal;
    }
    tbody td{
        margin-top:30px;
    }
    .line{
        border-bottom: 1px solid red;
    }
    </style>
</head>


<body>
<?php
include "header.html";
?>

<button class="btn btn-primary" style="width:120px;margin-left:15%;" onclick="openPopup()">Add Product</button>
<div class="popup" id="popup">
<form method="POST" enctype="multipart/form-data">
    <div class="close-btn" onclick="closePopup()" style="position:absolute;top:50px;right:30px;font-size:25px;cursor: pointer;">
        <a>&#10006</a>
    </div>
        <h3 style="margin-left: 15px;">Add Product</h3>

        <?php
            if($insert == true){
                echo "<p style='text-align:center;color:green;'>Product Add!</p>";
            }
        ?>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo "<p style='text-align:center;color:red;'>".$error."</p>";
            }
        }
        ?>

        <label for="username">Phone Name</label>
        <input type="text" style="width: 50%;" placeholder="Phone name" name="phonename" id="phonename" value="<?php echo $res['name']; ?>" required>
        
        <div style="margin-left: 60%;margin-top:-17%;">
        <label for="image">Upload Image</label>
        <input type="file" name="image" id="image">
        </div>

        <label for="storage">Storage</label>
        <input type="text" placeholder="storage" name="storage" id="storage" value="<?php echo $res['storage']; ?>"></input>

        <label for="ram">Ram</label>
        <input type="text" placeholder="ram" name="ram" id="ram" ></input>

        <label for="processor">Processor</label>
        <input type="text" placeholder="processor" name="processor" id="processor" ></input>

        <label for="price">Price</label>
        <input type="number" placeholder="price" name="price" id="price" required>

        <button name="submit">Add Product</button>
</form>
</div>

<div class="small-container product-detail">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Small Details</th>
            <th>Price</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'config.php';
        $selectquery = "select * from `product`";
        $query = mysqli_query($con, $selectquery);
        $nums = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
        ?>
            <tr class="line">
            <td><?php echo $res['id']?></td>
            <td><img src="<?php echo $res['image']; ?>" width="70" height="80" style="margin-top:5px;"></td>
            <td><?php echo $res['name']?></td>
            <td><?php echo $res['storage']?><br><?php echo $res['ram']?><br><?php echo $res['processor']?></td>
            <td><?php echo $res['price']?></td>
            <td><a href="product/product_update.php?id=<?php echo $res['id'] ?>"><button class="btn btn-primary" style="width: 80px;margin-top:25px;">Update</button></a>
            <a href="product/product_delete.php?id=<?php echo $res['id'] ?>"><button class="btn btn-danger" style="width: 80px;margin-top:25px;">Delete</button></td></a>
        </tr>
        <?php }?>
        </tbody>
    </table>

<div>

<!-- <div style="margin-bottom: 50%;"></div>
<?php
include 'footer.html';
?> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script>
    let popup = document.getElementById("popup");

    function openPopup(){
        popup.classList.add("open-popup");
    }

    function closePopup(){
        popup.classList.remove("open-popup");
    }
</script>

</body>
</html>