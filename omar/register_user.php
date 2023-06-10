<?php

include 'config.php';

if(isset($_POST['submit'])){
 
   $name = stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['name']))));//  و داله تحمي المتغيرات من اي ثغرات مثل ثغرات SQL Injection  يجب ان تتصل بقاغدة بيانات
   $email =stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']))));
   $city = stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['city']))));
   $tel = stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['tel']))));
   $pass =  stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']))));
   $cpass = stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['cpassword']))));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');//الاستعلام من قاعدة بيانات
//التحقق من عدد النتائج

   if(mysqli_num_rows($select) > 0){
      $message[] = ' !المستخدم موجود مسبقا ';
   }else{
      mysqli_query($conn, "INSERT INTO `users`(name, email,phone,city, password) VALUES('$name', '$email','$tel','$city', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:login_user.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <link rel="stylesheet" href="style_login.css">
   <style>
      input{
         text-align: center;
      }
    
    
   </style>
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      // echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
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
      <form action="" method="post" >
				<img src="img/avatar.svg"><!-- صورة شخصية-->
				<h2 class="title">انشاء حساب جديد</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>الاسم</h5>
           		   		
                          <input type="text" class="input" required name="name">


           		   </div>
           		</div>
                 <!-- //////////////////////////////////////////////////////// -->
                 <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>البريد الالكتروني</h5>
           		   	
                          <input type="email" class="input"  name="email" required>


           		   </div>
           		</div>
                 <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>اسم المحافظة</h5>
           		   	
                          <input type="text" class="input" name="city" required>


           		   </div>
           		</div>
                 <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>رقم الهاتف</h5>
           		   	
                          <input type="tel" class="input" name="tel" required>


           		   </div>
           		</div>
                 <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>كلمة المرور</h5>
           		   
                          <input type="password" class="input"name="password" required>
           		   </div>
           		</div>
                 <!-- //////////////////////////////////////////////////////////////// -->
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>تأكيد كلمة المرور</h5>
           		    
                        <input type="password" class="input"  name="cpassword" required>

            	   </div>
            	</div>
            	<a class="forgot_password" href="#">Forgot Password?</a>
            	
               <input type="submit"  class="btn" name="submit" class="btn" value="إنشاء حساب">
               <span class="span_style"> <a class="a_color" style="margin-left:50px" href="login_user.php">
                 لدي حساب مسبقاً؟ &nbsp; تسجيل الدخول
                </a></span>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="Delivery.js"></script>
</body>
</html>