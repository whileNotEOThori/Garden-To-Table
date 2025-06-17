<?php
require_once('connect.php');
require_once('seller.php');
session_start();

if (isset($_POST['addProduct'])) {
    $_SESSION['seller']->addProduct();

    header("location: addproductpage.php");
}
