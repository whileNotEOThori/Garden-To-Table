<?php
require_once("buyerfunctions.php");
session_start();

isBuyerSignedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garden To Table</title>
    <?php require_once('stylingdependecies.php') ?>
</head>

<body>
    <!-- Header -->
    <?php require_once('buyerheader.php') ?>

    <h2>Check Out</h2>
    <div class="row">
        <div class="col">
            <h3>Cart</h3>
            <?php displayCheckOutProductTable() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <h3>Delivery</h3>
            
        </div>

        <div class="col-12 col-md-6">
            <h3>Payment</h3>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once('buyerfooter.php') ?>

    <!-- Sign out modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>