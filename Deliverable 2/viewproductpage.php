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
        <?php
        if (isset($_SESSION['cart'][$_SESSION['viewProduct']->pID]))
            $max = $_SESSION['viewProduct']->quantity - $_SESSION['cart'][$_SESSION['viewProduct']->pID];
        else
            $max =  $_SESSION['viewProduct']->quantity;

        echo "<div class='row p-5'>
                <h2> View Product</h2>
                <div class='col'>
                    <img height='250px' width='250px' src='data:image/jpeg;base64," . $_SESSION['viewProduct']->image . "'  alt=" . $_SESSION['viewProduct']->name . " Image>
                </div>

                <div class='col'>
                    <p><strong>Product ID:</strong> " . $_SESSION['viewProduct']->pID . "</p>
                    <p><strong>Name:</strong> " . $_SESSION['viewProduct']->name . "</p>
                    <p><strong>Description:</strong> " . $_SESSION['viewProduct']->description . "</p>
                    <p><strong>Mass:</strong> " . $_SESSION['viewProduct']->mass . " g</p>
                    <p><strong>Price:</strong> R" . $_SESSION['viewProduct']->price . "</p>
                    <p><strong>Quantity in stock:</strong> " . $_SESSION['viewProduct']->quantity . "</p>
                </div>

                <div class='col col-12 col-md-4'>
                    <form id='viewProductAddToCart' action='addtocart.php' method='POST'>
                        <div class='form-floating mb-3'>
                            <input type='number' class='form-control' id='productQuantity' name='productQuantity' placeholder='Quantity' min='1' max='" . $max . "' required />
                            <label for='productQuantity'>Quantity</label>
                        </div>

                        <button type='submit' name='addToCart' value=" . $_SESSION['viewProduct']->pID . " class='btn btn-success'>Add To Cart</button>
                    </form>
                </div>
            </div>"
        ?>
    </main>

    <!-- Footer -->
    <?php require_once('buyerfooter.php') ?>

    <!-- Sign out modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>