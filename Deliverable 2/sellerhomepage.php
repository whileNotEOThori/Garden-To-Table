<?php
include("seller.php");
include("sellerfunctions.php");
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
  <?php include("stylingdependecies.php") ?>
</head>

<body>
  <!-- header -->
  <?php include('sellerheader.php') ?>

  <main>

    <!-- <i class="bi bi-person-circle "></i> -->

  </main>

  <!-- Footer -->
  <?php include('sellerfooter.php') ?>

  <!-- Seller Sign Out Modal -->
  <?php include('signoutmodal.php') ?>
</body>

</html>