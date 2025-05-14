<?php
session_start();
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
  <!-- Header -->
  <?php require_once("header.php") ?>

  <main>
    <!-- Sign In Heading -->
    <h2 style="display: flex; justify-content: center">Sign In</h2>

    <!-- Sign In Form -->
    <form id="signInForm" action="signin.php" method="POST">
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

        <!-- User Type Selection -->
        <select class="form-select mb-3" id="userType" name="userType" aria-label="User type select" required>
          <option value="" selected>User type</option>
          <option value="buyer">Buyer</option>
          <option value="seller">Seller</option>
          <option value="admin">Admin</option>
        </select>

        <!-- Alternatives -->
        <div class="container" style="display: flex; justify-content: center">
          <div class="row">
            <!-- Redirect To Password Retrieval -->
            <div class="col">
              <a href="">Forgot Password?</a>
            </div>
            <!-- Redirect To Sign Up Page -->
            <div class="col-auto">
              <p>Don't have an account? <a href="signuppage.php">Sign Up</a></p>
            </div>
          </div>
        </div>

        <!-- Sign In Button -->
        <div class="container" style="display: flex; justify-content: center">
          <button type="submit" name="signIn" value="signIn" class="btn btn-primary">Sign In</button>
        </div>
      </div>
    </form>
  </main>

  <!-- Footer -->
  <?php require_once("footer.php") ?>

  <!-- Seller Sign In Modal -->
  <?php require_once("selllersigninmodal.php") ?>

  <!-- Buyer Sign In Modal -->
  <?php require_once("buyersigninmodal.php") ?>
</body>

</html>