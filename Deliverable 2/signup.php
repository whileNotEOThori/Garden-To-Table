<?php
require_once('functions.php');
session_start();


if (isset($_POST['signUp'])) {
    //retrieve/extract the information entered in the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNum'];
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $streetAddress = $_POST['streetAddress'];
    $postcode = $_POST['postcode'];

    if ($userType == "") {
        echo "<script> alert('Select a valid user type.') </script>";
        exit();
    }

    //encrypt password
    $password = password_hash($password, PASSWORD_BCRYPT);

    // Get the reults to see if the user has already created an account
    $emailCheckResult = emailCheck($emailAddress);
    if ($emailCheckResult == null || $emailCheckResult == false) {
        echo "<script> alert('An account is already linked to this email address') </script>";
        exit;
    }

    //check if the email address is already linked to an account
    if ($emailCheckResult->num_rows > 0) {
        $userID = $emailCheckResult->fetch_assoc()['uID'];

        if ($userType == "buyer") {
            if (isAlreadyBuyer(($userID))) {
                echo "<script> alert('The entered email is already registered to an account') </script>";
                exit();
            }
        } else {
            if (isAlreadySeller($userID)) {
                echo "<script> alert('The entered email is already registered to an account') </script>";
                exit();
            }
        }
    } else {
        //insert the details into the 
        if (!addUserToTable($firstName, $lastName, $phoneNumber, $emailAddress, $password)); {
            echo "<script> alert('The user  details could not be added into the user table') </script>";
            exit();
        }
    }

    $userRow = getUserData($emailAddress);
    if ($userRow == null || $userRow == false) {
        echo "<script> alert('The user data could not be retrieved.') </script>";
        exit;
    }

    $userID = $userRow['uID'];

    if ($userType == "buyer") {
        if (!addBuyerToTable($userID, $streetAddress, $postcode)) {
            echo "<script> alert('The buyer details could not be added into the user table') </script>";
            exit();
        }

        $buyerRow = getBuyerData($userID);
        if ($buyerRow == null || $buyerRow == false) {
            echo "<script> alert('The seller data could not be retrieved.') </script>";
            exit;
        }

        // remove all session variables on sign up
        session_unset();

        // Instantiate a buyer
        $_SESSION['buyer'] = new buyer($userRow, $buyerRow);
        $_SESSION['cart'] = array();
    } else {
        if (!addBuyerToTable($userID, $streetAddress, $postcode)) {
            echo "<script> alert('The buyer details could not be added into the user table') </script>";
            exit();
        }

        $sellerRow = getSellerData($userID);
        if ($sellerRow == null || $sellerRow == false) {
            echo "<script> alert('The seller data could not be retrieved.') </script>";
            exit;
        }

        // remove all session variables on sign up
        session_unset();

        // Instantiate a seller
        $_SESSION['seller'] = new seller($userRow, $sellerRow);
    }

    echo "<script> alert('Account created successfully') </script>";

    if ($userType == "seller") header("location: sellerhomepage.html");

    if ($userType == "buyer") header("location: buyerhomepage.php");

    $conn->close();
}
