<?php
session_start();
require_once('connect.php');
require_once('sellerfunctions.php');
require_once('product.php');

if (isset($_POST['editProduct'])) {
    //retrieve/extract the edited product information entered in the form
    $productID = $_POST['productID+Name'];
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productCategory = $_POST['productCategory'];
    $productMass = $_POST['productMass'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    $file = $_FILES['productImage'];

    if (empty($productID)) die("Error: Product ID is empty or invalid." . $productID);

    if ($productID == "") {
        echo "<script> alert('You have not selected a product to edit')</script>";
        exit;
    }

    if ($productName == "" && $productDescription == "" && $productCategory == "" && $productMass == "" && $productPrice == "" && $productQuantity == "") {
        echo "<script> alert('You have made an edits to the selected product')</script>";
        exit;
    }

    // get product data to create an object
    $productRow = getProductRow($productID);
    if ($productRow == null || $productRow == false) {
        echo "<script> alert('The product you have selected does not exist so we cannot make any edits to it')</script>";
        exit;
    }
    $product = new product($productRow);

    //assign the product with the new/edited values
    if ($productName != "") $product->name = $productName;

    if ($productDescription != "") $product->description = $productDescription;

    if ($productCategory != "") $product->cID = $productCategory;

    if ($productMass != "") $product->mass = $productMass;

    if ($productPrice != "") $product->price = $productPrice;

    if ($productQuantity != "") $product->quantity = $productQuantity;

    //do the same for image

    if (!editProductData($product)) {
        echo "<script> alert('There was an error editing the product you have selected')</script>";
        exit;
    }

    echo "<script> alert('you have successfully edited the product')</script>";
    header('location: editproductpage.php');
}
