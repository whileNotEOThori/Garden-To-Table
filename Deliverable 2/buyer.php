<?php
require_once("user.php");

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
}
