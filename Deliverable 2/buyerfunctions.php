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
    echo
    "<div class='card'>
            <img height=\"250px\" width=\"250px\" src=\"data:image/jpeg;base64," . base64_encode($productRow['image']) . "\"  class='card-img-top' alt=\"" . $productRow['name'] . " Image\">
            <div class='card-body'>
                <h5 class='card-title'>" . $productRow['name'] . "</h5>
                <p class='card-text'><strong>Price:</strong> R" . $productRow['price'] . "<br> <strong>Mass:</strong> " . $productRow['mass'] . " grams</p>
                
                <div class='d-flex align-items-center gap-2'>                
                    <form action='addtocart.php' method='POST'>";

    if (isset($_SESSION['cart'][$productRow['pID']]) && $_SESSION['cart'][$productRow['pID']] == $productRow['quantity'])
        echo "<button type='submit' name='quickAddToCart' value='" . $productRow['pID'] . "' class='btn btn-success' disabled>Add To Cart</button>";
    else
        echo "<button type='submit' name='quickAddToCart' value='" . $productRow['pID'] . "' class='btn btn-success'>Add To Cart</button>";
    echo "</form>

                    <form action='viewproduct.php' method='POST'>
                            <button type='submit' name='viewProduct' value='" . $productRow['pID'] . "' class='btn btn-secondary'>View</button>
                    </form>
                </div>
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
    $order = $_SESSION['orderState'];

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
    $order = $_SESSION['orderState'];

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

function displayCartProductTable()
{
    $total = 0.00;
    echo "<table class='table table-striped'>
        <thead>
          <tr>
          <th scope='col'>Image</th>
          <th scope='col'>Name</th>
          <th scope='col'>Unit Mass</th>
          <th scope='col'>Unit Price</th>
          <th scope='col'>Quantity</th>
          <th scope='col'>Total Mass</th>
          <th scope='col'>Total Price</th>
          </tr>
        </thead>
        <tbody>";
    foreach ($_SESSION['cart'] as $productID => $quantity) {
        $productRow = getProductRow($productID);
        $image = base64_encode($productRow['image']); // Encode the BLOB data as base64
        $total += $productRow['price'] * $quantity;
        $max = $productRow['quantity'];

        echo "<tr>
            <td><img height='50px' width='50px' src='data:image/jpeg;base64,$image'></td>
            <td>" . $productRow['name'] . "</td>
            <td>" . $productRow['mass'] . "g</td>
            <td>R" .  $productRow['price'] . "</td>
            <td> 
                <div class='d-flex justify-content-center align-items-center gap-2'>
                    <div class='form-floating mb-0'>
                        <input type='number' class='form-control' id='p" . $productID . "Quantity' name='p" . $productID . "Quantity' placeholder='Quantity' value='" . $quantity . "' min='0' max=" . $max . " required />
                        <label for='productQuantity'>Quantity</label>
                    </div>
                    <form action='addtocart.php' method='POST'>
                        <button type='submit' name='removeProduct' value='" . $productID . "' class='btn btn-secondary'><i class='bi bi-trash3'></i></button>
                    </form>
                </div>
            </td>
            <td>" .  $productRow['mass'] * $quantity . "g</td>
            <td>R" .  $productRow['price'] * $quantity . "</td>
          </tr>";
    }
    echo "</tbody>
      </table>
      <p><strong>Total:</strong> R" . $total . " </p>";
}

function displayCheckOutProductTable()
{
    $total = 0.00;
    echo "<form id='checkout' action='checkout.php' method='POST'>
    <table class='table table-striped'>
        <thead>
          <tr>
          <th scope='col'>Image</th>
          <th scope='col'>Name</th>
          <th scope='col'>Unit Mass [g]</th>
          <th scope='col'>Unit Price [R]</th>
          <th scope='col'>Quantity</th>
          <th scope='col'>Total Mass [g]</th>
          <th scope='col'>Total Price [R]</th>
          </tr>
        </thead>
        <tbody>";
    foreach ($_SESSION['cart'] as $productID => $quantity) {
        $productRow = getProductRow($productID);
        $image = base64_encode($productRow['image']); // Encode the BLOB data as base64
        $total += $productRow['price'] * $quantity;

        echo "<tr>
            <td><img height='50px' width='50px' src='data:image/jpeg;base64,$image'></td>
            <td>" . $productRow['name'] . "</td>
            <td>" . $productRow['mass'] . "</td>
            <td>" .  $productRow['price'] . "</td>
            <td>" . $quantity . "</td>
            <td>" . $quantity * $productRow['mass'] . "</td>
            <td>" .  $productRow['price'] * $quantity . "</td>
          </tr>";
    }
    echo "</tbody>
      </table>
        </form>
      <p><strong>Service Fee:</strong> R" . $total * $_ENV['SERVICE_FEE'] . " </p>
      <p><strong>Total:</strong> R" . $total . " </p>
      <p><strong>Grand Total:</strong> R" . $total * (1 + $_ENV['SERVICE_FEE']) . " </p>";
}

function getFilterCategories()
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

        if ($_SESSION['filterState'] == $categoryID)
            echo "<option value=" . $categoryID . " selected>" . $categoryName . "</option> ";
        else
            echo "<option value=" . $categoryID . ">" . $categoryName . "</option> ";
    }

    $query->close();
}
