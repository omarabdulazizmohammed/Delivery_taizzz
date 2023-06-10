<?php

include 'config.php';

if(isset($_POST['submit'])){
  
   $name =stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['getName']))));
   $email =stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['getEmail']))));
   $tel =stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['gettel']))));
    $msg=stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['getMessage']))));
 
      mysqli_query($conn, "INSERT INTO `contect_us`(`name`, `email`, `number`, `message`) VALUES('$name', '$email','$tel','$msg')") or die('query failed');
      $message[] = 'sended successfully!';
      header('location:About_US.php');
//    }

}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="Delivery.css">
    <!-- <link rel="stylesheet" href="About_US.html"> -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="wow.min.js">
    <link rel="stylesheet" href="animate.css">



    <title>اتصل نصل</title>
    <style>
        body{
            background-color: rgb(241, 239, 237);
        }
      
    </style>

</head>

<body>
        <header>
            <div class="header_contacts">
                <div>
                <h1 class="header_title">Delivery</h1>
            </div>
            <div>
                <form action="login_user.php" method="post">
                    <input class="Login_Customer" type="submit" value="تسجيل الدخول" name="LoginCustomer">

                </form>
              
            </div>
            </div>
        </header>
        <main dir="rtl" class="main_Contacts">
            <h1 class="main_contacts_us">إتصل بنا</h1>
            <hr>
            <h2 class="main_HowCanHelpYou">كيف يمكننا مساعدتك  ؟</h2>
            <p class="main_service_customer">
            قسم خدمة العملاء لدينا جاهزة  للاستقبال  استفسارتكم على مدار الساعة طوال أيام الاسبوع</p>
           
            <p class="contects_with_us">تواصل معنا </p>
            <hr class="HR">
            <div class="info_About_contacts">
           
            <div  class="contects_12">
                <p class="contects_with_us2">تواصل معنا </p>
                <p  class="contects_with_us3">للحصول على رد سريع في حال كنت تريد :</p>
                <p class="contects_13">تعديل طلب</p>
                <p class="contects_13">إستفسارات عامة</p>
                <!-- <p class="contects_12">يمكنك الإتصال بنا من خلال المحادثة المباشرة</p> -->
            </div>
            <hr>
            
            <div class="write_us">
                <p class="write_us">يمكنك البدء باجراء محادثة مباشرة مع احد عملائنا .<br>
                او قم بتعبئة النموذج التالي وسوف يتم الرد عليك في اقرب وقت ممكن</p>
            </div>
            </div>

        </main>
      
        <section dir="rtl" class="customer_contact">
            <form method="post"  action="#">
                <label class="label_contacts_customer">الإسم </label><br>
                <input  class="input_contacts_customer"  type="text" placeholder="الاسم" name="getName"><br>

                <label  class="label_contacts_customer" >البريد الالكتروني </label><br>
                <input  class="input_contacts_customer" type="text" placeholder="البريد الالكتروني"  name="getEmail"><br>

                <label   class="label_contacts_customer" >رقم الهاتف </label><br>
                <input   class="input_contacts_customer" type="text" placeholder="رقم الهاتف" name="gettel"><br>

                <label  class="label_contacts_customer" >الرسالة </label><br>
                <textarea  class="input_contacts_customer" name="getMessage"></textarea><br>
                <input   class="send_contacts_customer" type="submit" value="أرسال"name="submit"><br>



            </form>
        </section>
        <footer>
            <div class="footer_contacts">
                <h2>للمزيد</h2>
                <p>للحصول على المساعدة يمكنك التواصل معنا من خلال المحادثة المباشرة</p>
            </div>
        </footer>
    <!-- </div> -->
</body>
</html>