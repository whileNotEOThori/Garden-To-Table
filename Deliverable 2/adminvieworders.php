<?php
require_once("adminfunctions.php");
session_start();

//redirect the user back to the homepage to sign in again if there is no active session
isAdminSignedIn();
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
    <?php require_once('adminheader.php') ?>

    <main>
        <!-- Show all the products the seller has listed -->
        <section id="adminOrdersTable">
            <h2>Orders</h2>
            <?php $_SESSION['admin']->viewOrders() ?>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once('adminfooter.php') ?>

    <!-- Seller Sign Out Modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>