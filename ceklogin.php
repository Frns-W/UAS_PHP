<?php 
session_start();
if(!isset($_SESSION['ses_username']) AND !isset($_COOKIE['coo_username'])){
    header("location:http://localhost/Php_Frans/UAS_PHP/login.php");
    exit;
}    
?>