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
                            <p class="card-text"><strong>Number of Users: </strong> <?php echo $_SESSION['admin']->getNumUsers() ?></p>
                            <p class="card-text"><strong>Number of Admins: </strong> <?php echo $_SESSION['admin']->getNumAdmins() ?></p>
                            <p class="card-text"><strong>Number of Buyers: </strong> <?php echo $_SESSION['admin']->getNumBuyers() ?></p>
                            <p class="card-text"><strong>Number of Sellers: </strong> <?php echo $_SESSION['admin']->getNumSellers() ?></p>

                            <button type="submit" data-bs-toggle="modal" data-bs-target="#createAdminModal" class="btn btn-primary">Create Admin</button>
                            <button type="submit" data-bs-toggle="modal" data-bs-target="#deleteUserModal" class="btn btn-danger">Delete User</button>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col col-12 col-md-6 mb-3">
                <section>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Products</h5>
                            <p class="card-text"><strong>Number of Products: </strong> <?php echo $_SESSION['admin']->getNumProducts() ?></p>
                            <p class="card-text"><strong>Number of Categories: </strong> <?php echo $_SESSION['admin']->getNumCategories() ?></p>

                            <button type="submit" data-bs-toggle="modal" data-bs-target="#addCategoryModal" class="btn btn-primary">Add Category</button>
                            <button type="submit" data-bs-toggle="modal" data-bs-target="#deleteProductModal" class="btn btn-danger">Delete Product</button>
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
                            <p class="card-text"><strong>Number of Orders Made: </strong><?php echo $_SESSION['admin']->getNumOrders(); ?> </p>
                            <p class="card-text"><strong>Number of Orders Requesting Delivery:</strong> <?php echo $_SESSION['admin']->getNumDeliveryOrders(); ?> </p>
                            <p class="card-text"><strong>Number of Orders Requesting Collection: </strong><?php echo $_SESSION['admin']->getNumCollectionOrders(); ?> </p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col col-12 col-md-6 mb-3">
                <section>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Finances</h5>
                            <p class="card-text"><strong>Total Sales: </strong>R <?php echo $_SESSION['admin']->getTotalSales(); ?> </p>
                            <p class="card-text"><strong>Total Service Fees: </strong>R <?php echo $_SESSION['admin']->getTotalServiceFees(); ?></p>
                            <p class="card-text"><strong>Total Delivery Fees: </strong>R <?php echo $_SESSION['admin']->getTotalDeliveryFees(); ?></p>
                            <p class="card-text"><strong>Total Sales to be Paid Out: </strong>R <?php echo $_SESSION['admin']->getTotalUnpaid(); ?> </p>

                            <button type="submit" data-bs-toggle="modal" data-bs-target="#payOutModal" class="btn btn-primary">Pay Out</button>
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

    <!-- Admin modal -->
    <?php require_once('adminModals.php') ?>
</body>

</html>