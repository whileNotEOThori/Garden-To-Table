<?php
require_once("admin.php");
session_start();

isAdminSignedIn();
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
    <?php require_once('adminheader.php') ?>

    <main>
        <h2 class="mb-3">Admin Homepage</h2>

        <div class="row">
            <div class="col col-12 col-md-6 mb-3">
                <section>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text"><strong>First Name: </strong> <?php echo $_SESSION['admin']->firstName ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editFirstNameModal" href="">Edit</a></p>
                            <p class="card-text"><strong>Last Name: </strong> <?php echo $_SESSION['admin']->lastName ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editLastNameModal" href="">Edit</a></p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col col-12 col-md-6 mb-3">
                <section>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Products</h5>
                            <p class="card-text"><strong>Email Address: </strong> <?php echo $_SESSION['admin']->emailAddress ?></p>
                            <p class="card-text"><strong>Phone Number: </strong> <?php echo $_SESSION['admin']->phoneNumber ?> &emsp; <a data-bs-toggle="modal" data-bs-target="#editPhoneNumberModal" href="">Edit</a> </p>
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
                            <h5 class="card-title">Orders</h5>
                            <p class="card-text"><strong>Postcode: </strong> </p>
                            <p class="card-text"><strong>Street Address: </strong> </p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col col-12 col-md-6 mb-3">
                <section>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Finances</h5>
                            <p class="card-text"><strong>Orders Made: </strong> </p>
                            <p class="card-text"><strong>Total Spent: </strong>R </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>


    <!-- Footer -->
    <?php require_once('adminfooter.php') ?>

    <!-- Sign out modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>