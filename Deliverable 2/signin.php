<?php
require_once("functions.php");
session_start();

if (isset($_POST['signIn']) || isset($_POST['sellerSignIn']) || isset($_POST['buyerSignIn'])) {
    //retrieve/extract the information entered in the form
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];

    //Set the usertype based off how the user is signing in
    if (isset($_POST['sellerSignIn'])) //seller modal signin
        $userType = "seller";
    else if (isset($_POST['buyerSignIn'])) //buyer modal signin
        $userType = "buyer";
    else //signin page
        $userType = $_POST['userType'];

    //double check if a usertype has been selected
    if ($userType == "") {
        echo "<script> alert('Select a valid user type.') </script>";
        exit();
    }

    //get the user's data from the table
    $userRow = getUserData($emailAddress);

    if ($userRow == null || $userRow == false) {
        echo "<script> alert('The user details do not have an account.') </script>";
        exit;
    }

    //Extract userID from the result from the user query
    $userID = $userRow['uID'];

    //determine if the user has buyer account if they opted to sign in as one
    if ($userType == "buyer") {
        $buyerRow = getBuyerData($userID);

        if ($buyerRow == null || $buyerRow == false) {
            echo "<script> alert('The user does not have a buyer account.') </script>";
            exit;
        }
    }

    //determine if the user has seller account if they opted to sign in as one
    if ($userType == "seller") {
        $sellerRow = getSellerData($userID);

        if ($sellerRow == null || $sellerRow == false) {
            echo "<script> alert('The user does not have a seller account.') </script>";
            exit;
        }
    }

    //determine if the user has admin account if they opted to sign in as one
    if ($userType == "admin") {
        $adminRow = getAdminData($userID);

        if ($adminRow == null || $adminRow == false) {
            echo "<script> alert('The user does not have a admin account.') </script>";
            exit;
        }
    }

    //Extract user's encrypted password from the result from the user query
    $encryptedPassword = $userRow['password'];

    //Determine if the entered password matched the stored password
    if (password_verify($password, $encryptedPassword)) {

        // remove all existing session variables on sign in
        session_unset();

        //Instantiate a seller object with the user's data from the database as a session variable then direct the user to the seller section of the website
        if ($userType == "seller") {
            $_SESSION['seller'] = new seller($userRow, $sellerRow);
            header("location: sellerhomepage.php");
        }

        //Instantiate a buyer object with the user's data from the database and creates an empty array for the cart as a session variable then direct the user to the buyer section of the website
        if ($userType == "buyer") {
            $_SESSION['buyer'] = new buyer($userRow, $buyerRow);
            $_SESSION['cart'] = array();
            header("location: buyerhomepage.php");
        }

        //Instantiate a admin object with the user's data from the database as a session variable then direct the user to the admin section of the website
        if ($userType == "admin") {
            $_SESSION['admin'] = new admin($userRow, $adminRow);
            header("location: adminhomepage.php");
        }
        exit;
    } else {
        echo "<script> alert('Incorrect password entered.') </script>";
    }

    $conn->close();
}
