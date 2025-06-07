<?php
require_once("buyerfunctions.php");
session_start();

isBuyerSignedIn();

if (isset($_POST['delivery']))
    $deliveryFee = $_SESSION['buyer']->calcDeliveryFee();
else
    $deliveryFee = 0.00;
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

    <h2>Check Out</h2>
    <div class="row">
        <div class="col">
            <h3>Cart</h3>
            <?php displayCheckOutProductTable() ?>
        </div>
    </div>
    <form id="placeOrderForm" action="placeorder.php" method="POST">

        <div class="row">
            <div class="col-12 col-md-6">
                <h3>Delivery</h3>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="collection/delivery" id="collection" value="collection" checked>
                    <label class="form-check-label" for="collection">Collection</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="collection/delivery" id="delivery" value="delivery">
                    <label class="form-check-label" for="delivery">Delivery</label>
                </div>


                <h3>Order Summary</h3>

                <p><strong>Total:</strong> R <?php echo  $_SESSION['buyer']->getCartTotal() ?> </p>
                <p><strong>Service Fee:</strong> R<?php echo $_SESSION['buyer']->getCartTotal() * $_ENV['SERVICE_FEE'] ?> </p>
                <p><strong>Delivery Fee:</strong> R<span id="deliveryFee"><?php echo $deliveryFee ?></span> </p>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const deliveryFeeElem = document.getElementById('deliveryFee');
                        const radios = document.querySelectorAll('input[name="collection/delivery"]');
                        const deliveryFee = <?php echo json_encode($_SESSION['buyer']->calcDeliveryFee()); ?>;
                        radios.forEach(function(radio) {
                            radio.addEventListener('change', function() {
                                if (this.value === 'delivery') {
                                    deliveryFeeElem.textContent = deliveryFee;
                                } else {
                                    deliveryFeeElem.textContent = '0.00';
                                }
                            });
                        });
                    });
                </script>

                <h4 style="color: white;">
                    <strong>Grand Total:</strong> R
                    <span id="grandTotal">
                        <?php echo $_SESSION['buyer']->getCartTotal() * (1 + $_ENV['SERVICE_FEE']) + $deliveryFee ?>
                    </span>
                </h4>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const radios = document.querySelectorAll('input[name="collection/delivery"]');
                        const deliveryFee = <?php echo json_encode($_SESSION['buyer']->calcDeliveryFee()); ?>;
                        const cartTotal = <?php echo json_encode($_SESSION['buyer']->getCartTotal()); ?>;
                        const serviceFee = <?php echo json_encode($_ENV['SERVICE_FEE']); ?>;
                        const grandTotalElem = document.getElementById('grandTotal');

                        function updateGrandTotal(selectedDelivery) {
                            let total = cartTotal * (1 + parseFloat(serviceFee));
                            if (selectedDelivery === 'delivery') {
                                total += parseFloat(deliveryFee);
                            }
                            grandTotalElem.textContent = total.toFixed(2);
                        }

                        radios.forEach(function(radio) {
                            radio.addEventListener('change', function() {
                                updateGrandTotal(this.value);
                            });
                        });

                        // Set initial value
                        const checkedRadio = document.querySelector('input[name="collection/delivery"]:checked');
                        updateGrandTotal(checkedRadio ? checkedRadio.value : 'collection');
                    });
                </script>

            </div>

            <div class="col-12 col-md-6">
                <h3>Payment</h3>
                <!-- <form id="placeOrderForm" action="placeorder.php" method="POST"> -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="card" id="credit" value="credit" checked>
                    <label class="form-check-label" for="credit">Credit Card</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="card" id="debit" value="debit">
                    <label class="form-check-label" for="credit">Debit Card</label>
                </div>

                <div class="row mt-3">
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nameOnCard" placeholder="nameOnCard">
                            <label for="nameOnCard">Name on Card</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cardNumber" placeholder="cardNumber">
                            <label for="cardNumber">Card Number</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="expiration" placeholder="expiration">
                            <label for="expiration">Expiration</label>
                        </div>
                    </div>

                    <div class="col-6 col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="CVV" placeholder="CVV">
                            <label for="CVV">CVV</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <button type="submit" name="placeOrder" value="placeOrder" class="btn btn-success align-self-start">Place Order</button>
                </div>
            </div>
        </div>

    </form>

    <!-- Footer -->
    <?php require_once('buyerfooter.php') ?>

    <!-- Sign out modal -->
    <?php require_once('signoutmodal.php') ?>
</body>

</html>