<?php
require_once("sellerfunctions.php");
session_start();

//redirect the user back to the homepage to sign in again if there is no active session
isSellerSignedIn();

$_SESSION['seller']->getSellerInsights()
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
		<h2 class="mb-3">Seller Homepage</h2>

		<div class="row">
			<div class="col col-12 col-md-6 mb-3">
				<section>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Information</h5>
							<p class="card-text"><strong>First Name: </strong> <?php echo $_SESSION['seller']->firstName ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editFirstNameModal" href="">Edit</a></p>
							<p class="card-text"><strong>Last Name: </strong> <?php echo $_SESSION['seller']->lastName ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editLastNameModal" href="">Edit</a></p>
						</div>
					</div>
				</section>
			</div>

			<div class="col col-12 col-md-6 mb-3">
				<section>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Contact Details</h5>
							<p class="card-text"><strong>Email Address: </strong> <?php echo $_SESSION['seller']->emailAddress ?></p>
							<p class="card-text"><strong>Phone Number: </strong> <?php echo $_SESSION['seller']->phoneNumber ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editPhoneNumberModal" href="">Edit</a> </p>
						</div>
					</div>
				</section>
			</div>
		</div>

		<div class="row">
			<div class="col col-12 col-md-6 mb-3">
				<section>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Address</h5>
							<p class="card-text"><strong>Postcode: </strong> <?php echo $_SESSION['seller']->postcode ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editPostcodeModal" href="">Edit</a> </p>
							<p class="card-text"><strong>Street Address: </strong> <?php echo $_SESSION['seller']->streetAddress ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editStreetAddressModal" href="">Edit</a></p>
							<p class="card-text"><strong>Delivery Rate: </strong> R<?php echo $_SESSION['seller']->deliveryRate ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editDeliveryRateModal" href="">Edit</a></p>
						</div>
					</div>
				</section>
			</div>
			<div class="col col-12 col-md-6 mb-3">
				<section>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Banking Details &emsp; <a data-bs-toggle="modal" data-bs-target="#editBankDetailsModal" href="">Edit</a></h5>
							<p class="card-text"><strong>Bank Name: </strong> <?php echo $_SESSION['seller']->bankName ?></p>
							<p class="card-text"><strong>Branch Code: </strong> <?php echo $_SESSION['seller']->branchCode ?></p>
							<p class="card-text"><strong>Account Number: </strong> <?php echo $_SESSION['seller']->accountNumber ?></p>
						</div>
					</div>
				</section>
			</div>
		</div>

		<div class="row">
			<div class="col col-12 col-md-4 mb-3">
				<section>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Products</h5>
							<p class="card-text"><strong>Number of products listed: </strong> <?php echo $_SESSION['seller']->getNumListedProducts() ?></p>
							<p class="card-text"><strong>Number of products sold: </strong> <?php echo $_SESSION['seller']->numProductsSold ?></p>
						</div>
					</div>
				</section>
			</div>

			<div class="col col-12 col-md-4 mb-3">
				<section>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Orders</h5>
							<p class="card-text"><strong>Numbers of orders: </strong> <?php echo $_SESSION['seller']->numOrders ?></p>
							<p class="card-text"><strong>Orders Processed: </strong> <?php echo $_SESSION['seller']->numOrdersProcessed ?></p>
							<p class="card-text"><strong>Orders Pending: </strong> <?php echo $_SESSION['seller']->numOrdersPending ?></p>
						</div>
					</div>
				</section>
			</div>

			<div class="col col-12 col-md-4 mb-3">
				<section>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Revenue</h5>
							<p class="card-text"><strong>Total Sales: </strong> <?php echo $_SESSION['seller']->totalSales ?></p>
							<p class="card-text"><strong>Paid out: </strong> <?php echo $_SESSION['seller']->branchCode ?></p>
							<p class="card-text"><strong>Pending: </strong> <?php echo $_SESSION['seller']->accountNumber ?></p>
						</div>
					</div>
				</section>
			</div>
		</div>

	</main>

	<!-- Footer -->
	<?php require_once('sellerfooter.php') ?>

	<!-- Seller Sign Out Modal -->
	<?php require_once('signoutmodal.php') ?>

	<!-- Edit user info modals -->
	<?php require_once('editUserInfoModals.php') ?>
</body>

</html>