<?php

include 'config.php';
session_start();
$user_id=$_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:../login_user.php');
 };

include('config.php');
$ID = $_GET['id'];

mysqli_query($con, "DELETE FROM products WHERE id='$ID'");
header('location: products.php')


?>