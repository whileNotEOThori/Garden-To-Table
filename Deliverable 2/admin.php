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

    public function getNumProducts()
    {
        global $conn;
        $tableName = "products";

        $query = $conn->prepare("SELECT COUNT(*) AS numProducts FROM $tableName");

        if (!$query) die("Get number of products query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get number of products query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numProducts'];
    }

    public function getNumCategories()
    {
        global $conn;
        $tableName = "categories";

        $query = $conn->prepare("SELECT COUNT(*) AS numCategories FROM $tableName");

        if (!$query) die("Get number of categories query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get number of categories query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numCategories'];
    }

    public function getNumOrders()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT COUNT(*) AS numOrders FROM $tableName");

        if (!$query) die("Get number of orders  query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get number of orders  query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numOrders'];
    }

    public function getNumDeliveryOrders()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT COUNT(*) AS numDeliveryOrders FROM $tableName WHERE delivery = 1");

        if (!$query) die("Get number of delivery orders query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get number of delivery orders query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numDeliveryOrders'];
    }

    public function getNumCollectionOrders()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT COUNT(*) AS numCollectionOrders FROM $tableName WHERE collection = 1");

        if (!$query) die("Get number of collection orders query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get number of collection orders query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numCollectionOrders'];
    }

    public function getTotalSales()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT SUM(totalAmount) AS totalSales FROM $tableName");

        if (!$query) die("Get total sales query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get total sales query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['totalSales'];
    }

    public function getTotalServiceFees()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT SUM(serviceFee) AS totalServiceFees FROM $tableName");

        if (!$query) die("Get total service fees query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get total service fees query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['totalServiceFees'];
    }

    public function getTotalDeliveryFees()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT SUM(deliveryFee) AS totalDeliveryFees FROM $tableName");

        if (!$query) die("Get total delivery fees query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get total delivery fees query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['totalDeliveryFees'];
    }

    public function getTotalUnpaid()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT SUM(amount) AS unpaid FROM $tableName WHERE paidOut = 0");

        if (!$query) die("Get total amount unpaid query prepare failed: " . $conn->error);

        if (!$query->execute()) die("Get total amount unpaid query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        $totalUnpaid = $result->fetch_assoc()['unpaid'];

        return (empty($totalUnpaid)) ? 0.00 : $totalUnpaid;
    }

    public function viewUsers()
    {
        global $conn;

        // $query = $conn->prepare("SELECT users.*, buyers.*, sellers.*, admins.*  FROM users LEFT JOIN buyers ON users.uID = buyers.uID LEFT JOIN sellers ON users.uID = sellers.uID LEFT JOIN admins ON users.uID = admins.uID");
        $query = $conn->prepare("SELECT users.uID AS user_uID, buyers.bID, sellers.sID, admins.aID, users.firstName, users.lastName, users.phoneNumber, users.emailAddress, buyers.postcode AS buyer_postcode, buyers.streetAddress AS buyer_streetAddress, sellers.postcode AS seller_postcode, sellers.streetAddress AS seller_streetAddress, sellers.totalSales, sellers.deliveryRate 
        FROM users 
        LEFT JOIN buyers ON users.uID = buyers.uID 
        LEFT JOIN sellers ON users.uID = sellers.uID 
        LEFT JOIN admins ON users.uID = admins.uID");

        if (!$query) die("View users query prepare failed: " . $conn->error);

        if (!$query->execute()) die("View users query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        if ($result->num_rows > 0) {
            echo "
        <div class='table-responsive'>
        <table class='table table-striped'>
        <thead>
          <tr>
          <th scope='col'>User ID</th>
          <th scope='col'>Buyer ID</th>
          <th scope='col'>Seller ID</th>
          <th scope='col'>Admin ID</th>
          <th scope='col'>First Name</th>
          <th scope='col'>Last Name</th>
          <th scope='col'>Phone Number</th>
          <th scope='col'>Email Address</th>
          <th scope='col'>Post Code</th>
          <th scope='col'>Street Address</th>
          <th scope='col'>Total Sales</th>
          <th scope='col'>Delivery Rate</th>
          </tr>
        </thead>
        <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
            <th scope='row'>" . $row['user_uID'] . "</th>
            <td>" . $row['bID'] . "</td>
            <td>" . $row['sID'] . "</td>
            <td>" . $row['aID'] . "</td>
            <td>" . $row['firstName'] . "</td>
            <td>" . $row['lastName'] . "</td>
            <td>" . $row['phoneNumber'] . "</td>
            <td>" . $row['emailAddress'] . "</td>
            <td>" . (!empty($row['sID']) ? $row['seller_postcode'] : (!empty($row['bID']) ? $row['buyer_postcode'] : '')) . "</td>
            <td>" . (!empty($row['sID']) ? $row['seller_streetAddress'] : (!empty($row['bID']) ? $row['buyer_streetAddress'] : '')) . "</td>
            <td>" . $row['totalSales'] . "</td>
            <td>" . $row['deliveryRate'] . "</td>
          </tr>";
            }
            echo "</tbody>
      </table>
      </div>";
        } else {
            echo "<h3>No users</h3>";
        }
    }

    public function viewProducts()
    {
        global $conn;
        $tableName = "products";

        $query = $conn->prepare("SELECT * FROM $tableName");

        if (!$query)
            die("View products query prepare failed: " . $conn->error);

        if (!$query->execute())
            die("View products query execution failed: " . $query->error);

        $result = $query->get_result();

        if ($result->num_rows > 0) {
            echo "
        <div class='table-responsive'>
        <table class='table table-striped'>
        <thead>
          <tr>
          <th scope='col'>Product ID</th>
          <th scope='col'>Seller ID</th>
          <th scope='col'>Category</th>
          <th scope='col'>Name</th>
          <th scope='col'>Description</th>
          <th scope='col'>Mass [g]</th>
          <th scope='col'>Price [R]</th>
          <th scope='col'>Quantity</th>
          <th scope='col'>Image</th>
          </tr>
        </thead>
        <tbody>";
            while ($row = $result->fetch_assoc()) {
                $product = new product($row);
                echo "<tr>
            <th scope='row'>" . $product->pID . "</th>
            <th scope='row'>" . $product->sID . "</th>
            <td>" . getCategoryName($product->cID) . "</td>
            <td>" . $product->name . "</td>
            <td>" . $product->description . "</td>
            <td>" .  $product->mass . "</td>
            <td>" .  $product->price . "</td>
            <td>" . $product->quantity . "</td>
            <td><img height='50px' width='50px' src='data:image/jpeg;base64,$product->image' /></td>
          </tr>";
            }
            echo "</tbody>
      </table>
      </div>";
        } else {
            echo "<h3>No products being sold</h3>";
        }

        $query->close();
    }

    public function viewOrders()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("SELECT * FROM $tableName");

        if (!$query) die("View orders query prepare failed: " . $conn->error);

        if (!$query->execute()) die("View orders query execution failed: " . $query->error);

        $result = $query->get_result();

        if ($result->num_rows > 0) {
            echo "
        <div class='table-responsive'>
        <table class='table table-striped'>
        <thead>
          <tr>
          <th scope='col'>Order ID</th>
          <th scope='col'>Buyer ID</th>
          <th scope='col'>Item: Quantity</th>
          <th scope='col'>delivery/Collection</th>
          <th scope='col'>Amount</th>
          <th scope='col'>Service Fee</th>
          <th scope='col'>Delivery Fee</th>
          <th scope='col'>Total Amount</th>
          <th scope='col'>Date</th>
          <th scope='col'>Paid Out</th>
          </tr>
        </thead>
        <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
            <th scope='row'>" . $row['oID'] . "</th>
            <th scope='row'>" . $row['bID'] . "</th>
            <td>" . printItem_Quant($row['item_quant']) . "</td>
            <td>" . (($row['delivery'] == 1) ? 'delivery' : 'collection') . "</td>
            <td>R" . $row['amount'] . "</td>
            <td>R" .  $row['serviceFee'] . "</td>
            <td>R" .  $row['deliveryFee'] . "</td>
            <td>R" .   $row['totalAmount'] . "</td>
            <td>" .  $row['timeOrdered'] . "</td>
            <td>" .  (($row['paidOut'] == 1) ? "Yes" : "No") . "</td>
            </tr>";
            }
            echo "</tbody>
      </table>
      </div>";
        } else {
            echo "<h3>No orders made</h3>";
        }

        $query->close();
    }

    public function deleteUser($userID)
    {
        global $conn;

        if (isAlreadyAdmin($userID)) {
            $tableName = "admins";

            $query = $conn->prepare("DELETE FROM $tableName WHERE uID = ?");

            if (!$query) die("Delete user: admin query prepare failed: " . $conn->error);

            $query->bind_param("i", $userID);

            if (!$query->execute()) die("Delete user: admin query execution failed: " . $query->error);

            $query->close();
        }

        if (isAlreadyBuyer($userID)) {
            $tableName = "buyers";

            $query = $conn->prepare("DELETE FROM $tableName WHERE uID = ?");

            if (!$query) die("Delete user: buyer query prepare failed: " . $conn->error);

            $query->bind_param("i", $userID);

            if (!$query->execute()) die("Delete user: buyer query execution failed: " . $query->error);

            $query->close();
        }

        if (isAlreadySeller($userID)) {
            $sellerID = getSellerData($userID)['sID'];
            $tableName = "sellers";

            $query = $conn->prepare("DELETE FROM $tableName WHERE uID = ?");

            if (!$query) die("Delete user: seller query prepare failed: " . $conn->error);

            $query->bind_param("i", $userID);

            if (!$query->execute()) die("Delete user: seller query execution failed: " . $query->error);

            $query->close();

            $tableName = "products";

            $query = $conn->prepare("DELETE FROM $tableName WHERE sID = ?");

            if (!$query) die("Delete user: seller's products query prepare failed: " . $conn->error);

            $query->bind_param("i", $sellerID);

            if (!$query->execute()) die("Delete user: seller's products query execution failed: " . $query->error);

            $query->close();
        }

        $tableName = "users";

        $query = $conn->prepare("DELETE FROM $tableName WHERE uID = ?");

        if (!$query) die("Delete user: user query prepare failed: " . $conn->error);

        $query->bind_param("i", $userID);

        if (!$query->execute()) die("Delete user: user query execution failed: " . $query->error);

        $query->close();

        return true;
    }

    public function addCategory($categoryName)
    {
        global $conn;
        $tableName = "categories";

        $query = $conn->prepare("INSERT INTO $tableName (name) VALUES (?)");

        // Check for SQL errors
        if (!$query) die("Add category query prepare failed: " . $conn->error);

        $query->bind_param("s", $categoryName);

        if (!$query->execute()) die("Add category query execution failed: " . $query->error);

        $query->close();

        return true;
    }

    public function deleteProduct($productID)
    {
        global $conn;
        $tableName = "products";

        $query = $conn->prepare("DELETE FROM $tableName WHERE pID = ?");

        if (!$query) die("Delete product query prepare failed: " . $conn->error);

        $query->bind_param("i", $productID);

        if (!$query->execute()) die("Delete product query execution failed: " . $query->error);

        $query->close();
        
        return true;
    }

    public function payout()
    {
        global $conn;
        $tableName = "orders";

        $query = $conn->prepare("UPDATE $tableName SET paidOut = 1 WHERE paidOut = 0");

        if (!$query) die("Payout prepare failed: " . $conn->error);

        if (!$query->execute()) die("Payout query execution failed: " . $query->error);

        $query->close();

        return true;
    }

    public function markMessageAsRead($messageID)
    {
        global $conn;
        $tableName = "messages";

        $query = $conn->prepare("UPDATE $tableName SET isRead = 1 WHERE mID = ?");

        if (!$query) die("Mark message as read query prepare failed: " . $conn->error);

        $query->bind_param('i', $messageID);

        if (!$query->execute()) die("Mark message as read query execution failed: " . $query->error);

        $query->close();
    }

    public function markMessageAsUnread($messageID)
    {
        global $conn;
        $tableName = "messages";

        $query = $conn->prepare("UPDATE $tableName SET isRead = 0 WHERE mID = ?");

        if (!$query) die("Mark message as unread query prepare failed: " . $conn->error);

        $query->bind_param('i', $messageID);

        if (!$query->execute()) die("Mark message as unread query execution failed: " . $query->error);

        $query->close();
    }
}
