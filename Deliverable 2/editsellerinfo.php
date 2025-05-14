<?php
require_once('connect.php');
require_once('sellerfunctions.php');
require_once('seller.php');
session_start();

if (isset($_POST['editsellerinfo'])) {
    //retrieve/extract the edited product information entered in the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNum'];
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];
    $streetAddress = $_POST['streetAddress'];
    $postcode = $_POST['postcode'];
    $bankName = $_POST['bankName'];
    $branchCode = $_POST['branchCode'];
    $accountNumber = $_POST['accountNumber'];

    if ($bankName == "" && empty($_SESSION['seller']->bankName)) {
        echo "<script> alert('You have not entered your banking details. Please provide your bank name')</script>";
        exit;
    }

    if ($branchCode == "" && empty($_SESSION['seller']->branchCode)) {
        echo "<script> alert('You have not entered your banking details. Please provide your branch code')</script>";
        exit;
    }

    if ($accountNumber == "" && empty($_SESSION['seller']->accountNumber)) {
        echo "<script> alert('You have not entered your banking details. Please provide your account number')</script>";
        exit;
    }

    if ($firstName == "" && $lastName == "" && $phoneNumber == "" && $emailAddress == "" && $password == "" && $streetAddress == "" && $postcode == "" && $bankName == "" && $branchCode == "" && $accountNumber == "") {
        echo "<script> alert('You have made an edits to your information')</script>";
        exit;
    }

    if ($firstName != "") $_SESSION['seller']->firstName = $firstName;

    if ($lastName != "") $_SESSION['seller']->lastName = $lastName;

    if ($phoneNumber != "") $_SESSION['seller']->phoneNumber = $phoneNumber;

    if ($emailAddress != "") $_SESSION['seller']->emailAddress = $emailAddress;

    if ($password != "") $_SESSION['seller']->password = password_hash($password, PASSWORD_BCRYPT);

    if ($streetAddress != "") $_SESSION['seller']->streetAddress = $streetAddress;

    if ($postcode != "") $_SESSION['seller']->postcode = $postcode;

    if ($bankName != "") $_SESSION['seller']->bankName = $bankName;

    if ($branchCode != "") $_SESSION['seller']->branchCode = $branchCode;

    if ($accountNumber != "") $_SESSION['seller']->accountNumber = $accountNumber;

    if (!editSellerData($_SESSION['seller'])) {
        echo "<script> alert('There was an error editing the seller information.')</script>";
        exit;
    }

    echo "<script> alert('you have successfully edited the product')</script>";
    header("location: sellerhomepage.php");
}
