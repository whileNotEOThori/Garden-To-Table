<?php
require_once('buyerfunctions.php');
session_start();

if (isset($_POST['checkout'])) {
    $_SESSION['buyer']->checkOut();

    header("location: checkoutpage.php");
    exit;
}

header('Location: ' . $_SERVER["HTTP_REFERER"]);
exit;
