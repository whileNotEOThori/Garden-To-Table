<?php
require_once("seller.php");
require_once("sellerfunctions.php");
session_start();

//redirect the user back to the homepage to sign in again if there is no active session
isSellerSignedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garden To Table</title>
    <?php require_once("stylingdependecies.php") ?>
</head>

<body>
    <!-- header -->
    <?php require_once('sellerheader.php') ?>

    <main>
        <!-- Show all the products the seller has listed -->
        <section id="productTable">
            <h2>Products</h2>
            <?php viewProducts($_SESSION['seller']->sID) ?>
        </section>

        <!-- Show all the orders wit products the seller has listed -->
        <section id="ordersTable">
            <h2>Orders</h2>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once('sellerfooter.php') ?>

    <!-- Seller Sign Out Modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>