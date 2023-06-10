<?php
include 'config.php';
session_start();
$user_id=$_SESSION['user_id'];

if(isset($_GET['logout']))
{
    unset($user_id);
    session_destroy();
    header('location:../login_user.php');
}
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
    <title>Shope online | اضافة منتجات</title>
    <link rel="stylesheet" href="index.css">
   
</head>
<body>
    


<div class="container">

    <center>
       
        <div class="main">
            <div class="box_input">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h1> صفحة رفع المنتجات</h1>
                <span class="title_box">أسم المنتج</span>

                <input  type="text" name='name' dir="rtl">
                <br>
                <span class="title_box">سعر المنتج</span>
                <input type="text" name='price' dir="rtl" >
                <br>
                <input type="file" id="file" name='image' style='display:none;'>
                <label  for="file"> اختيار صورة للمنتج</label>
                <button name='upload'>رفع المنتج</button>
                <br><br>
                <div class="a">
                    <div><a class="style_view" href="products.php">عرض كل المنتجات</a></div>
              <div><a class="style_logout" href="index.php?logout=<?php echo $user_id;?>"onclick="return confirm('هل تريد تسجيل الخروج ؟')">تسجيل الخروج؟</a></div>  
                </div>
               

            </form>
            </div>
            <div class="box_input1">
                <h2>Welcome to my page</h2>
                <img class="img_larg" src="../admin.png" alt="logo" width="400px">
                <p>مطورون فريق العمل</p>



            </div>
        </div>

      
    </center>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>swal("hello")</script>

</body>
</html>