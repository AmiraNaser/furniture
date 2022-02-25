<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';

    if(isset($_POST['save'])){
        foreach($_POST['indexes'] as $key){
            $_SESSION['qty_array'][$key] = $_POST['qty_'.$key];
        }
 
        $_SESSION['message'] = 'Cart updated successfully';
        header('location: view_cart.php');
    }
?>