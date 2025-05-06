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
        die("Email check query prepare failed: " . $conn->error);

    $getUserDataQuery->bind_param("s", $emailAddress);

    if (!$getUserDataQuery->execute())
        die("Email check query execution failed: " . $getUserDataQuery->error);

    $result = $getUserDataQuery->get_result();

    //check if the email address is already linked to an account
    if ($result->num_rows == 0) {
        // send a bootstrap alert that the email address already exists
        echo "<script> alert('The entered email is not registered to an account') </script>";
        exit();
    }

    $getUserDataQuery->close();

    return $result->fetch_assoc();
}

function geSellerData($userID)
{
    global $conn;
    $tableName = "sellers";

    $getSellerDataQuery = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$getSellerDataQuery)
        die("User type Query prepare failed: " . $conn->error);

    $getSellerDataQuery->bind_param("s", $userID);

    if (!$getSellerDataQuery->execute())
        die("User type query execution failed: " . $getSellerDataQuery->error);

    $result = $getSellerDataQuery->get_result();

    if ($result->num_rows == 0) {
        // send a bootstrap alert that the email address already exists
        echo "<script> alert('The entered email does not have a seller account') </script>";
        exit();
    }

    $getSellerDataQuery->close();

    return $result->fetch_assoc();
}
