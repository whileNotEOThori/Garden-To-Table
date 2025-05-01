<?php
  session_start();
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
    <header>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <!-- Navbar Logo and Title-->
          <a class="navbar-brand" href="homepage.php"><img src="images/GTT Logo.jpg" alt="Logo" height="100px" class="d-inline-block align-text-top" />Garden To Table</a>
          <!--  -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="sell.html">Sell</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="buy.html">Buy</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="#about">About Us</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="#faq">FAQ</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="#contact">Contact Us</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="signuppage.php">Sign Up</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" aria-current="page" href="signinpage.php">Sign In</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
     
      <!-- <i class="bi bi-person-circle "></i> -->
            
       <?php echo "<script> alert('Welcome back to Garden To Table " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . ".') </script>";  ?>
    </main>

    <!-- Footer -->
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="sell.html" class="nav-link px-2 text-body-secondary">Sell</a></li>
        <li class="nav-item"><a href="buy.html" class="nav-link px-2 text-body-secondary">Buy</a></li>
        <li class="nav-item"><a href="homepage.php#about" class="nav-link px-2 text-body-secondary">About Us</a></li>
        <li class="nav-item"><a href="homepage.php#faq" class="nav-link px-2 text-body-secondary">FAQ</a></li>
        <li class="nav-item"><a href="homepage.php#contact" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
        <li class="nav-item"><a href="signuppage.php" class="nav-link px-2 text-body-secondary">Sign Up</a></li>
        <li class="nav-item"><a href="signinpage.php" class="nav-link px-2 text-body-secondary">Sign In</a></li>
      </ul>
      <p class="text-center text-body-secondary"><img src="images/GTT Logo.jpg" alt="Logo" height="50px" /> Garden To Table ©. All rights reserved.</p>
    </footer>
  </body>
</html>
