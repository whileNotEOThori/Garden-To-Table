<?php
include('connect.php');

function getProductIDandName()
{
    global $conn;
    $tableName = "products";

    $productIDandNameQuery = $conn->prepare("SELECT * FROM $tableName WHERE sID = ?");

    if (!$productIDandNameQuery)
        die("Product ID and Name query prepare failed: " . $conn->error);

    $productIDandNameQuery->bind_param("s", $_SESSION['sellerID']);

    if (!$productIDandNameQuery->execute())
        die("Product ID and Name query execution failed" . $productIDandNameQuery->error);

    $result = $productIDandNameQuery->get_result();

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

    $productIDandNameQuery->close();
}

function getProductRow()
{
    global $conn;
    $tableName = "products";

    $productRowQuery = $conn->prepare("SELECT * FROM $tableName WHERE pID = ?");

    if (!$productRowQuery)
        die("Product Row query prepare failed: " . $conn->error);

    $productRowQuery->bind_param("s", $_SESSION['productID']);

    if (!$productRowQuery->execute())
        die("Product Row query execution failed" . $productRowQuery->error);

    $result = $productRowQuery->get_result();

    //not necessary because the users selects from existing products
    if ($result->num_rows == 0) {
        echo "<script> alert('The product is not stored in the database') </script>";
        // header('location: editproductpage.php');
        exit;
    }

    return $result->fetch_assoc();

    $productRowQuery->close();
}


function getCategories()
{
    global $conn;
    $tableName = "categories";

    $getCategoryQuery = $conn->prepare("SELECT * FROM $tableName");

    if (!$getCategoryQuery)
        die("Get category query prepare failed: " . $conn->error);

    if (!$getCategoryQuery->execute())
        die("Get category query execution failed" . $getCategoryQuery->error);

    $result = $getCategoryQuery->get_result();

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

    $getCategoryQuery->close();
}
