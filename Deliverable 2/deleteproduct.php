<?php
session_start();
include('connect.php');
include('product.php');
include('sellerfunctions.php');

if (isset($_POST['deleteProductNo']) || isset($_POST['deleteProductClose'])) unset($_SESSION['deleteProduct']);

if (isset($_POST['deleteProductYes']))
    if (deleteProduct($_SESSION['deleteProduct']->pID))
        echo "<script> alert('The product has been deleted') </script>";
    else
        echo "<script> alert('The products is not present in the database') </script>";

unset($_SESSION['deleteProduct']);
// header('location: deleteproductpage.php');
exit;
