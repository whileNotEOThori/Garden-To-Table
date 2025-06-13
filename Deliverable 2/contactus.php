<?php
require_once('connect.php');

if (isset($_POST['contactUs'])) {
    //retrieve/extract the information entered in the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $emailAddress = $_POST['emailAddress'];
    $message = $_POST['message'];

    //set table name
    $tableName = "messages";

    $messageInsertQuery = $conn->prepare("INSERT INTO $tableName (firstName, lastName,emailAddress, message) VALUES (?,?,?,?)");

    // Check for SQL errors
    if (!$messageInsertQuery)
        die("Prepare failed: " . $conn->error);

    $messageInsertQuery->bind_param("ssss", $firstName, $lastName, $emailAddress, $message);

    if (!$messageInsertQuery->execute())
        die("Execution failed: " . $messageInsertQuery->error);

    echo "<script> alert('We have received your message') </script>";
    sleep(3);
    header('location: index.php');

    $messageInsertQuery->close();
    $conn->close();
}
