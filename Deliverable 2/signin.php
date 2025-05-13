<?php
session_start();
include('connect.php');
include("functions.php");
include("seller.php");
include("buyer.php");

if (isset($_POST['signIn']) || isset($_POST['sellerSignIn']) || isset($_POST['buyerSignIn'])) {
    //retrieve/extract the information entered in the form
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];

    //determine if the user is signing in through the modal or signin page
    if (isset($_POST['signIn'])) //signin page
        $userType = $_POST['userType'];
    else //modal
        $userType = $_SESSION['userType'];


    //double check if a usertype has been selected
    if ($userType == "") {
        echo "<script> alert('Select a valid user type.') </script>";
        exit();
    }

    $userRow = getUserData($emailAddress);

    if ($userRow == null || $userRow == false) {
        echo "<script> alert('The user details do not have an account.') </script>";
        exit;
    }

    $userID = $userRow['uID'];

    if ($userType == "buyer")
    {
        $buyerRow = getBuyerData($userID);

        if ($buyerRow == null || $buyerRow == false) {
            echo "<script> alert('The user does not have a buyer account.') </script>";
            exit;
        }
    }

    if ($userType == "seller") {
        $sellerRow = getSellerData($userID);

        if ($sellerRow == null || $sellerRow == false) {
            echo "<script> alert('The user does not have a seller account.') </script>";
            exit;
        }
    }

    if ($userType == "admin")
        $tableName = "admins";

    $encryptedPassword = $userRow['password'];

    if (password_verify($password, $encryptedPassword)) {

        if ($userType == "seller") {
            $_SESSION['seller'] = new seller($userRow, $sellerRow);
            header("location: sellerhomepage.php");
        }

        if ($userType == "buyer"){
            $_SESSION['buyer'] = new buyer($userRow, $buyerRow);
            header("location: buyerhomepage.php");
        }

            /*if ($userType == "admin")
                header("location: sellerhomepage.html");*/
        exit;
    } else {
        echo "<script> alert('Incorrect password entered.') </script>";
    }

    $conn->close();
}
