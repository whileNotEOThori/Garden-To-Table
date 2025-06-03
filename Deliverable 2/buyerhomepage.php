<?php
require_once("buyerfunctions.php");
session_start();

isBuyerSignedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garden To Table</title>
    <?php require_once('stylingdependecies.php') ?>
</head>

<body>
    <!-- Header -->
    <?php require_once('buyerheader.php') ?>

    <main>
        <h2 class="mb-3">Buyer Homepage</h2>

        <div class="row">
            <div class="col col-12 col-md-6 mb-3">
                <section>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Information</h5>
                            <p class="card-text"><strong>First Name: </strong> <?php echo $_SESSION['buyer']->firstName ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editFirstNameModal" href="">Edit</a></p>
                            <p class="card-text"><strong>Last Name: </strong> <?php echo $_SESSION['buyer']->lastName ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editLastNameModal" href="">Edit</a></p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col col-12 col-md-6 mb-3">
                <section>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Contact Details</h5>
                            <p class="card-text"><strong>Email Address: </strong> <?php echo $_SESSION['buyer']->emailAddress ?></p>
                            <p class="card-text"><strong>Phone Number: </strong> <?php echo $_SESSION['buyer']->phoneNumber ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editPhoneNumberModal" href="">Edit</a> </p>
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
                            <p class="card-text"><strong>Postcode: </strong> <?php echo $_SESSION['buyer']->postcode ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editPostcodeModal" href="">Edit</a> </p>
                            <p class="card-text"><strong>Street Address: </strong> <?php echo $_SESSION['buyer']->streetAddress ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editStreetAddressModal" href="">Edit</a></p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col col-12 col-md-6 mb-3">
                <section>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">History</h5>
                            <p class="card-text"><strong>Orders Made: </strong> <?php echo $_SESSION['buyer']->firstName ?></p>
                            <p class="card-text"><strong>Total Spent: </strong>R <?php echo $_SESSION['buyer']->streetAddress ?></p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <!-- Cart modal -->
    <?php require_once('cartmodal.php') ?>

    <!-- Footer -->
    <?php require_once('buyerfooter.php') ?>

    <!-- Sign out modal -->
    <?php require_once('signoutmodal.php') ?>

    <!-- Edit user info modals -->
    <?php require_once('editUserInfoModals.php') ?>
</body>

</html>