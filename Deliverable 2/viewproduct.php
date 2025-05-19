<?php
require_once('buyerfunctions.php');
session_start();

if (isset($_POST['viewProduct'])) {
    $productID = $_POST['viewProduct'];
    $productRow = getProductRow($productID);

    $_SESSION['viewProduct'] = new product($productRow);
    header("Location: viewproductpage.php");
    exit;
}
