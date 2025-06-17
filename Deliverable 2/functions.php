<?php
require_once("connect.php");
require_once("seller.php");
require_once("buyer.php");
require_once("admin.php");
require_once("product.php");

function getCategories()
{
    global $conn;
    $tableName = "categories";

    $query = $conn->prepare("SELECT * FROM $tableName");

    if (!$query)
        die("Get category query prepare failed: " . $conn->error);

    if (!$query->execute())
        die("Get category query execution failed" . $query->error);

    $result = $query->get_result();

    if ($result->num_rows == 0) {
        echo "<script> alert('There are no categories') </script>";
        // header('location: editproductpage.php');
        exit;
    }

    while ($row  = $result->fetch_assoc()) {
        $categoryID = $row['cID'];
        $categoryName = $row['name'];

        echo "<option value=" . $categoryID . ">" . $categoryName . "</option> ";
    }

    $query->close();
}

function listCategories()
{
    global $conn;
    $tableName = "categories";

    $query = $conn->prepare("SELECT * FROM $tableName");

    if (!$query)
        die("Get category query prepare failed: " . $conn->error);

    if (!$query->execute())
        die("Get category query execution failed" . $query->error);

    $result = $query->get_result();

    if ($result->num_rows == 0) {
        echo "<script> alert('There are no categories') </script>";
        // header('location: editproductpage.php');
        exit;
    }

    while ($row  = $result->fetch_assoc()) {
        $categoryName = $row['name'];
        echo "<li>" . $categoryName . "</li> ";
    }

    $query->close();
}

function getSortCriteria()
{
    if (isset($_SESSION['sortState'])) {
        echo "<option>Sort</option>";
        echo ($_SESSION['sortState'] == 'price09') ? "<option value='price09' selected>Price: Low To High</option>" : "<option value='price09'>Price: Low To High</option>";
        echo ($_SESSION['sortState'] == 'price90') ? "<option value='price90' selected>Price: High to Low</option>" : "<option value='price90'>Price: High to Low</option>";
        echo ($_SESSION['sortState'] == 'nameAZ') ? "<option value='nameAZ' selected>Name: A-Z</option>" : "<option value='nameAZ'>Name: A-Z</option>";
        echo ($_SESSION['sortState'] == 'nameZA') ? "<option value='nameZA' selected>Name: Z-A</option>" : "<option value='nameZA'>Name: Z-A</option>";
    } else {
        echo "<option selected>Sort</option>
        <option value='price09'>Price: Low To High</option>
        <option value='price90'>Price: High to Low</option>
        <option value='nameAZ'>Name: A-Z</option>
        <option value='nameZA'>Name: Z-A</option>";
    }
}

function getUserData($emailAddress)
{
    global $conn;
    $tableName = "users";

    // get all the columns with the entered email address
    $query = $conn->prepare("SELECT * FROM $tableName WHERE emailAddress = ?");

    if (!$query)
        die("Get user data query prepare failed: " . $conn->error);

    $query->bind_param("s", $emailAddress);

    if (!$query->execute())
        die("Get user data query execution failed: " . $query->error);

    $result = $query->get_result();

    $query->close();

    return $result->fetch_assoc();
}

function getSellerData($userID)
{
    global $conn;
    $tableName = "sellers";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Get seller data query prepare failed: " . $conn->error);

    $query->bind_param("s", $userID);

    if (!$query->execute())
        die("Get seller data query execution failed: " . $query->error);

    $result = $query->get_result();

    $query->close();

    return $result->fetch_assoc();
}

function getBuyerData($userID)
{
    global $conn;
    $tableName = "buyers";

    //get the seller ID of th User
    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Get buyer data query prepare failed: " . $conn->error);

    $query->bind_param("s", $userID);

    if (!$query->execute())
        die("Get buyer data query execution failed: " . $query->error);

    $result = $query->get_result();

    $query->close();

    return $result->fetch_assoc();
}

function getAdminData($userID)
{
    global $conn;
    $tableName = "admins";

    //get the seller ID of th User
    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Get admin data query prepare failed: " . $conn->error);

    $query->bind_param("i", $userID);

    if (!$query->execute())
        die("Get admin data query execution failed: " . $query->error);

    $result = $query->get_result();

    $query->close();

    return $result->fetch_assoc();
}

function emailCheck($emailAddress)
{
    global $conn;
    $tableName = "users";

    // get all the columns with the entered email address
    $query = $conn->prepare("SELECT * FROM $tableName WHERE emailAddress = ?");

    if (!$query)
        die("Email check query prepare failed: " . $conn->error);

    $query->bind_param("s", $emailAddress);

    if (!$query->execute())
        die("Email check query execution failed: " . $query->error);

    $result = $query->get_result();

    $query->close();

    return $result;
}

function isAlreadySeller($userID)
{
    global $conn;
    $tableName = "sellers";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Seller check query prepare failed: " . $conn->error);

    $query->bind_param("s", $userID);

    if (!$query->execute())
        die("Seller check query execution failed: " . $query->error);

    $sellerCheckQueryResult = $query->get_result();

    $query->close();

    if ($sellerCheckQueryResult->num_rows > 0)
        return true;

    return false;
}

function isAlreadyAdmin($userID)
{
    global $conn;
    $tableName = "admins";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Admin check query prepare failed: " . $conn->error);

    $query->bind_param("s", $userID);

    if (!$query->execute())
        die("Admin check query execution failed: " . $query->error);

    $adminCheckQueryResult = $query->get_result();

    $query->close();

    if ($adminCheckQueryResult->num_rows > 0)
        return true;

    return false;
}

function isAlreadyBuyer($userID)
{
    global $conn;
    $tableName = "buyers";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$query)
        die("Buyer check query prepare failed: " . $conn->error);

    $query->bind_param("s", $userID);

    if (!$query->execute())
        die("Buyer check query execution failed: " . $query->error);

    $buyerCheckQueryResult = $query->get_result();

    $query->close();

    if ($buyerCheckQueryResult->num_rows > 0)
        return true;

    return false;
}

function addUserToTable($firstName, $lastName, $phoneNumber, $emailAddress, $password)
{
    global $conn;
    $tableName = "users";

    //insert the details into the 
    $query = $conn->prepare("INSERT INTO $tableName (firstName, lastName, phoneNumber, emailAddress, password) VALUES (?,?,?,?,?)");

    // Check for SQL errors
    if (!$query)
        die("Signup query prepare failed: " . $conn->error);

    $query->bind_param("sssss", $firstName, $lastName, $phoneNumber, $emailAddress, $password);

    if (!$query->execute())
        die("Signup query execution failed: " . $query->error);

    $query->close();

    return true;
}

function addBuyerToTable($userID, $streetAddress, $postcode)
{
    global $conn;
    $tableName = "buyers";

    $query = $conn->prepare("INSERT INTO $tableName (uID, streetAddress, postcode) VALUES (?,?,?)");

    // Check for SQL errors
    if (!$query)
        die("Buyer signup query prepare failed: " . $conn->error);

    $query->bind_param("sss", $userID, $streetAddress, $postcode);

    if (!$query->execute())
        die("Buyer sign up query execution failed: " . $query->error);

    $query->close();

    return true;
}

function addSellerToTable($userID, $streetAddress, $postcode)
{
    global $conn;
    $tableName = "sellers";

    $query = $conn->prepare("INSERT INTO $tableName (uID, streetAddress, postcode) VALUES (?,?,?)");

    // Check for SQL errors
    if (!$query)
        die("Seller signup query prepare failed: " . $conn->error);

    $query->bind_param("sss", $userID, $streetAddress, $postcode);

    if (!$query->execute())
        die("Seller sign up query execution failed: " . $query->error);

    $query->close();

    return true;
}

function addAdminToTable($userID)
{
    global $conn;
    $tableName = "admins";

    $query = $conn->prepare("INSERT INTO $tableName (uID) VALUES (?)");

    // Check for SQL errors
    if (!$query)
        die("Admin signup query prepare failed: " . $conn->error);

    $query->bind_param("i", $userID);

    if (!$query->execute())
        die("Admin sign up query execution failed: " . $query->error);

    $query->close();

    return true;
}

function getProductRow($productID)
{
    global $conn;
    $tableName = "products";

    if (empty($productID)) die("Error: Product ID is empty or invalid." . $productID);

    $query = $conn->prepare("SELECT * FROM $tableName WHERE pID = ?");

    if (!$query) die("Product Row query prepare failed: " . $conn->error);

    $query->bind_param("i", $productID);

    if (!$query->execute()) die("Product Row query execution failed" . $query->error);

    $result = $query->get_result();

    $query->close();

    return $result->fetch_assoc();
}

function getSellerDeliveryInfo($sellerID)
{
    global $conn;
    $tableName = "sellers";

    $query = $conn->prepare("SELECT postcode, deliveryRate FROM $tableName WHERE sID = ?");

    if (!$query) die("Get seller delivery info query prepare failed: " . $conn->error);

    $query->bind_param('i', $sellerID);

    if (!$query->execute()) die("Get seller delivery info query failed: " . $query->error);

    $result = $query->get_result();

    return $result->fetch_assoc();
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
    $arr = extractItem_Quant($item_quant);

    $result = "";

    foreach ($arr as $productID => $quantity) {
        $productRow = getProductRow($productID);
        $result = $result .  $productRow['name'] . ":" . $quantity . "\n";
    }

    return $result;
}
