<?php 

require '../helpers/dbConnection.php';
require '../helpers/checkLogin.php';


$id = $_GET['id'];

$sql = "select image from subcategory where id = $id";
$op  = mysqli_query($con,$sql);
$subcatData = mysqli_fetch_assoc($op);


$sql = "delete from subcategory where id = $id"; 
$op = mysqli_query($con,$sql);

if($op){

     # Remove Image Of User 
     unlink('./uploads/'.$subcatData['image']);

    $message = ["Raw Removed"];
}else{
    $message = ["Error Try Again"];
}

   $_SESSION['Message'] = $message;

   header("location: index.php"); 


?>