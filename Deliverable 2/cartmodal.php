<?php
require_once('buyerfunctions.php');
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
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form id="checkout" action="checkout.php" enctype="multipart/form-data" method="POST">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cartModalLabel">View Cart</h1>
                        <button type="submit" id="viewCartClose" name="viewCartClose" value="viewCartClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php displayCartProductTable() ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="checkout" name="checkout" value="checkout" class="btn btn-success">Check Out</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>