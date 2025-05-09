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
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Seller Sign In</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Sign In Form -->
          <form id="sellerSignOutForm" action="signout.php" method="POST">
            <div class="container" style="width: 450px">
              <!-- Message -->
              <p class="text-center">Are you sure you want to sign out?</p>
              <p class="text-center">All you progress will be lost.</p>
            </div>

            <!-- Sign In Button -->
            <div class="container" style="display: flex; justify-content: center">
              <button type="submit" name="signOut" value="signOut" class="btn btn-primary">Sign Out</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>