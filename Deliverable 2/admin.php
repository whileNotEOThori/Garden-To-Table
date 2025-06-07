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
}
