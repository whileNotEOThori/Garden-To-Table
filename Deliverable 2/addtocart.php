<?php
require_once('buyerfunctions.php');
session_start();


if (isset($_POST['quickAddToCart'])) {
    $_SESSION['buyer']->quickAddToCart();

    header("location: buypage.php");
}

if (isset($_POST['addToCart'])) {
    $_SESSION['buyer']->addToCart();

    header("location: viewproductpage.php");
}

if (isset($_POST['removeProduct'])) {
    $_SESSION['buyer']->removeFromCart();

    // return to previous page and refresh so that the removed item isnt in the cart anymore
    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}
