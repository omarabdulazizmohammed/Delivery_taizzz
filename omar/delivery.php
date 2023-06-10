<?php

include 'config.php';
session_start();
if (isset($_POST['submit'])) {

    $name = stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['getName']))));
    $email = stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['getEmail']))));
    $tel = stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['gettel']))));
    $msg = stripslashes(trim(htmlspecialchars(mysqli_real_escape_string($conn, $_POST['getMessage']))));
    if(isset($_POST[' $name']) &&isset($_POST['  $email'])&&isset($_POST[' $tel '])){
    mysqli_query($conn, "INSERT INTO `contect_us`(`name`, `email`, `number`, `message`) VALUES('$name', '$email','$tel','$msg')") or die('query failed');
    $message[] = 'sended successfully!';
    header('location:Delivery.php');}
 

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Delivery.css">

    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="css/all.min.css">

    <link rel="stylesheet" href="wow.min.js">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">




    <title>اتصل نصل</title>

</head>
<style>
    * {
        color: white;
    }
</style>

<body>
    <div class="parent">
        <header>
            <div class="container">
                <div class="navbar">

                    <div class="wow fadeInDown Logo">Delivery</div>
                    <div class="ul1">
                        <nav>

                            <ul class="ulnone">
                                <div class="s">
                                    <li><a class="a1" href="#Home">Home</a></li>
                                    <li><a class="a1" href="#Order">Order</a></li>
                                    <li><a class="a1" href="#clints">clints</a></li>
                                    <li><a class="a1" href="About_US.php">Contect US</a></li>
                                </div>
                                <div class="singup1">
                                    <button class="btnnav" id="btnnav"><a href="login_user.php">login</a></button>
                                    <button class="btnnav1" id="btnnav1"><a href="register_user.php">register</a></button>

                                </div>
                            </ul>

                        </nav>
                    </div>

                    <i class="fas fa-bars " id="toggle-menue"></i>


                </div>
                <div id="Home" class="header_down">
                    <div class="text_header_button">
                        <p class="p_text_header">اطلب الطعام اون لاين في تعز - اليمن</p>
                        <p class="p1_text_header"> اطلب توصيل الطعام أونلاين أكتشف الالف المطاعم والمتاجر القريبة إليك
                        </p>
                        <div class="input_Location">
                            <form method="POST" action="#">
                                <input class="input_login" class="inp1" type="text" dir="rtl" placeholder="ابحث عن منطقة او شارع او معلم معروف..">
                                <input type="submit" value="بحث" name="search_input" class="btn">
                            </form>
                            <span class="Singin_Location"> ؟هل انت عضوا مسبقا في مجتمعنا
                                <a class="read_a" href="login_user.php">&nbsp;&nbsp;&nbsp;&nbsp;تسجيل دخول</a>
                            </span>
                        </div>
                    </div>

                    <div class="img-header">
                        <img src="imagesDelivery/admin1.png" class="img-header1" alt="">

                    </div>

                </div>
            </div>



        </header>
        <button class="circle">
            <img class="png_up" src="imagesDelivery/up_50px.png">
        </button>
        <main>
            <div class="container">
                <div id="Order" class="main1">
                    <div class="main_text">
                        <h2 class="main-h2">
                            أكثر من 20 الف طلب لطعام على مستوى مدينة تعز - اليمن
                        </h2>
                        <span class="main-span">
                            ... اللي بخاطرك واصلك , اتصل نصل
                        </span>

                    </div>
                    <!-- ////////////////////////////////////////////// -->

                    <div class="main_text">
                        <h2 class="main-h2">
                            اطلب توصيل الطعام أونلاين أكتشف الالف المطاعم والمتاجر القريبة إليك
                        </h2>
                        <span class="main-span">
                            Follow The Step
                        </span>

                    </div>
                    <div class="step">
                        <div class="step_follow">
                            <i class="fas fa-map-marked-alt"></i>
                            <p class="num">01</p>
                            <p class="map">Choose your Location</p>
                        </div>

                        <div class="step_follow">
                            <i class="fas fa-house-user"></i>
                            <p class="num">02</p>
                            <p class="map">Choose Restaurant</p>
                        </div>

                        <div class="step_follow">
                            <i class="fas fa-car"></i>
                            <p class="num">03</p>
                            <p class="map">Choose your order</p>
                        </div>

                        <div class="step_follow">
                            <i class="fas fa-cart-arrow-down"></i>
                            <p class="num">04</p>
                            <p class="map">Food is on the way</p>
                        </div>
                    </div>



                    <div class="main_text main-span1">
                        <h2 class="main-h2">
                            Popular dishes with delivery
                        </h2>
                        <span class="main-span ">
                            sapiente est quidem, nostrum corporis qui asperiores praesentium a pariatur,
                        </span>

                    </div>




                    <div class="step" id="step_Hide_more">
                        <div class="step_follow step_follow_medel">
                            <img class="wow bounceInRight img-price" src="imagesDelivery/p11.jpg" alt="">

                            <p class="map dishes">Scream with chocolate and milk</p>
                            <div class="buy">

                                <p class="price u">Buy:$14.4</p>
                                <p class="buy_piz">Add
                                    <span class="fas fa-plus"></span>
                                </p>

                            </div>
                        </div>

                        <div class="step_follow step_follow_medel">
                            <img class="wow bounceInRight img-price" src="p10.jpg" alt="">

                            <p class="map dishes">Scream with chocolate and milk</p>
                            <div class="buy">

                                <p class="price u">Buy:$14.4</p>
                                <p class="buy_piz">Add
                                    <span class="fas fa-plus"></span>
                                </p>

                            </div>

                        </div>

                        <div class="step_follow step_follow_medel">
                            <img class="wow bounceInRight img-price" src="imagesDelivery/p9.jpg" alt="">
                            <p class="map dishes">Scream with chocolate and milk</p>
                            <div class="buy">

                                <p class="price u">Buy:$14.4</p>
                                <p class="buy_piz">Add
                                    <span class="fas fa-plus"></span>
                                </p>

                            </div>
                        </div>

                    </div>


                    <div class="our_client">
                        <div class="img-our img-our112">
                            <img class="img-our1" src="imagesDelivery/ppp.png">

                        </div>
                        <div id="clints" class="img-our11 img-our111 ">
                            <h2 class="p-about">
                                What Our Clients say About US
                            </h2>
                            <p class="p1-about">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum minus esse dignissimos
                                pariatur cumque modi sequi unde ut velit natus magnam necessitatibus, reiciendis aliquid
                                deserunt soluta doloremque quaerat placeat eaque!


                            </p>
                        </div>
                    </div>



                    <div class="main_text">
                        <h2 class="main-h2">
                            More Than 20,000 Dishes To Order 1
                        </h2>
                        <span class="main-span">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        </span>

                    </div>

                    <div class="myprogramm">
                        <div class="img-phone">
                            <img class="app1" src="imagesDelivery/phone.png" alt="">
                        </div>
                        <div class="p-text-phone">
                            <p class="App">حمل تطبيق طلبات الجديد بميزات رائعة</p>
                            <p class="text-App">
                                أحصل على كل م تحتاجة , متى ما تحتاج اتصل نصل إليك
                            </p>
                            <h3 class="delivery1">تابع كل جديد عن المتاجر والمطاعم القريبة أليك</h3>
                            <h3 class="delivery2">ماذا تنتظر ؟ حمل التطبيق الان !</h3>
                            <div class="stors">
                                <p class="stor" href="#">App stor</p>
                                <p class="stor" href="#">Google Play</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </main>
        <section id="section_contact">

            <div class="box_contact1">
                <pre>

                <h1 class="margain_contact margain_contact_h1 " >إتصل بنا</h1>
                <p class="margain_contact">اليمن - تعز - شار جمال</p>
                <p class="margain_contact"> m737257230@gmail.com :الجيميل </p>
                <p class="margain_contact">+967737257230 :رقم الهاتف </p>
                <p class="margain_contact">+96779475324  :رقم الهاتف</p>
            </pre>
            </div>

            <div class="box_contact2">

                <p class="Get_touch">....اتواصل معنا
                    <!-- <span class="span_touch"><br>............................</span> -->
                </p>

                <form action="" method="post" class="form_contects" dir="rtl">
                    <input class="input_contacts" type="text" placeholder="اسم المستخدم" name="getName"><br>
                    <input class="input_contacts" type="email" placeholder="البريد الكتروني" name="getEmail"><br />
                    <input class="input_contacts" type="tel" placeholder="رقم الهاتف" name="gettel"><br />
                    <input class="input_contacts" type="text" placeholder="اكتب رسالتك هنا ..." name="getMessage">
                    <input class="input_contacts input_send" type="submit" value="ارسال" name="submit">
                </form>

            </div>





        </section>
        <footer>
            <div class="container">
                <div class="footer">
                    <div class="footers">
                        <h2 class="h2-footer h22">
                            Delivery
                        </h2>
                        <p class="h2-footer">
                            praesentium repellendus eum aliquam quasi facilis ut odit.
                            praesentium repellendus eum aliquam quasi facilis ut odit.
                        </p>

                    </div>



                    <div class="footers">
                        <h2 class="h2-footer">
                            Quick Links
                        </h2>
                        <p class="h2-footer">
                        <p class="link-footer">About us</p>
                        <p class="link-footer">Blog</p>
                        <p class="link-footer">Services</p>
                        <p class="link-footer">Blog</p>




                        </p>

                    </div>

                    <div class="footers">
                        <h2 class="h2-footer">
                            USeful Links
                        </h2>
                        <p class="h2-footer">
                        <p class="link-footer">facebook</p>
                        <p class="link-footer">Linkin</p>
                        <p class="link-footer">twitter</p>
                        <p class="link-footer">Google</p>


                    </div>

                    <div id="Contect" class="footers">
                        <h2 class="h2-footer">
                            Contect Us
                        </h2>
                        <p class="h2-footer">
                            <i class="fab fa-skype"></i>
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-google"></i>
                        </p>

                    </div>

                </div>
            </div>

        </footer>
    </div>

    <script src="jquery-3.6.0.min.js"></script>
    <script src="Delivery.js"></script>
    <script src="wow.min.js"></script>
    <script>
        new WOW().init();
    </script>




</body>

</html>