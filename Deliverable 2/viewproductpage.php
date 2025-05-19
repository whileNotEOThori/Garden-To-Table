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

        ?>
        <div class='row p-5'>
            <h2> View Product</h2>
            <div class='col'>
                <img height='250px' width='250px' src='data:image/jpeg;base64,<?php echo $_SESSION['viewProduct']->image; ?>' alt="<?php echo $_SESSION['viewProduct']->name; ?> Image">
            </div>

            <div class='col'>
                <p><strong>Product ID:</strong> <?php echo $_SESSION['viewProduct']->pID; ?></p>
                <p><strong>Name:</strong> <?php echo $_SESSION['viewProduct']->name; ?></p>
                <p><strong>Description:</strong> <?php echo $_SESSION['viewProduct']->description; ?></p>
                <p><strong>Mass:</strong> <?php echo $_SESSION['viewProduct']->mass; ?> g</p>
                <p><strong>Price:</strong> R<?php echo $_SESSION['viewProduct']->price; ?></p>
                <p><strong>Quantity in stock:</strong> <?php echo $_SESSION['viewProduct']->quantity; ?></p>
            </div>

            <div class='col col-12 col-md-4'>
                <form id='viewProductAddToCart' action='addtocart.php' method='POST'>
                    <div class='form-floating mb-3'>
                        <input type='number' class='form-control' id='productQuantity' name='productQuantity' placeholder='Quantity' min='1' max='<?php echo $max; ?>' required />
                        <label for='productQuantity'>Quantity</label>
                    </div>
                    <?php if (isset($_SESSION['cart'][$_SESSION['viewProduct']->pID]) && $_SESSION['cart'][$_SESSION['viewProduct']->pID] == $_SESSION['viewProduct']->quantity): ?>
                        <button type='submit' name='addToCart' value='<?php echo $_SESSION['viewProduct']->pID; ?>' class='btn btn-success' disabled>Add To Cart</button>
                    <?php else: ?>
                        <button type='submit' name='addToCart' value='<?php echo $_SESSION['viewProduct']->pID; ?>' class='btn btn-success'>Add To Cart</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php require_once('buyerfooter.php') ?>

    <!-- Sign out modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>