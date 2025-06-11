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
          <p>By clicking "Sign Up", I agree to the following: <a href="" data-bs-toggle="modal" data-bs-target="#termsAndCondtions">Terms and Conditions</a></p>
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

  <!--Terms and Condition Modal -->
  <div class="modal fade" id="termsAndCondtions" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="termsAndCondtionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="termsAndCondtionsLabel">Terms and Conditions</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5>By signing up for Garden To Table, you agree to the following terms:</h5>

          <p><strong>1. Eligibility<br></strong>
            You must be at least 18 years old or have parental consent to register.
            You agree to provide accurate and truthful information.</p>

          <p><strong>2. Account Responsibility<br></strong>
            You are responsible for maintaining the confidentiality of your login credentials.
            You must notify us immediately of any unauthorized use of your account.</p>

          <p><strong>3. Conduct<br></strong>
            You agree not to misuse the platform for illegal activities, spamming, or harmful conduct.
            You must not post false or misleading product listings.</p>

          <p><strong>4. Transactions<br></strong>
            Garden To Table is not responsible for the quality, delivery, or payment of goods exchanged. We simply connect buyers and sellers.
            All transactions are to be negotiated and completed between the two parties.</p>

          <p><strong>5. Content and Listings<br></strong>
            You are responsible for any content or product listings you post.
            Offensive, misleading, or illegal content will be removed and may result in account suspension.</p>

          <p><strong>6. Privacy<br></strong>
            We respect your privacy and only collect information necessary to support platform functionality.
            We do not share your personal information with third parties without your consent.</p>

          <p><strong>7. Changes and Updates<br></strong>
            We may update these terms from time to time. Continued use of the platform after changes means you agree to the new terms.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>