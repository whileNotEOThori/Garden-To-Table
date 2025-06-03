<?php
require_once('buyer.php');
session_start();

if (isset($_POST['editFirstName'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editFirstName($_POST['firstNameEdit']);

    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}

if (isset($_POST['editLastName'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editLastName($_POST['lastNameEdit']);

    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}

if (isset($_POST['editPhoneNumber'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editPhoneNumber($_POST['phoneNumberEdit']);

    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}

if (isset($_POST['editPostcode'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editPostcode($_POST['postcodeEdit']);

    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}

if (isset($_POST['editStreetAddress'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editStreetAddress($_POST['streetAddressEdit']);

    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}