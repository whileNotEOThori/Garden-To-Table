<?php
require_once('buyerfunctions.php');
require_once('buyer.php');
session_start();

if (isset($_POST['placeOrder'])) {
    $deliveryOrCollection = $_POST['collection/delivery'];

    $_SESSION['buyer']->placeOrder($deliveryOrCollection);
    exit;
}
