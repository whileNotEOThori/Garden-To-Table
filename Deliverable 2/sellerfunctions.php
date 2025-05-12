<?php
include('connect.php');
include('product.php');

function isSellerSignedIn()
{
    if (empty($_SESSION['seller'])) {
        // echo "<script> alert('You have been signed out. Sign In again.') </script>";
        header("location: homepage.php");
        exit;
    }
}

function getProductIDandName()
{
    global $conn;
    $tableName = "products";

    $productIDandNameQuery = $conn->prepare("SELECT * FROM $tableName WHERE sID = ?");

    if (!$productIDandNameQuery)
        die("Product ID and Name query prepare failed: " . $conn->error);

    $productIDandNameQuery->bind_param("s", $_SESSION['seller']->sID);

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

function getProductRow($productID)
{
    global $conn;
    $tableName = "products";

    if (empty($productID)) die("Error: Product ID is empty or invalid." . $productID);

    $productRowQuery = $conn->prepare("SELECT * FROM $tableName WHERE pID = ?");

    if (!$productRowQuery) die("Product Row query prepare failed: " . $conn->error);

    $productRowQuery->bind_param("i", $productID);

    if (!$productRowQuery->execute()) die("Product Row query execution failed" . $productRowQuery->error);

    $result = $productRowQuery->get_result();

    //not necessary because the users selects from existing products
    if ($result->num_rows == 0) {
        echo "<script> alert('The product is not stored in the database') </script>";
        exit;
    }

    $productRowQuery->close();

    return $result->fetch_assoc();
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

//Retrieve image from database and display it on html webpage
//use global keyword to declare conn and tablename inside a function
//wont be called yet
function displayImages()
{
    global $conn, $tableName;
    $displayImagesQuery = $conn->prepare("SELECT * FROM $tableName");

    if (!$displayImagesQuery)
        die("Display images query prepare failed: " . $conn->error);

    if (!$displayImagesQuery->execute())
        die("Display images query execution failed: " . $displayImagesQuery->error);

    $result = $displayImagesQuery->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // $image = $row['image']; // The image is already Base64-encoded in the database
            // echo "<img height=\"250px\" width=\"250px\" src=\"data:image/jpeg;base64,$image\" />";
            $image = base64_encode($row['image']); // Encode the BLOB data as base64
            echo "<img height=\"250px\" width=\"250px\" src=\"data:image/jpeg;base64,$image\" />";
        }
    }

    $displayImagesQuery->close();
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

function deleteProduct($productID)
{
    global $conn;
    $tableName = "products";

    $query = $conn->prepare("DELETE FROM $tableName WHERE pID = ?");

    if (!$query) die("Product delete query prepare failed: " . $conn->error);

    $query->bind_param("i", $productID);

    if (!$query->execute()) die("Product delete query execution failed: " . $query->error);

    $query->close();

    return true;
}

function viewProducts($sellerID)
{
    global $conn;
    $tableName = "products";

    $query = $conn->prepare("SELECT * FROM $tableName WHERE sID = ?");

    if (!$query)
        die("View products query prepare failed: " . $conn->error);

    $query->bind_param("i", $sellerID);

    if (!$query->execute())
        die("View products query execution failed: " . $query->error);

    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo "<table class='table table-striped'>
        <thead>
          <tr>
          <th scope='col'>Product ID</th>
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
            <td>" . getCategoryName($product->cID) . "</td>
            <td>" . $product->name . "</td>
            <td>" . $product->description . "</td>
            <td>" .  $product->mass . "</td>
            <td>" .  $product->price . "</td>
            <td>" . $product->quantity . "</td>
            <td><img height=\"50px\" width=\"50px\" src=\"data:image/jpeg;base64,$product->image\" /></td>;
          </tr>";
        }
        echo "</tbody>
      </table>";
    } else {
        echo "<h3>No products being sold</h3>";
    }

    $query->close();
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
