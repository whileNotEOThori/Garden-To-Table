<?php
require_once("user.php");

class seller extends user
{
    public $sID;
    public $uID;
    public $streetAddress;
    public $postcode;
    public $totalSales;

    public function __construct($userRow, $sellerRow)
    {
        $this->uID = $userRow['uID'];
        $this->firstName = $userRow['firstName'];
        $this->lastName = $userRow['lastName'];
        $this->phoneNumber = $userRow['phoneNumber'];
        $this->emailAddress = $userRow['emailAddress'];
        $this->password = $userRow['password'];
        $this->sID = $sellerRow['sID'];
        $this->streetAddress = $sellerRow['streetAddress'];
        $this->postcode = $sellerRow['postcode'];
        $this->totalSales = $sellerRow['totalSales'];
    }
}
