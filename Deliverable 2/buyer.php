<?php
require_once("user.php");
require_once("connect.php");

class buyer extends user
{
    public $bID;
    public $uID;
    public $streetAddress;
    public $postcode;

    public function __construct($userRow, $buyerRow)
    {
        $this->uID = $userRow['uID'];
        $this->firstName = $userRow['firstName'];
        $this->lastName = $userRow['lastName'];
        $this->phoneNumber = $userRow['phoneNumber'];
        $this->emailAddress = $userRow['emailAddress'];
        $this->password = $userRow['password'];
        $this->bID = $buyerRow['bID'];
        $this->streetAddress = $buyerRow['streetAddress'];
        $this->postcode = $buyerRow['postcode'];
    }

    public function getNumOrdersMade()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT COUNT(*) AS numOrdersMade FROM $tableName WHERE bID = ?");

        if (!$query) die("Get number of orders made query prepare failed: " . $conn->error);

        $query->bind_param('i', $this->bID);

        if (!$query->execute()) die("Get number of orders made query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numOrdersMade'];
    }

    public function editFirstName($updatedFirstName)
    {
        global $conn;
        $tableName = "users";

        $query = $conn->prepare("UPDATE $tableName SET firstName = ? WHERE uID = ?");

        if (!$query) die("Edit first query prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedFirstName, $this->uID);

        if (!$query->execute()) die("Edit first name query execution failed: " . $query->error);

        $query->close();

        $this->firstName = $updatedFirstName;
        return true;
    }

    public function editLastName($updatedLastName)
    {
        global $conn;
        $tableName = "users";

        $query = $conn->prepare("UPDATE $tableName SET lastName = ? WHERE uID = ?");

        if (!$query) die("Edit last query prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedLastName, $this->uID);

        if (!$query->execute()) die("Edit last name query execution failed: " . $query->error);

        $query->close();

        $this->lastName = $updatedLastName;
        return true;
    }

    public function editPhoneNumber($updatedPhoneNumber)
    {
        global $conn;
        $tableName = "users";

        $query = $conn->prepare("UPDATE $tableName SET phoneNumber = ? WHERE uID = ?");

        if (!$query) die("Edit phone number prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedPhoneNumber, $this->uID);

        if (!$query->execute()) die("Edit phone number query execution failed: " . $query->error);

        $query->close();

        $this->phoneNumber = $updatedPhoneNumber;
        return true;
    }

    public function editPostcode($updatedPostcode)
    {
        global $conn;
        $tableName = "buyers";

        $query = $conn->prepare("UPDATE $tableName SET postcode = ? WHERE uID = ?");

        if (!$query) die("Edit postcode prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedPostcode, $this->uID);

        if (!$query->execute()) die("Edit postcode query execution failed: " . $query->error);

        $query->close();

        $this->postcode = $updatedPostcode;
        return true;
    }
}
