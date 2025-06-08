<?php
require_once("buyerfunctions.php");
session_start();

//redirect the user back to the homepage to sign in again if there is no active session
isBuyerSignedIn();
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
    <?php require_once('buyerheader.php') ?>

    <main>
        <!-- Show all the products the seller has listed -->
        <section id="buyerOrdersTable">
            <h2>Orders</h2>
            <?php $_SESSION['buyer']->viewOrders() ?>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once('buyerfooter.php') ?>

    <!-- Seller Sign Out Modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>