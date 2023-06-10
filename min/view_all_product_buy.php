 <?php
   include 'config.php';
  
include 'config.php';
session_start();
$user_id=$_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:../login_user.php');
 };
 


   ?>
 <!DOCTYPE html>
 <html lang="ar">

 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عربة التسوق</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

 </head>
 <style>
    .back {
       display: flex;
       justify-content: space-between;
       box-shadow: 2px 1px 10px slateblue;

       border-left: 6px solid slateblue;
       border-right: 6px solid slateblue;
       border-bottom: 3px solid slateblue;
       border-radius: 10px;
       width: 80%;
       margin: 10px auto;
       padding: 10px;
       margin-top: 20px;

    }

    table {
       direction: rtl;
       border-collapse: collapse;
       width: 50%;
       margin: 10px auto;
       text-align: center;
       font-size: 20px;
       box-shadow: 2px 1px 10px slateblue;

       border-left: 6px solid slateblue;
       border-right: 6px solid slateblue;
       border-bottom: 3px solid slateblue;
       border-radius: 10px;
       width: 80%;
       margin: 10px auto;
       padding: 10px;
    }

    td {
       width: fit-content;
    }

    td:nth-child(even) {
       background-color: whitesmoke;
    }

    th,
    tfoot:nth-child(odd) {
       background-color: slateblue;
       padding: 5px;
    }

    .heading {
       text-align: center;
       box-shadow: 2px 1px 10px slateblue;

       border-left: 6px solid slateblue;
       border-right: 6px solid slateblue;
       border-bottom: 3px solid slateblue;
       border-radius: 10px;
       width: 80%;
       margin: 10px auto;
       padding: 10px;
    }

    .readonly {
       border: none;
       outline: none;
       padding: 5px;
       width: 35px;
       font-size:20px;
       font-weight: 900;

       text-align: center;
       background-color: whitesmoke;

    }

    .size_img {
       width: 150px;
       height: 100px;
    }
 </style>

 <body>



    <div class="shopping-cart">
       <center>
          <div class="back">

             <div><a href="../admin/" class='btn btn-primary'>رفع منتج جديد</a></div>
             <h2>جميع منتجات الموجودة في عربة التسوق العملاء</h2>
             <div><a href="products.php" class='btn btn-primary'>عرض كل المنتجات</a></div>

          </div>
       </center>


       <table border="2">
          <thead>
             <th>الصورة</th>
             <th>الاسم</th>
             <th>السعر</th>
             <th>العدد</th>
             <th>السعر الكلي</th>

          </thead>
          <tbody>
             <?php
               include('config.php');
               $cart_query = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
               $grand_total = 0;
               if (mysqli_num_rows($cart_query) > 0) {
                  while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
               ?>
                   <tr>
                      <td class="size_img"><img class="size_img" src="<?php echo $fetch_cart['image']; ?>" height="75" width="100" alt=""></td>
                      <td><?php echo $fetch_cart['name']; ?></td>
                      <td><?php echo $fetch_cart['price']; ?>$ </td>
                      <td>
                         <form action="" method="post">
                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                            <input class="readonly" readonly type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                         </form>
                      </td>
                      <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>$</td>
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
             </tr>
          </tbody>
       </table>



    </div>
 </body>

 </html>