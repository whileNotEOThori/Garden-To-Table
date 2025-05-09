<?php
include("seller.php");
session_start();

//redirect the user back to the homepage to sign in again if there is no active session
if (empty($_SESSION['seller'])) {
  // echo "<script> alert('You have been signed out. Sign In again.') </script>";
  header("location: homepage.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Garden To Table</title>
  <!-- Icon next to title on tab -->
  <link rel="icon" href="images/GTT Logo.jpg" />
  <!-- Bootstrap CDN link -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <!-- link to stylesheet -->
  <link rel="stylesheet" href="style.css" />
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