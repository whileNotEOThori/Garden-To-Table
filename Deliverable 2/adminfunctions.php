<?php
require_once('functions.php');
require_once('admin.php');

function isAdminSignedIn()
{
    if (empty($_SESSION['admin'])) {
        // echo "<script> alert('You have been signed out. Sign In again.') </script>";
        header("location: index.php");
        exit;
    }
}

function displayMessageCard($messageRow)
{
    echo
    "<div class='card'>
            <div class='card-body'>
                <h5 class='card-title'>Message ID: " . $messageRow['mID'] . "</h5>
                <p class='card-text'><strong>First Name:</strong> " . $messageRow['firstName'] . "<br> <strong>Last Name:</strong> " . $messageRow['lastName'] . "<br> <strong>Email Address:</strong> " . $messageRow['emailAddress'] . "<br> <strong>Time Sent:</strong> " . $messageRow['timeSent'] . "</p>
                <p class='card-text'><strong>Message:</strong> " . $messageRow['message'] . "</p>

                <div class='d-flex align-items-center gap-2'>                
                    <form action='adminmanagement.php' method='POST'>";

    if ($messageRow['isRead'] == 1)
        echo "<button type='submit' name='markAsUnreadButton' value='" . $messageRow['mID'] . "' class='btn btn-secondary'>Mark As Unread</button>";
    else
        echo "<button type='submit' name='markAsReadButton' value='" . $messageRow['mID'] . "' class='btn btn-primary'>Mark As Read</button>";


    echo "</form>
                <p class='card-text'><strong>Is Read:</strong> " . (($messageRow['isRead'] == 1) ? "Yes" : "No") . "</p>
                </div>
            </div>
        </div>";
}

function displayMessageCardsFromResult($result)
{
    if (!$result) {
        echo "<h3>There are currently no messages.</h3>";
        return;
    }

    if ($result->num_rows > 0) {
        $counter = 0;
        echo "<div class='container-fluid'>";
        while ($messageRow = $result->fetch_assoc()) {
            if ($counter % 3 == 0) echo "<div class='row'>";
            echo "<div class='col-12 col-md-4 mb-3 mt-3'>";
            displayMessageCard($messageRow);
            echo "</div>";
            $counter++;
            if ($counter % 3 == 0) echo "</div>";
        }
        if ($counter % 3 != 0) echo "</div>"; // Close last row if not complete
        echo "</div>"; // Close container
    } else {
        echo "<h3>There are currently no messages.</h3>";
    }
}

function displayMessages()
{
    global $conn;
    $tableName = "messages";

    $query = $conn->prepare("SELECT * FROM $tableName ORDER BY isRead, mID");

    if (!$query) die("Display messages query prepare failed: " . $conn->error);

    if (!$query->execute()) die("Display messages query execution failed: " . $query->error);

    $result = $query->get_result();

    displayMessageCardsFromResult($result);
}
