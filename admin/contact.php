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
    .contact-details{
        margin: 80px auto;
        margin-left: 13%;
        margin-right: 13%;
    }
    table{
        width: 100%;
        border-collapse: collapse;
    }
    .line{
        border-bottom: 1px solid red;
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
    </style>
</head>


<body>
<?php
include "header.html";
?>

<div class="small-container contact-details">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'config.php';
        $selectquery = "select * from `contactus`";
        $query = mysqli_query($con, $selectquery);
        $nums = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
        ?>
        <tr class="line">
            <td><?php echo $res['id']?></td>
            <td><?php echo $res['email']?></td>
            <td><?php echo $res['phone']?></td>
            <td><?php echo $res['message']?></td>
            <td><a href="product/contact_delete.php?id=<?php echo $res['id'] ?>"><button class="btn btn-danger" style="width: 80px;margin-top:10px;">Delete</button></a></td>
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

</body>
</html>