<?php
require_once('functions.php');

function isSellerSignedIn()
{
    if (empty($_SESSION['seller'])) {
        // echo "<script> alert('You have been signed out. Sign In again.') </script>";
        header("location: index.php");
        exit;
    }
}

function getProductIDandName()
{
    global $conn;
    $tableName = "products";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE sID = ?");

    if (!$query)
        die("Product ID and Name query prepare failed: " . $conn->error);

    $query->bind_param("s", $_SESSION['seller']->sID);

    if (!$query->execute())
        die("Product ID and Name query execution failed" . $query->error);

    $result = $query->get_result();

    if ($result->num_rows == 0) {
        echo "<script> alert('There are no products to edit') </script>";
        // header('location: editproductpage.php');
        exit;
    }

    while ($row  = $result->fetch_assoc()) {
        $productID = $row['pID'];
        $productName = $row['name'];

        echo "<option value=" . $productID . ">" . $productID . " - " . $productName . "</option> ";
    }

    $query->close();
}

//Retrieve image from database and display it on html webpage
//use global keyword to declare conn and tablename inside a function
//wont be called yet
function displayImages()
{
    global $conn, $tableName;
    $query = $conn->prepare("SELECT * FROM $tableName");

    if (!$query)
        die("Display images query prepare failed: " . $conn->error);

    if (!$query->execute())
        die("Display images query execution failed: " . $query->error);

    $result = $query->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // $image = $row['image']; // The image is already Base64-encoded in the database
            // echo "<img height=\"250px\" width=\"250px\" src=\"data:image/jpeg;base64,$image\" />";
            $image = base64_encode($row['image']); // Encode the BLOB data as base64
            echo "<img height=\"250px\" width=\"250px\" src=\"data:image/jpeg;base64,$image\" />";
        }
    }

    $query->close();
}

function editProductData($product)
{
    global $conn;
    $tableName = "products";

    $query = $conn->prepare("UPDATE $tableName SET cID = ? , name = ? , description = ? , mass = ? , price = ? , quantity = ? WHERE pID = ?");

    if (!$query) die("Edit product data query prepare failed: " . $conn->error);

    $query->bind_param("sssssss", $product->cID, $product->name, $product->description, $product->mass, $product->price, $product->quantity, $product->pID);

    if (!$query->execute()) die("Edit product data query execution failed: " . $query->error);

    $query->close();

    return true;
}

function getCategoryName($cID)
{
    global $conn;
    $tableName = "categories";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE cID = ?");

    if (!$query)
        die("Get category name query prepare failed: " . $conn->error);

    $query->bind_param("i", $cID);

    if (!$query->execute())
        die("Get category name query execution failed: " . $query->error);

    $result = $query->get_result();

    return $result->fetch_assoc()['name'];
}

function editSellerData($seller)
{
    global $conn;

    ///////////////////////////////////////////////////////user table////////////////////////////////////////////
    $tableName = "users";

    $query = $conn->prepare("UPDATE $tableName SET firstName = ? , lastName = ? , phoneNumber = ? , emailAddress = ? , password = ? WHERE uID = ?");

    if (!$query) die("Edit User data query prepare failed: " . $conn->error);

    $query->bind_param("ssssss", $seller->firstName, $seller->lastName, $seller->phoneNumber, $seller->emailAddress, $seller->password, $seller->uID);

    if (!$query->execute()) die("Edit user data query execution failed: " . $query->error);

    $query->close();

    ///////////////////////////////////////////////////////seller table////////////////////////////////////////////
    $tableName = "sellers";

    $query = $conn->prepare("UPDATE $tableName SET streetAddress = ? , postcode = ? , bankName = ? , branchCode = ? , accountNumber = ? WHERE sID = ?");

    if (!$query) die("Edit seller data query prepare failed: " . $conn->error);

    $query->bind_param("ssssss", $seller->streetAddress, $seller->postcode, $seller->bankName, $seller->branchCode, $seller->accountNumber, $seller->sID);

    if (!$query->execute()) die("Edit seller data query execution failed: " . $query->error);

    $query->close();

    return true;
}
