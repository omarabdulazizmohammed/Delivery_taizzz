<?php
include 'config.php';
session_start();
$user_id=$_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:../login_user.php');
 };
 
?>




<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | تعديل منتج</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <style>
      



        </style>
</head>
<body>
    <?php
    include('config.php');
    $ID=$_GET['id'];
    $up = mysqli_query($con, "select * from products where id ='$ID'");
    $data = mysqli_fetch_array($up);
    
    ?>
     <center>
          <div class="back">

             <div><a href="../admin/" class='btn btn-primary'>رفع منتج جديد</a></div>
             <h2>تعديل على المنتجات</h2>
             <div><a href="products.php" class='btn btn-primary'>عرض كل المنتجات</a></div>

          </div>
       </center>
    <center>
        <div class="main  main1">
        <div class="box_input">
            <form action="up.php" method="post" enctype="multipart/form-data">
                <h2>تعديل على المنتج</h2>
                <input type="text" name='id' value='<?php echo $data['id']?>'  style='display:none;'>
                <br>
                <span class="title_box">أسم المنتج</span>
                <input type="text" name='name'  dir="rtl"  value='<?php echo $data['name']?>'>
                <br>
                <span class="title_box">سعر المنتج</span>
                <input type="text" name='price'  dir="rtl" value='<?php echo $data['price']?>'>
                <br>
                <input type="file" id="file" name='image' style='display:none;'>
                <label for="file"> تحديث صورة المنتج</label>
                <button name='update' type='submit'>تعديل المنتج</button>
                <br><br>
                <!-- <a href="products.php">عرض كل المنتجات</a>
                <a href="products.php">تسجيل خروج</a> -->
            </form>
        </div>
        <div class="box_input1">
                <h2>Welcome to my page</h2>
                <img class="img_larg" src="../admin.png" alt="logo" width="400px">
                <p>مطورون فريق العمل</p>



            </div>
        </div>
    </center>
</body>
</html>