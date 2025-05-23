<?php
require_once('buyerfunctions.php');

if (isset($_POST['checkout']))
    if (count($_SESSION['cart']) > 0) {
        header('location: checkout.php');
    } else {
        echo "<script> alert('There are no products in the cart to check out')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="modal fade" id="cartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cartModalLabel">View Cart</h1>
                    <button type="submit" id="viewCartClose" name="viewCartClose" value="viewCartClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php displayCartProductTable() ?>
                </div>
                <div class="modal-footer">
                    <form id="checkout" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
                        <button type="submit" id="checkout" name="checkout" value="checkout" class="btn btn-primary">Check Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>