<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login_user.php');
};


if (isset($_GET['logout'])) {
   unset($user_id);
   session_destroy();
   header('location:login_user.php');
};


if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if (mysqli_num_rows($select_cart) > 0) {
      $message[] = ' 😍⭐ المنتج موجود مسبقا بالسله  ';
   } else {
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] ='😍 تم إضافة المنتج إلى السله بنجاح ';
   }
};

if (isset($_POST['update_cart'])) {
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = ' 😍 تم تحديث الكمية الموجودة في السله ';
}

if (isset($_GET['remove'])) {
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
}

if (isset($_GET['delete_all'])) {
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>عربة التسوق</title>

   <link rel="stylesheet" href="css/style.css">
   <!-- <link rel="stylesheet" href="style_login.css"> -->
      <link rel="stylesheet" href="all.min.css">
   

</head>
<style>
   marquee {
      font-size: 30px;
      background-color: #1F87CF;
      color: white;
      margin-bottom: 5px;

   }
   .view-user{
      background-color: #1F87CF;
   }
</style>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         // echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
         echo 
         '
           <button class="message_box" class="message" onclick="this.remove();">
           <div><img  class="image_box" src="box_important_100px.png" alt=""></div>
           ' . $message . '<img src="img/cancel_48px.png" ></img>
           </button>';
  
      }
   }
   ?>

   <div class="container">

      <div class="user-profile">

         <?php
         $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
         if (mysqli_num_rows($select_user) > 0) {
            $fetch_user = mysqli_fetch_assoc($select_user);//قرأءة سجل من قاعدة بيانات ووضعه في مصفوفه  ت
           
         };
         ?>

         <p><span><?php echo $fetch_user['name']; ?></span> :المستخدم الحالي  </p><!--جلب اسم من قاعدة بيانات-->
         <div  class="flex">
            <a  href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');" class="delete-btn">تسجيل الخروج</a>
         </div>

      </div>

      <div class="products">
        
         <marquee>أحدث المنتجات التي تم إضافتها مؤخراَ</marquee>

         <div class="box-container">

            <?php
            include('config.php');
            $result = mysqli_query($conn, "SELECT * FROM products");
            while ($row = mysqli_fetch_array($result)) {
               
            ?>

               <form method="post" class="box" action="">
                  <img src="admin/<?php echo $row['image']; ?>" width="200">
                  <div class="name"><?php echo $row['name']; ?></div>
                  <div class="price"><?php echo $row['price']; ?></div>
                  <input type="number" min="1" name="product_quantity" value="2">
                  <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                  <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                  <input type="submit" value="add to cart" name="add_to_cart" class="btn">
               </form>
            <?php
            };
            ?>

         </div>

      </div>

      <div class="shopping-cart">

         <h1 class="heading">سلة التسوق</h1>

         <table>
            <thead>
               <th>الصورة</th>
               <th>الاسم</th>
               <th>السعر</th>
               <th>العدد</th>
               <th>السعر الكلي</th>
               <th>العملية</th>
            </thead>
            <tbody>
               <?php
               $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $grand_total = 0;
               if (mysqli_num_rows($cart_query) > 0) {
                  while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
               ?>
                     <tr>
                        <td><img src="admin/<?php echo $fetch_cart['image']; ?>" height="75" alt=""></td>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td><?php echo $fetch_cart['price']; ?>$ </td>
                        <td>
                           <form action="" method="post">
                              <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                              <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                              <input type="submit" name="update_cart" value="تعديل" class="option-btn">
                           </form>
                        </td>
                        <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>$</td>
                        <td><a href="index.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm(' هل تريد إزاله العنصر من السله؟');">حذف</a></td>
                     </tr>
               <?php
                     $grand_total += $sub_total;
                  }
               } else {
                  echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">العربة فارغة</td></tr>';
               }
               ?>
               <tr class="table-bottom">
                  <td colspan="4">المبلغ الإجمالي :</td>
                  <td><?php echo $grand_total; ?>$</td>
                  <td><a href="index.php?delete_all" onclick="return confirm('حذف كل المنتجات من العربة?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">حذف الكل</a></td>
               </tr>
            </tbody>
         </table>



      </div>

   </div>

</body>

</html>