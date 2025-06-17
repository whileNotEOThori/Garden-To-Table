<?php
require_once('sellerfunctions.php');
require_once('seller.php');
session_start();

if (isset($_POST['editProduct'])) {
    $result = $_SESSION['seller']->editProduct();

    if ($result === true)
        echo "<script> alert('" . $_POST['productName'] . " has been edited.') </script>";
    else
        echo "<script> alert('Failed to edit " . $_POST['productName'] . ": " . htmlspecialchars($result) . ".') </script>";

    echo "<script>    
    window.location.href = 'editproductpage.php';
    </script>";
    exit;
}
