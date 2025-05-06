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
              <!-- Redirect the seller to the sellerhomepage if they already have an active session -->
              <?php if (!empty($_SESSION['firstName']) && $_SESSION['userType'] === 'seller'): ?>
                <li class="nav-item"><a class="nav-link" id="header-nav-link" href="sellerhomepage.php">Sell</a></li>
              <?php else: ?>  <!-- Open the seller sign in modal if there no active session -->
                <li class="nav-item"><a class="nav-link" id="header-nav-link" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sell</a></li>
              <?php endif; ?>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="buy.html">Buy</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="homepage.php#about">About Us</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="homepage.php#faq">FAQ</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="homepage.php#contact">Contact Us</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" href="signuppage.php">Sign Up</a></li>
              <li class="nav-item"><a class="nav-link" id="header-nav-link" aria-current="page" href="signinpage.php">Sign In</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <!-- Sign Up heading -->
      <h2 style="display: flex; justify-content: center">Sign Up</h2>

      <!-- Sign Up Form -->
      <form id="signUpForm" action="signup.php" method="POST">
        <div class="container" style="width: 550px">
          <!-- First Name Input Div -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required />
            <label for="firstName">First Name</label>
          </div>

          <!-- Last Name Input Div -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required />
            <label for="lastName">Last Name</label>
          </div>

          <!-- Phone Number Input Div -->
          <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="phoneNum" name="phoneNum" placeholder="Phone Number" required />
            <label for="phoneNum">Phone Number</label>
          </div>

          <!-- Email Address Input Div -->
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="name@example.com" required />
            <label for="emailAddress">Email address</label>
          </div>

          <!-- Password Input Div -->
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
            <label for="password">Password</label>
          </div>

          <!-- Street Address Input Div -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Street Address" required />
            <label for="streetAddress">Street Address</label>
          </div>

          <!-- Postcode Input Div -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" required />
            <label for="postcode">Postcode</label>
          </div>

          <!-- User Type Selection -->
          <select class="form-select mb-3" id="userType" name="userType" aria-label="User type select" required>
            <option value="" selected>User type</option>
            <option value="buyer">Buyer</option>
            <option value="seller">Seller</option>
          </select>

          <!-- Terms and Conditions -->
          <div class="container" style="display: flex; justify-content: center">
            <p>By clicking "Sign Up", I agree to the following: <a href="">Terms and Conditions</a></p>
          </div>

          <!-- Sign Up Button -->
          <div class="container mb-3" style="display: flex; justify-content: center">
            <button type="submit" name="signUp" value="signUp" class="btn btn-primary">Sign Up</button>
          </div>

          <!-- Redirect To Sign Up Page -->
          <div class="container" style="display: flex; justify-content: center">
            <p>Already have an account? <a href="signinpage.php">Sign In</a></p>
          </div>
        </div>
      </form>
    </main>

    <!-- Footer -->
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <!-- Redirect the seller to the sellerhomepage if they already have an active session -->
        <?php if (!empty($_SESSION['firstName']) && $_SESSION['userType'] === 'seller'): ?>
          <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="sellerhomepage.php">Sell</a></li>
        <?php else: ?>  <!-- Open the seller sign in modal if there no active session -->
          <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sell</a></li>
        <?php endif; ?>
        <li class="nav-item"><a href="buy.html" class="nav-link px-2 text-body-secondary">Buy</a></li>
        <li class="nav-item"><a href="homepage.php#about" class="nav-link px-2 text-body-secondary">About Us</a></li>
        <li class="nav-item"><a href="homepage.php#faq" class="nav-link px-2 text-body-secondary">FAQ</a></li>
        <li class="nav-item"><a href="homepage.php#contact" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
        <li class="nav-item"><a href="signuppage.php" class="nav-link px-2 text-body-secondary">Sign Up</a></li>
        <li class="nav-item"><a href="signinpage.php" class="nav-link px-2 text-body-secondary">Sign In</a></li>
      </ul>
      <p class="text-center text-body-secondary"><img src="images/GTT Logo.jpg" alt="Logo" height="50px" /> Garden To Table ©. All rights reserved.</p>
    </footer>

    <!-- Seller Sign In Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Seller Sign In</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Sign In Form -->
            <form id="sellerSignInForm" action="signin.php" method="POST">
              <div class="container" style="width: 450px">
                <!-- Email Address Input Div -->
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="name@example.com" required />
                  <label for="emailAddress">Email address</label>
                </div>

                <!-- Password Input Div -->
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                  <label for="password">Password</label>
                </div>
              </div>

              <?php $_SESSION['userType'] = "seller";?>

              <!-- Sign In Button -->
              <div class="container" style="display: flex; justify-content: center">
                <button type="submit" name="sellerSignIn" value="sellerSignIn" class="btn btn-primary">Sign In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
