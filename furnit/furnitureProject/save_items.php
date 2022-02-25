<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';

if(isset($_POST['save_item']))
{
$user_id = $_SESSION['User']['id'];
$product_id = $_POST['product_id'];
$order_price = $_POST['order_price'];
$order_quantity = $_POST['order_quantity'];
$order_total=$order_price * $order_quantity;
$order_status='Pending';

$sql="insert into orders (user_id,product_id,quantity,total,order_status, order_date) VALUE ($user_id,$product_id,$order_quantity,$order_total,'$order_status',CURDATE())";
$op = mysqli_query($con,$sql);
echo "<script>alert('Item successfully added to cart!')</script>";				
echo "<script>window.open('products.php?id=1','_self')</script>";
}

?>
