<?php
session_start();
include('connect.php');
include('editproductfunctions.php');

if (isset($_POST['searchProductID'])) {
    $_SESSION['productID'] = $_POST['productID+Name'];
    // header('location: editproductpage.php');
    print_r(getProductName());
}
