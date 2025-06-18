<?php
require_once('connect.php');

if (isset($_POST['contactUs'])) {
    // Sanitize and validate the information entered in the form
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
    $emailAddress = filter_input(INPUT_POST, 'emailAddress', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($emailAddress) || empty($message)) {
        die("All fields are required.");
    }

    // Validate email address
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    //set table name
    $tableName = "messages";

    $messageInsertQuery = $conn->prepare("INSERT INTO $tableName (firstName, lastName,emailAddress, message) VALUES (?,?,?,?)");

    // Check for SQL errors
    if (!$messageInsertQuery)
        die("Prepare failed: " . $conn->error);

    $messageInsertQuery->bind_param("ssss", $firstName, $lastName, $emailAddress, $message);

    if (!$messageInsertQuery->execute())
        die("Execution failed: " . $messageInsertQuery->error);

    echo "<script>
        alert('We have received your message');
        window.location.href = 'index.php';
    </script>";

    $messageInsertQuery->close();
    $conn->close();
}
