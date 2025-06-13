<?php
require_once('connect.php');
require_once('seller.php');
session_start();

//redirect the user back to the homepage to sign in again if there is no active session
if (empty($_SESSION['seller'])) {
    // echo "<script> alert('You have been signed out. Sign In again.') </script>";
    header("location: index.php");
    exit;
}

if (isset($_POST['addProduct'])) {
    $_SESSION['seller']->addProduct();

    header("location: addproductpage.php");
}
