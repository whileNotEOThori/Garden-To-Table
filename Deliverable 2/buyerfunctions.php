<?php
require_once('functions.php');

function isBuyerSignedIn()
{
    if (empty($_SESSION['buyer'])) {
        // echo "<script> alert('You have been signed out. Sign In again.') </script>";
        header("location: homepage.php");
        exit;
    }
}

function displayProductCard($productRow)
{
    echo    "<div class='card'>
                <img height=\"250px\" width=\"250px\" src=\"data:image/jpeg;base64," . base64_encode($productRow['image']) . "\"  class='card-img-top' alt=" . $productRow['name'] . " Image>
                <div class='card-body'>
                    <h5 class='card-title'>" . $productRow['name'] . "</h5>
                    <p class='card-text'><strong>Price:</strong> R" . $productRow['price'] . "<br> <strong>Mass:</strong> " . $productRow['mass'] . " grams</p>
                    <form action='addtocart.php' method='POST'>
                        <button type='submit' name='quickAddToCart' value=" . $productRow['pID'] . " class='btn btn-success'>Add To Cart</button>
                        <button type='submit' name='viewProduct' value=" . $productRow['pID'] . " class='btn btn-secondary'>View</button>
                    </form>
                </div>
            </div>";
}

function displayProductCardsFromResult($result)
{
    if (!$result) {
        echo "<h3>There are currently no products listed.</h3>";
        return;
    }

    if ($result->num_rows > 0) {
        $counter = 0;
        echo "<div class='container-fluid'>";
        while ($productRow = $result->fetch_assoc()) {
            if ($counter % 4 == 0) echo "<div class='row'>";
            echo "<div class='col-6 col-md-3 mb-3 mt-3'>";
            displayProductCard($productRow);
            echo "</div>";
            $counter++;
            if ($counter % 4 == 0) echo "</div>";
        }
        if ($counter % 4 != 0) echo "</div>"; // Close last row if not complete
        echo "</div>"; // Close container
    } else {
        echo "<h3>There are currently no products listed.</h3>";
    }
}

function getAllProducts()
{
    global $conn;
    $tableName = "products";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE quantity > 0");

    if (!$query) die("Get all products query prepare failed: " . $conn->error);

    if (!$query->execute()) die("Get all products query execution failed: " . $query->error);

    $result = $query->get_result();
    $query->close();

    return $result;
}

function displayProductCards()
{
    $result = getAllProducts();
    displayProductCardsFromResult($result);
}

function getProductsFiltered()
{
    global $conn;
    $tableName = "products";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE quantity > 0 AND cID = ?");

    if (!$query) die("Display filtered product cards query prepare failed: " . $conn->error);

    $query->bind_param('i', $_SESSION['filterState']);

    if (!$query->execute()) die("Display filtered product cards query execution failed: " . $query->error);

    $result = $query->get_result();
    $query->close();

    return $result;
}

function displayProductCardsFiltered()
{
    $result = getProductsFiltered();
    displayProductCardsFromResult($result);
}

function getProductsSorted()
{
    global $conn;
    $tableName = "products";
    $order = $_SESSION['sortState'];

    $query = $conn->prepare("SELECT * FROM $tableName WHERE quantity > 0 $order");

    if (!$query) die("Get products sorted query prepare failed: " . $conn->error);

    if (!$query->execute()) die("Get products sorted query execution failed: " . $query->error);

    $result = $query->get_result();
    $query->close();

    return $result;
}

function displayProductCardsSorted()
{
    $result = getProductsSorted();
    displayProductCardsFromResult($result);
}

function getProductsFilteredAndSorted()
{
    global $conn;
    $tableName = "products";
    $order = $_SESSION['sortState'];

    $query = $conn->prepare("SELECT * FROM $tableName WHERE quantity > 0 AND cID = ? $order");

    if (!$query) die("Get products filtered and sorted query prepare failed: " . $conn->error);

    $query->bind_param('i', $_SESSION['filterState']);

    if (!$query->execute()) die("Get products filtered and sorted query execution failed: " . $query->error);

    $result = $query->get_result();
    $query->close();

    return $result;
}

function displayProductCardsFilteredAndSorted()
{
    $result = getProductsFilteredAndSorted();
    displayProductCardsFromResult($result);
}
