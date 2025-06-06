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

    public function editStreetAddress($updatedStreetAddress)
    {
        global $conn;
        $tableName = "buyers";

        $query = $conn->prepare("UPDATE $tableName SET streetAddress = ? WHERE uID = ?");

        if (!$query) die("Edit street address prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedStreetAddress, $this->uID);

        if (!$query->execute()) die("Edit street address query execution failed: " . $query->error);

        $query->close();

        $this->streetAddress = $updatedStreetAddress;
        return true;
    }

    public function quickAddToCart()
    {
        $productID = $_POST['quickAddToCart'];

        if (isset($_SESSION['cart'][$productID]))
            $_SESSION['cart'][$productID]++;
        else
            $_SESSION['cart'][$productID] = 1;
    }

    public function addToCart()
    {
        $productID = $_POST['addToCart'];
        $quantity = $_POST['productQuantity'];

        if ($quantity == 0)
            unset($_SESSION['cart'][$productID]);
        else
            $_SESSION['cart'][$productID] = $quantity;
    }

    public function removeFromCart()
    {
        $productID = $_POST['removeProduct'];

        // Remove the selected product from the cart
        unset($_SESSION['cart'][$productID]);

        // If the cart is now empty, reset it to an empty array
        if (empty($_SESSION['cart'])) $_SESSION['cart'] = array();
    }

    public function checkOut()
    {
        if (count($_SESSION['cart']) == 0) {
            echo "<script> alert('There are no products in the cart to check out')</script>";
            header('Location: ' . $_SERVER["HTTP_REFERER"]);
            exit;
        }

        foreach ($_SESSION['cart'] as $productID => $quantity) {
            $_SESSION['cart'][$productID] = $_POST["p" . $productID . "Quantity"];
        }
    }

    public function getCartTotal()
    {
        $total = 0.00;
        foreach ($_SESSION['cart'] as $productID => $quantity) {
            $productRow = getProductRow($productID);
            $total += $productRow['price'] * $quantity;
        }

        return $total;
    }

    public function calcDeliveryFee()
    {
        $total = 0.00;
        $trackedSellers = array();
        foreach ($_SESSION['cart'] as $productID => $quantity) {
            $productRow = getProductRow($productID);

            $sellerID = $productRow['sID'];

            if (isset($trackedSellers[$sellerID])) continue;

            $deliveryInfo = getSellerDeliveryInfo($sellerID);

            $total += (abs($deliveryInfo['postcode'] - $this->postcode) + 1) * $deliveryInfo['deliveryRate'];
        }

        return $total;
    }
}
