<?php
require_once('buyerfunctions.php');
session_start();


if (isset($_POST['quickAddToCart'])) {
    $productID = $_POST['quickAddToCart'];

    if (isset($_SESSION['cart'][$productID]))
        $_SESSION['cart'][$productID]++;
    else
        $_SESSION['cart'][$productID] = 1;

    header("location: buypage.php");
}

if (isset($_POST['addToCart'])) {
    $productID = $_POST['addToCart'];
    $quantity = $_POST['productQuantity'];

    if ($quantity == 0)
        unset($_SESSION['cart'][$productID]);
    else
        $_SESSION['cart'][$productID] = $quantity;

    header("location: viewproductpage.php");
}

if (isset($_POST['removeProduct'])) {
    $productID = $_POST['removeProduct'];

    // Remove the selected product from the cart
    unset($_SESSION['cart'][$productID]);

    // If the cart is now empty, reset it to an empty array
    if (empty($_SESSION['cart'])) $_SESSION['cart'] = array();

    // return to previous page and refresh so that the removed item isnt in the cart anymore
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}
