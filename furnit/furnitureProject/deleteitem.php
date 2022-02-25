<?php 
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';

$id = $_GET['id'];

$sql = "select image from product where id = $id";
$op  = mysqli_query($con,$sql);
$orderData = mysqli_fetch_assoc($op);

$sql = "delete from orders where id = $id"; 
$op = mysqli_query($con,$sql);

if($op){


    $message = ["Raw Removed"];
}else{
    $message = ["Error Try Again"];
}
   $_SESSION['Message'] = $message;
   header("location: cart_items.php"); 
?>