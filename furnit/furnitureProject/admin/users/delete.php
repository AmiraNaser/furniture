<?php 

require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';
require '../helpers/checkAdmin.php';

$id = $_GET['id'];

$sql = "select image from user where id = $id";
$op  = mysqli_query($con,$sql);
$userData = mysqli_fetch_assoc($op);


$sql = "delete from user where id = $id"; 
$op = mysqli_query($con,$sql);

if($op){

     # Remove Image Of User 
     unlink('./uploads/'.$userData['image']);

    $message = ["Raw Removed"];
}else{
    $message = ["Error Try Again"];
}

   $_SESSION['Message'] = $message;

   header("location: index.php"); 


?>