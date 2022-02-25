<?php 

require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';
require '../helpers/checkAdmin.php';

$id = $_GET['id'];


$sql = "delete from orders where id = $id"; 
$op = mysqli_query($con,$sql);

if($op){

    $message = ["Raw Removed"];
}else{
    $message = ["Error Try Again"];
}

   $_SESSION['Message'] = $message;

   header("location: index.php"); 


?>