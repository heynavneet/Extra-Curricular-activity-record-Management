<?php 
session_start();
unset($_SESSION['admin_id']);

unset($_COOKIE['admin_id']);
unset($_COOKIE['admin_key']);
setcookie('admin_id', '', time() - 604800,"/","", 0);
setcookie('admin_key', '', time() - 604800,"/","", 0);


header('location: index.php');