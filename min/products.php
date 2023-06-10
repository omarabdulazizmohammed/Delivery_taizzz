<?php
include 'config.php';
session_start();
$user_id=$_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:../login_user.php');
 };
 
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <title>Products | المنتجات </title>
    <style>
        body{
            /* background-color: #b8d9dd; */
        }
    
        h3 {


            font-family: 'Cairo', sans-serif;
            font-weight: bold;
        }

   

        .card {
            border-end-end-radius: 40px;
            float: right;
            margin-top: 20px;
            margin-left:20px;
            /* margin-right:10px; */
            box-shadow: 2px 1px 10px slateblue;

        }

        .card img {
            width: 100%;
            height: 200px;
        }

        main {
            width: 80%;

        }

        .back {
            display: flex;
            justify-content:space-between;
            box-shadow: 2px 1px 10px slateblue;

            border-left: 6px solid slateblue;
            border-right: 6px solid slateblue;
            border-bottom: 3px solid slateblue;
            border-radius: 10px;
            width: 80%;
            margin: 10px auto;
            padding: 10px;

        }
    </style>
</head>

<body>
    <center>
        <div class="back">
          
            <div><a href="../admin/" class='btn btn-primary'>رفع منتج جديد</a></div>
            <h3>لوحة تحكم الادمن</h3>
            <div><a href="view_all_product_buy.php" class='btn btn-primary'>التسوق العملاء</a></div>

 
    </center>
    <?php
    include('config.php');
    $result = mysqli_query($con, "SELECT * FROM products");
    while ($row = mysqli_fetch_array($result)) {
        echo "
      <center>
        <main class='flex_card'>
            <div class='card' style='width: 15rem;'>
                <img src='$row[image]' class='card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='delete.php? id=$row[id]' class='btn btn-danger'>حذف منتج</a>
                    <a href='update.php? id=$row[id]' class='btn btn-primary'>تعديل منتج</a>
                </div>
            </div>
        </main>
        </center>
       
        ";
    }
    ?>
</body>

</html>