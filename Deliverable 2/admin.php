<?php
require_once("user.php");
require_once("adminfunctions.php");

class admin extends user
{
    public $aID;
    public $uID;

    public function __construct($userRow, $adminRow)
    {
        $this->uID = $userRow['uID'];
        $this->firstName = $userRow['firstName'];
        $this->lastName = $userRow['lastName'];
        $this->phoneNumber = $userRow['phoneNumber'];
        $this->emailAddress = $userRow['emailAddress'];
        $this->password = $userRow['password'];
        $this->aID = $adminRow['aID'];
    }

    public function getNumUsers()
    {
        global $conn;
        $tableName = "users";

        $query = $conn->prepare("SELECT COUNT(*) AS numUsers FROM $tableName");

        if (!$query) die("Get number of users query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get number of users query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numUsers'];
    }

    public function getNumAdmins()
    {
        global $conn;
        $tableName = "admins";

        $query = $conn->prepare("SELECT COUNT(*) AS numAdmins FROM $tableName");

        if (!$query) die("Get number of admins query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get number of admins query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numAdmins'];
    }

    public function getNumBuyers()
    {
        global $conn;
        $tableName = "buyers";

        $query = $conn->prepare("SELECT COUNT(*) AS numBuyers FROM $tableName");

        if (!$query) die("Get number of buyers query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get number of buyers query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numBuyers'];
    }

    public function getNumSellers()
    {
        global $conn;
        $tableName = "sellers";

        $query = $conn->prepare("SELECT COUNT(*) AS numSellers FROM $tableName");

        if (!$query) die("Get number of sellers query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get number of sellers query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numSellers'];
    }
}
