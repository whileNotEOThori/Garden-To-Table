<?php
require_once('buyerfunctions.php');
session_start();


if (isset($_POST['quickAddToCart'])) {
    $productID = $_POST['quickAddToCart'];

    if (isset($_SESSION['cart'][$productID]))
        $_SESSION['cart'][$productID]++;
    else
        $_SESSION['cart'][$productID] = 1;

    // Add check to ensure that the buyer cannot add more products that quantity in stock
    //  && $_SESSION['cart'][$productID] + 1 <= getProductRow($productID)['quantity']
    // $_SESSION['cart'][$productID] = ($_SESSION['cart'][$productID] + 1 <= getProductRow($productID)['quantity']) ? $_SESSION['cart'][$productID]++ : $_SESSION['cart'][$productID];

    header("location: buypage.php");
}
