<?php
require_once('buyer.php');
require_once('seller.php');
session_start();

if (isset($_POST['editFirstName'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editFirstName($_POST['firstNameEdit']);
    if (isset($_SESSION['seller'])) $_SESSION['seller']->editFirstName($_POST['firstNameEdit']);

    echo "<script>
        alert('Your first name has been changed.');
        window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
    </script>";
    exit;
}

if (isset($_POST['editLastName'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editLastName($_POST['lastNameEdit']);
    if (isset($_SESSION['seller'])) $_SESSION['seller']->editLastName($_POST['lastNameEdit']);

    echo "<script>
        alert('Your last name has been changed.');
        window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
    </script>";
    exit;
}

if (isset($_POST['editPhoneNumber'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editPhoneNumber($_POST['phoneNumberEdit']);
    if (isset($_SESSION['seller'])) $_SESSION['seller']->editPhoneNumber($_POST['phoneNumberEdit']);

    echo "<script>
        alert('Your phone number has been changed.');
        window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
    </script>";
    exit;
}

if (isset($_POST['editPostcode'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editPostcode($_POST['postcodeEdit']);
    if (isset($_SESSION['seller'])) $_SESSION['seller']->editPostcode($_POST['postcodeEdit']);

    echo "<script>
        alert('Your postcode has been changed.');
        window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
    </script>";
    exit;
}

if (isset($_POST['editStreetAddress'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editStreetAddress($_POST['streetAddressEdit']);
    if (isset($_SESSION['seller'])) $_SESSION['seller']->editStreetAddress($_POST['streetAddressEdit']);

    echo "<script>
        alert('Your street address has been changed.');
        window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
    </script>";
    exit;
}

if (isset($_POST['editBankingDetails'])) {
    if (isset($_SESSION['seller'])) $_SESSION['seller']->editBankingDetails($_POST['bankNameEdit'], $_POST['branchCodeEdit'], $_POST['accountNumberEdit']);

    echo "<script>
        alert('Your banking details has been changed.');
        window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
    </script>";
    exit;
}

if (isset($_POST['editDeliveryRate'])) {
    if (isset($_SESSION['seller'])) $_SESSION['seller']->editDeliveryRate($_POST['deliveryRateEdit']);

    echo "<script>
        alert('Your delivery rate has been changed.');
        window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
    </script>";
    exit;
}
