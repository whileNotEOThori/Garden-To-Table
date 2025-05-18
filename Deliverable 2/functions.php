<?php
require_once("connect.php");
require_once("seller.php");
require_once("buyer.php");

function getCategories()
{
    global $conn;
    $tableName = "categories";

    $query = $conn->prepare("SELECT * FROM $tableName");

    if (!$query)
        die("Get category query prepare failed: " . $conn->error);

    if (!$query->execute())
        die("Get category query execution failed" . $query->error);

    $result = $query->get_result();

    if ($result->num_rows == 0) {
        echo "<script> alert('There are no categories') </script>";
        // header('location: editproductpage.php');
        exit;
    }

    while ($row  = $result->fetch_assoc()) {
        $categoryID = $row['cID'];
        $categoryName = $row['name'];

        echo "<option value=" . $categoryID . ">" . $categoryName . "</option> ";
    }

    $query->close();
}

function getUserData($emailAddress)
{
    global $conn;
    $tableName = "users";

    // get all the columns with the entered email address
    $query = $conn->prepare("SELECT * FROM $tableName WHERE emailAddress = ?");

    if (!$query)
        die("Get user data query prepare failed: " . $conn->error);

    $query->bind_param("s", $emailAddress);

    if (!$query->execute())
        die("Get user data query execution failed: " . $query->error);

    $result = $query->get_result();

    //check if the email address is already linked to an account
    if ($result->num_rows == 0) {
        echo "<script> alert('The entered email is not registered to an account') </script>";
        exit();
    }

    $query->close();

    return $result->fetch_assoc();
}

function getSellerData($userID)
{
    global $conn;
    $tableName = "sellers";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Get seller data query prepare failed: " . $conn->error);

    $query->bind_param("s", $userID);

    if (!$query->execute())
        die("Get seller data query execution failed: " . $query->error);

    $result = $query->get_result();

    if ($result->num_rows == 0) {
        echo "<script> alert('The entered email does not have a seller account') </script>";
        exit();
    }

    $query->close();

    return $result->fetch_assoc();
}

function getBuyerData($userID)
{
    global $conn;
    $tableName = "buyers";

    //get the seller ID of th User
    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Get buyer data query prepare failed: " . $conn->error);

    $query->bind_param("s", $userID);

    if (!$query->execute())
        die("Get buyer data query execution failed: " . $query->error);

    $result = $query->get_result();

    if ($result->num_rows == 0) {
        echo "<script> alert('The entered email does not have a buyer account') </script>";
        exit();
    }

    $query->close();

    return $result->fetch_assoc();
}

function emailCheck($emailAddress)
{
    global $conn;
    $tableName = "users";

    // get all the columns with the entered email address
    $query = $conn->prepare("SELECT * FROM $tableName WHERE emailAddress = ?");

    if (!$query)
        die("Email check query prepare failed: " . $conn->error);

    $query->bind_param("s", $emailAddress);

    if (!$query->execute())
        die("Email check query execution failed: " . $query->error);

    $query->close();

    return $query->get_result();
}

function isAlreadySeller($userID)
{
    global $conn;
    $tableName = "sellers";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Seller check query prepare failed: " . $conn->error);

    $query->bind_param("s", $userID);

    if (!$query->execute())
        die("Seller check query execution failed: " . $query->error);

    $sellerCheckQueryResult = $query->get_result();

    $query->close();

    if ($sellerCheckQueryResult->num_rows > 0)
        return true;

    return false;
}

function isAlreadyBuyer($userID)
{
    global $conn;
    $tableName = "buyers";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Buyer check query prepare failed: " . $conn->error);

    $query->bind_param("s", $userID);

    if (!$query->execute())
        die("Buyer check query execution failed: " . $query->error);

    $buyerCheckQueryResult = $query->get_result();

    $query->close();

    if ($buyerCheckQueryResult->num_rows > 0)
        return true;

    return false;
}

function addUserToTable($firstName, $lastName, $phoneNumber, $emailAddress, $password)
{
    global $conn;
    $tableName = "users";

    //insert the details into the 
    $query = $conn->prepare("INSERT INTO $tableName (firstName, lastName, phoneNumber, emailAddress, password) VALUES (?,?,?,?,?)");

    // Check for SQL errors
    if (!$query)
        die("Signup query prepare failed: " . $conn->error);

    $query->bind_param("sssss", $firstName, $lastName, $phoneNumber, $emailAddress, $password);

    if (!$query->execute())
        die("Signup query execution failed: " . $query->error);

    $query->close();

    return true;
}

function addBuyerToTable($userID, $streetAddress, $postcode)
{
    global $conn;
    $tableName = "buyers";

    $query = $conn->prepare("INSERT INTO $tableName (uID, streetAddress, postcode) VALUES (?,?,?)");

    // Check for SQL errors
    if (!$query)
        die("Buyer signup query prepare failed: " . $conn->error);

    $query->bind_param("sss", $userID, $streetAddress, $postcode);

    if (!$query->execute())
        die("Buyer sign up query execution failed: " . $query->error);

    $query->close();

    return true;
}

function addSellerToTable($userID, $streetAddress, $postcode)
{
    global $conn;
    $tableName = "sellers";

    $query = $conn->prepare("INSERT INTO $tableName (uID, streetAddress, postcode) VALUES (?,?,?)");

    // Check for SQL errors
    if (!$query)
        die("Seller signup query prepare failed: " . $conn->error);

    $query->bind_param("sss", $userID, $streetAddress, $postcode);

    if (!$query->execute())
        die("Seller sign up query execution failed: " . $query->error);

    $query->close();

    return true;
}
