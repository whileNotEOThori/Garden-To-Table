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
        <h2>Users</h2>

        <!-- Show all the users registered to the website -->
        <section id="usersTable">
            <?php $_SESSION['admin']->viewUsers() ?>
        </section>
    </main>

    <!-- Footer -->
    <?php require_once('adminfooter.php') ?>

    <!-- Sign Out Modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>