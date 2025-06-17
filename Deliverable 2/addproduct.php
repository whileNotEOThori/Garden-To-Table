<?php
require_once('connect.php');
require_once('seller.php');
session_start();

if (isset($_POST['addProduct'])) {
    $result = $_SESSION['seller']->addProduct();

    if ($result === true)
        echo "<script> alert('" . $_POST['productName'] . " have been added to your listings.') </script>";
    else
        echo "<script> alert('Failed to add " . $_POST['productName'] . ": " . htmlspecialchars($result) . ".') </script>";

    echo "<script>    
    window.location.href = 'addproductpage.php';
    </script>";
    exit;
}
