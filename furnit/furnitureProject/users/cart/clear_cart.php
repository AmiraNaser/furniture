<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';

    unset($_SESSION['cart']);
    $_SESSION['message'] = 'Cart cleared successfully';
    header('location: index.php');
?>