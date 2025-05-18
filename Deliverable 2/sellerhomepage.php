<?php
require_once("sellerfunctions.php");
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
	<?php require_once("stylingdependecies.php") ?>
</head>

<body>
	<!-- header -->
	<?php require_once('sellerheader.php') ?>

	<main>
		<!-- Sign Up heading -->
		<h2 style="display: flex; justify-content: center">Edit Information</h2>

		<!-- Sign Up Form -->
		<form id="editSellerInfoForm" action="editsellerinfo.php" method="POST">
			<div class="container" style="width: 550px">
				<!-- First Name Edit Input Div -->
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" />
					<label for="firstName">First Name</label>
				</div>

				<!-- Last Name Edit Input Div -->
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" />
					<label for="lastName">Last Name</label>
				</div>

				<!-- Phone Number Edit Input Div -->
				<div class="form-floating mb-3">
					<input type="tel" class="form-control" id="phoneNum" name="phoneNum" placeholder="Phone Number" />
					<label for="phoneNum">Phone Number</label>
				</div>

				<!-- Email Address Edit Input Div -->
				<div class="form-floating mb-3">
					<input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="name@example.com" />
					<label for="emailAddress">Email address</label>
				</div>

				<!-- Password Edit Input Div -->
				<div class="form-floating mb-3">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
					<label for="password">Password</label>
				</div>

				<!-- Street Address Edit Input Div -->
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Street Address" />
					<label for="streetAddress">Street Address</label>
				</div>

				<!-- Postcode Edit Input Div -->
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" />
					<label for="postcode">Postcode</label>
				</div>

				<!-- Bank Name Edit Input Div -->
				<div class="form-floating mb-3">
					<?php if (empty($_SESSION['seller']->bankName)): ?>
						<input type="text" class="form-control" id="bankName" name="bankName" placeholder="Bank Name" required />
					<?php else : ?>
						<input type="text" class="form-control" id="bankName" name="bankName" placeholder="Bank Name" />
					<?php endif; ?>
					<label for="bankName">Bank Name</label>
				</div>

				<!-- Branch Code Edit Input Div -->
				<div class="form-floating mb-3">
					<?php if (empty($_SESSION['seller']->branchCode)): ?>
						<input type="text" class="form-control" id="branchCode" name="branchCode" placeholder="Branch Code" required />
					<?php else : ?>
						<input type="text" class="form-control" id="branchCode" name="branchCode" placeholder="Branch Code" />
					<?php endif; ?>
					<label for="branchCode">Branch Code</label>
				</div>

				<!-- Account Number Edit Input Div -->
				<div class="form-floating mb-3">
					<?php if (empty($_SESSION['seller']->accountNumber)): ?>
						<input type="text" class="form-control" id="accountNumber" name="accountNumber" placeholder="Account Number" required />
					<?php else : ?>
						<input type="text" class="form-control" id="accountNumber" name="accountNumber" placeholder="Account Number" />
					<?php endif; ?>
					<label for="accountNumber">Account Number</label>
				</div>


				<!-- Sign Up Button -->
				<div class="container mb-3" style="display: flex; justify-content: center">
					<button type="submit" name="editsellerinfo" value="editsellerinfo" class="btn btn-primary">Edit Information</button>
				</div>

			</div>
		</form>
	</main>

	<!-- Footer -->
	<?php require_once('sellerfooter.php') ?>

	<!-- Seller Sign Out Modal -->
	<?php require_once('signoutmodal.php') ?>
</body>

</html>