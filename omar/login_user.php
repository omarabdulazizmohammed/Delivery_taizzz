<?php

include 'config.php';
session_start(); // صفحة لانشاء جلسة


if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, ($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      // عرض بيانات 
      $row = mysqli_fetch_array($select);//هذي داله تعيد مصفوفه تحتوي على قيم السجل وتنقل المؤشر إلى سجل التالي
      if ($row["userType"] == "user") {
         $_SESSION['user_id'] = $row['id'];
         header('location:index.php');
      } else if ($row["userType"] == "admin") {
         $_SESSION['user_id'] = $row['id'];
         header('location:admin/index.php');
      }
   } else {
      $message[]="incorrect password or email!";
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/a81368914c.js">
      </script>
      <title>login</title>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      
      <link rel="stylesheet" href="style_login.css">
      <link rel="stylesheet" href="all.min.css">

      <style>
         /* input{
         text-align: center;
      } */
   

      </style>
</head>

<body>

   <?php

   if (isset($message)) {
      foreach ($message as $message) {
         echo 
       '
         <button class="message_box" class="message" onclick="this.remove();">
         <div><img  class="image_box" src="box_important_100px.png" alt=""></div>
         ' . $message . '<img src="img/cancel_48px.png" ></img>
         </button>';

          
      }
   }
   ?>
   <img class="wave" src="img/wave.png">
   <div class="container">
      <div class="img">
         <img src="img/bg.svg">
      </div>
      <div class="login-content">
         <form action="" method="post">
            <img src="img/avatar.svg">
            <h2 class="title">مرحبا بك </h2>
            <div class="input-div one ">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5>البريد الالكتروني</h5>
                  <input type="email" id="email" class="input" name="email" class="style_input">


               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>كلمة المرور</h5>
                  <input type="password" id="password" class="input" name="password" required>

               </div>
            </div>
            <a class="forgot_password" href="#">هل نسيت كلمة المرور ؟
            </a>
            <input type="submit" id="submit" class="btn" name="submit" class="btn" value="تسجيل الدخول">
            <span class="span_style"> <a class="a_color" href="register_user.php">ليس لدى حساب؟ إنشاء حساب
               </a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <span class="span_style"> <a class="a_color1" href="delivery.php">العودة إلى صفحة الرئيسية
               </a></span>

         </form>
      </div>
   </div>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

</script>
   <script type="text/javascript" src="login.js"></script>
</body>

</html>