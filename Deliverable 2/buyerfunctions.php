<?php
require_once("connect.php");
require_once("buyer.php");

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
                    <button type='submit' name='addToCart' value='addToCart' class='btn btn-success'>Add To Cart</button>
                    <button type='submit' name='viewProduct' value='viewProduct' class='btn btn-secondary'>View</button>
                </div>
            </div>";
}

function getAllProducts()
{
    global $conn;
    $tableName = "products";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE quantity > 0");

    if (!$query) die("Display product cards query prepare failed: " . $conn->error);

    if (!$query->execute()) die("Display product cards query execution failed: " . $query->error);

    $result = $query->get_result();
    $query->close();

    return $result;
}

function getFilteredProducts()
{
    global $conn;
    $tableName = "products";

    // if (empty($_SESSION['filterState']))
    if ($_SESSION['filterState'] == "none")
        return getAllProducts();

    $query = $conn->prepare("SELECT * FROM $tableName WHERE quantity > 0 AND cID = ?");

    if (!$query) die("Display filtered product cards query prepare failed: " . $conn->error);

    $query->bind_param('i', $_SESSION['filterState']);

    if (!$query->execute()) die("Display filtered product cards query execution failed: " . $query->error);

    $result = $query->get_result();
    $query->close();

    return $result;
}

function displayProductCards()
{
    $result = getAllProducts();

    if (!$result) die("False was returned when getting/retrieving the products");

    if ($result->num_rows > 0) {
        $counter = 0;

        while ($productRow = $result->fetch_assoc()) {
            if ($counter % 4 == 0) echo "<div class='row'>";

            echo "<div class='col-6 col-md-3 mb-3 mt-3'>";
            displayProductCard($productRow);
            echo "</div>";

            $counter++;

            if ($counter % 4 == 0) echo "</div>";
        }
        if ($counter % 4 != 0) echo "</div>";
    } else {
        echo "<h3>There are currently no products listed.</h3>";
    }
}

function displayProductCardsFiltered()
{
    $result = getFilteredProducts();

    if (!$result) die("False was returned when getting/retrieving the filtered products");

    if ($result->num_rows > 0) {
        $counter = 0;

        while ($productRow = $result->fetch_assoc()) {
            if ($counter % 4 == 0) echo "<div class='row'>";

            echo "<div class='col-6 col-md-3 mb-3 mt-3'>";
            displayProductCard($productRow);
            echo "</div>";

            $counter++;

            if ($counter % 4 == 0) echo "</div>";
        }
        if ($counter % 4 != 0) echo "</div>";
    } else {
        echo "<h3>There are currently no products listed.</h3>";
    }
}
