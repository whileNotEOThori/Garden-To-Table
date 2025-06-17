<?php
require_once('sellerfunctions.php');
require_once('seller.php');
session_start();

if (isset($_POST['deleteProductNo']) || isset($_POST['deleteProductClose'])) unset($_SESSION['deleteProduct']);

if (isset($_POST['deleteProductYes']))
    if ($_SESSION['seller']->deleteProduct($_SESSION['deleteProductRow']['pID']))
        echo "<script> alert('The product has been deleted') </script>";
    else
        echo "<script> alert('The products is not present in the database') </script>";

unset($_SESSION['deleteProductRow']);

echo "<script>    
    window.location.href = 'deleteproductpage.php';
    </script>";
exit;
