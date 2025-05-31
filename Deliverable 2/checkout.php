<?php
require_once('buyerfunctions.php');
session_start();

if (isset($_POST['checkout'])) {

    if (count($_SESSION['cart']) == 0) {
        echo "<script> alert('There are no products in the cart to check out')</script>";
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    foreach ($_SESSION['cart'] as $productID => $quantity) {
        $_SESSION['cart'][$productID] = $_POST["p" . $productID . "Quantity"];
    }

    header("location: checkoutpage.php");
    exit;
}

header('Location: ' . $_SERVER["HTTP_REFERER"]);
exit;
