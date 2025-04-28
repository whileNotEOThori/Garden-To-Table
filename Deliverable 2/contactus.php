<?php
include('connect.php');

if (isset($_POST['contactUs']))
{
    //retrieve/extract the information entered in the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $emailAddress = $_POST['emailAddress'];
    $message = $_POST['message'];

    //set table name
    $tableName = "messages";

    $messageInsertQuery = $conn->prepare("INSERT INTO $tableName (firstName, lastName,emailAddress, message) VALUES (?,?,?,?)");

    // Check for SQL errors
    if (!$messageInsertQuery) {
        die("Prepare failed: " . $conn->error);
    }

    $messageInsertQuery->bind_param("ssss", $firstName, $lastName, $emailAddress,$message);

    if (!$messageInsertQuery->execute()) {
        die("Execution failed: " . $messageInsertQuery->error);
    }
    else{
        // echo 'We have received your message';
//         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
//   We hae received your message.
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';
    }

    $messageInsertQuery->close();
    $conn->close();
}
?>