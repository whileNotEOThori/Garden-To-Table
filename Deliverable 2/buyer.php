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

    public function getTotalSpent()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT SUM(totalAmount) AS totalSpent FROM $tableName WHERE bID = ?");

        if (!$query) die("Get total spent query prepare failed: " . $conn->error);

        $query->bind_param('i', $this->bID);

        if (!$query->execute()) die("Get total spent query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['totalSpent'];
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

            $trackedSellers[$sellerID] = true;
        }

        return $total;
    }

    function generateItem_Quant()
    {
        $item_quant = "";

        foreach ($_SESSION['cart'] as $productID => $quantity)
            $item_quant = $item_quant . $productID . ":" . $quantity . ";";

        return rtrim($item_quant, ";");
    }

    function extractItem_Quant($item_quants)
    {
        $arr = array();
        $pairs = explode(';', $item_quants);
        foreach ($pairs as $pair) {
            if (trim($pair) === '') continue;
            list($pID, $quant) = explode(':', $pair);
            $arr[$pID] = (int)$quant;
        }
        return $arr;
    }

    function printItem_Quant($item_quant)
    {
        $arr = $this->extractItem_Quant($item_quant);

        $result = "";

        foreach ($arr as $productID => $quantity) {
            $productRow = getProductRow($productID);
            $result = $result .  $productRow['name'] . ":" . $quantity . "\n";
        }

        return $result;
    }

    function updateStock()
    {
        global $conn;
        $tableName = "products";

        foreach ($_SESSION['cart'] as $productID => $quantity) {
            $updatedQuant = getProductRow($productID)['quantity'] -  $_SESSION['cart'][$productID];
            $query = $conn->prepare("UPDATE $tableName SET quantity = ? WHERE pID = ?");

            if (!$query) die("Place order update quant query prepare failed (pID)" . $productID . ": " . $conn->error);

            $query->bind_param("ii", $updatedQuant, $productID);

            if (!$query->execute()) die("Place order update quant query prepare failed (pID)" . $productID . ": " . $query->error);

            $query->close();
        }

        return true;
    }

    public function placeOrder($deliveryOrCollection)
    {
        global $conn;
        $tableName = 'orders';
        $item_quant = $this->generateItem_Quant();
        $cartTotal = $this->getCartTotal();
        $serviceFee = $cartTotal * $_ENV['SERVICE_FEE'];
        $grandTotal = $cartTotal + $serviceFee;

        if ($deliveryOrCollection == "delivery")
            $query = $conn->prepare("INSERT INTO $tableName (bID, item_quant, delivery, collection, amount, serviceFee, deliveryFee, totalAmount) VALUES (?,?,?,?,?,?,?,?)");
        else
            $query = $conn->prepare("INSERT INTO $tableName (bID, item_quant, amount, serviceFee, totalAmount) VALUES (?,?,?,?,?)");

        if (!$query) die("Place order query prepare failed: " . $conn->error);

        if ($deliveryOrCollection == "delivery") {
            $deliveryFee = $this->calcDeliveryFee();
            $grandTotal += $deliveryFee;
            $delivery = 1;
            $collection = 0;
            $query->bind_param("isssdddd", $_SESSION['buyer']->bID, $item_quant, $delivery, $collection, $cartTotal, $serviceFee, $deliveryFee, $grandTotal);
        } else
            $query->bind_param("isddd", $this->bID, $item_quant, $cartTotal, $serviceFee, $grandTotal);

        if (!$query->execute()) die("Place Order query execute failed: " . $query->error);

        $query->close();

        $this->updateStock();

        echo "<script> alert('Your order has been placed')</script>";

        //empty and reset cart
        unset($_SESSION['cart']);
        $_SESSION['cart'] = array();
    }

    public function viewOrders()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT * FROM $tableName WHERE bID = ?");

        if (!$query) die("Buyer view orders query prepare failed: " . $conn->error);

        $query->bind_param("i", $this->bID);

        if (!$query->execute()) die("Buyer view orders query execute failed: " . $query->error);

        $result = $query->get_result();
        $query->close();

        if ($result->num_rows > 0) {
            echo "
        <div class='table-responsive'>
        <table class='table table-striped'>
        <thead>
          <tr>
          <th scope='col'>Order ID</th>
          <th scope='col'>Item: Quantity</th>
          <th scope='col'>Delivery/Collection</th>
          <th scope='col'>Amount</th>
          <th scope='col'>Service Fee</th>
          <th scope='col'>Delivery Fee</th>
          <th scope='col'>Total Amount</th>
          <th scope='col'>Date</th>
          </tr>
        </thead>
        <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
        <th scope='row'>" . $row['oID'] . "</th>
        <td>" . $this->printItem_Quant($row['item_quant']) . "</td>
        <td>" . (($row['delivery'] == 1) ? 'delivery' : 'collection') . "</td>
        <td>R" . $row['amount'] . "</td>
        <td>R" .  $row['serviceFee'] . "</td>
        <td>R" .  $row['deliveryFee'] . "</td>
        <td>R" .   $row['totalAmount'] . "</td>
        <td>" .  $row['timeOrdered'] . "</td>
        </tr>";
        }
            echo "</tbody>
      </table>
      </div>";
        } else {
            echo "<h3>No Orders have been placed yet</h3>";
        }
    }
}
