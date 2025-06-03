<?php
require_once('sellerfunctions.php');
require_once('seller.php');
session_start();

if (isset($_POST['editProduct'])) {
    $_SESSION['seller']->editProduct();

    header('location: editproductpage.php');
}
