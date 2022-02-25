<?php 

session_start(); 
require './admin/helpers/functions.php';

session_destroy();

header("location: ".url('login.php'));


?>