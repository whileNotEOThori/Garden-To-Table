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
    <!-- Sign Up heading -->
    <h2 style="display: flex; justify-content: center">Sign Up</h2>

    <!-- Sign Up Form -->
    <form id="signUpForm" action="signup.php" method="POST">
      <div class="container" style="width: 400px">
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
  <?php require_once("footer.php") ?>

  <!-- Seller Sign In Modal -->
  <?php require_once("selllersigninmodal.php") ?>

  <!-- Buyer Sign In Modal -->
  <?php require_once("buyersigninmodal.php") ?>
</body>

</html>