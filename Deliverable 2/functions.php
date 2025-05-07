<?php
include("connect.php");

function getUserData($emailAddress)
{
    global $conn;
    //set table name
    $tableName = "users";

    // get all the columns with the entered email address
    $getUserDataQuery = $conn->prepare("SELECT * FROM $tableName WHERE emailAddress = ?");

    if (!$getUserDataQuery)
        die("Get user data query prepare failed: " . $conn->error);

    $getUserDataQuery->bind_param("s", $emailAddress);

    if (!$getUserDataQuery->execute())
        die("Get user data query execution failed: " . $getUserDataQuery->error);

    $result = $getUserDataQuery->get_result();

    //check if the email address is already linked to an account
    if ($result->num_rows == 0) {
        echo "<script> alert('The entered email is not registered to an account') </script>";
        exit();
    }

    $getUserDataQuery->close();

    return $result->fetch_assoc();
}

function getSellerData($userID)
{
    global $conn;
    $tableName = "sellers";

    $getSellerDataQuery = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$getSellerDataQuery)
        die("Get seller data query prepare failed: " . $conn->error);

    $getSellerDataQuery->bind_param("s", $userID);

    if (!$getSellerDataQuery->execute())
        die("Get seller data query execution failed: " . $getSellerDataQuery->error);

    $result = $getSellerDataQuery->get_result();

    if ($result->num_rows == 0) {
        echo "<script> alert('The entered email does not have a seller account') </script>";
        exit();
    }

    $getSellerDataQuery->close();

    return $result->fetch_assoc();
}

function getBuyerData($userID)
{
    global $conn;
    $tableName = "buyers";

    //get the seller ID of th User
    $getBuyerDataQuery = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$getBuyerDataQuery)
        die("Get buyer data query prepare failed: " . $conn->error);

    $getBuyerDataQuery->bind_param("s", $userID);

    if (!$getBuyerDataQuery->execute())
        die("Get buyer data query execution failed: " . $getBuyerDataQuery->error);

    $result = $getBuyerDataQuery->get_result();

    if ($result->num_rows == 0) {
        echo "<script> alert('The entered email does not have a buyer account') </script>";
        exit();
    }

    $getBuyerDataQuery->close();

    return $result->fetch_assoc();
}

function emailCheck($emailAddress)
{
    global $conn;
    $tableName = "users";

    // get all the columns with the entered email address
    $emailCheckQuery = $conn->prepare("SELECT * FROM $tableName WHERE emailAddress = ?");

    if (!$emailCheckQuery)
        die("Email check query prepare failed: " . $conn->error);

    $emailCheckQuery->bind_param("s", $emailAddress);

    if (!$emailCheckQuery->execute())
        die("Email check query execution failed: " . $emailCheckQuery->error);

    $emailCheckQuery->close();

    return $emailCheckQuery->get_result();
}

function isAlreadySeller($userID)
{
    global $conn;
    $tableName = "sellers";

    $sellerCheckQuery = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$sellerCheckQuery)
        die("Seller check query prepare failed: " . $conn->error);

    $sellerCheckQuery->bind_param("s", $userID);

    if (!$sellerCheckQuery->execute())
        die("Seller check query execution failed: " . $sellerCheckQuery->error);

    $sellerCheckQueryResult = $sellerCheckQuery->get_result();

    $sellerCheckQuery->close();

    if ($sellerCheckQueryResult->num_rows > 0)
        return true;

    return false;
}

function isAlreadyBuyer($userID)
{
    global $conn;
    $tableName = "buyers";

    $buyerCheckQuery = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$buyerCheckQuery)
        die("Buyer check query prepare failed: " . $conn->error);

    $buyerCheckQuery->bind_param("s", $userID);

    if (!$buyerCheckQuery->execute())
        die("Buyer check query execution failed: " . $buyerCheckQuery->error);

    $buyerCheckQueryResult = $buyerCheckQuery->get_result();

    $buyerCheckQuery->close();

    if ($buyerCheckQueryResult->num_rows > 0)
        return true;

    return false;
}

function addUserToTable($firstName, $lastName, $phoneNumber, $emailAddress, $password)
{
    global $conn;
    $tableName = "users";

    //insert the details into the 
    $signUpQuery = $conn->prepare("INSERT INTO $tableName (firstName, lastName, phoneNumber, emailAddress, password) VALUES (?,?,?,?,?)");

    // Check for SQL errors
    if (!$signUpQuery)
        die("Signup query prepare failed: " . $conn->error);

    $signUpQuery->bind_param("sssss", $firstName, $lastName, $phoneNumber, $emailAddress, $password);

    if (!$signUpQuery->execute())
        die("Signup query execution failed: " . $signUpQuery->error);

    $signUpQuery->close();

    return true;
}

function addBuyerToTable($userID, $streetAddress, $postcode)
{
    global $conn;
    $tableName = "buyers";

    $buyerSignUpQuery = $conn->prepare("INSERT INTO $tableName (uID, streetAddress, postcode) VALUES (?,?,?)");

    // Check for SQL errors
    if (!$buyerSignUpQuery)
        die("Buyer signup query prepare failed: " . $conn->error);

    $buyerSignUpQuery->bind_param("sss", $userID, $streetAddress, $postcode);

    if (!$buyerSignUpQuery->execute())
        die("Buyer sign up query execution failed: " . $buyerSignUpQuery->error);

    $buyerSignUpQuery->close();

    return true;
}

function addSellerToTable($userID, $streetAddress, $postcode)
{
    global $conn;
    $tableName = "sellers";

    $sellerSignUpQuery = $conn->prepare("INSERT INTO $tableName (uID, streetAddress, postcode) VALUES (?,?,?)");

    // Check for SQL errors
    if (!$sellerSignUpQuery)
        die("Seller signup query prepare failed: " . $conn->error);

    $sellerSignUpQuery->bind_param("sss", $userID, $streetAddress, $postcode);

    if (!$sellerSignUpQuery->execute())
        die("Seller sign up query execution failed: " . $sellerSignUpQuery->error);

    $sellerSignUpQuery->close();

    return true;
}
