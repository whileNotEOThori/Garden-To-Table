<?php
session_start();
include('connect.php');

//redirect the user back to the homepage to sign in again if there is no active session
if (empty($_SESSION['sellerID'])) {
    // echo "<script> alert('You have been signed out. Sign In again.') </script>";
    header("location: homepage.php");
    exit;
}

if (isset($_POST['addProduct'])) {
    //retrieve/extract the information entered in the form
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productCategory = $_POST['productCategory'];
    $productMass = $_POST['productMass'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    $file = $_FILES['productImage'];

    //extract information from the file
    $fileName = $file['name']; //actual full name of the file
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name']; //temporary location
    $fileError = $file['error'];
    $fileSize = $file['size'];

    //checks if uploaded file is an image
    if (!getimagesize($fileTempName)) {
        echo "<script> alert('Uploaded file in not an image. Files should be image files of .jpg, .jpeg or .png') </script>";
        exit;
    }

    //check if the file type is that of an appropriate image
    $fileExt = explode('.', $fileName); //explode is like split in C#
    $fileActualExt = strtolower(end($fileExt)); //get the extension of the file and convert it to lowercases
    $allowedExts = array('jpg', 'jpeg', 'png'); //allowed file types

    if (!in_array($fileActualExt, $allowedExts)) {
        echo "<script> alert('Incorrect file type. Files should be image files of .jpg, .jpeg or .png') </script>";
        exit;
    }

    //check for upload error
    if ($fileError !== 0) {
        echo "<script> alert('There was an error uploading your file.') </script>";
        exit;
    }

    // check file size
    if ($fileSize > 16777215) {
        echo "<script> alert('The uploaded file is too big.') </script>";
        exit;
    }

    $tableName = "products";
    // $productImage = base64_encode(file_get_contents(addslashes($fileTempName)));
    $productImage = file_get_contents(addslashes($fileTempName));

    $addProductQuery = $conn->prepare("INSERT INTO $tableName (sID, cID, name, description, mass, price, quantity, image) VALUES (?,?,?,?,?,?,?,?)");

    if (!$addProductQuery)
        die("Add product query prepare failed: " . $conn->error);

    $addProductQuery->bind_param("ssssssss", $_SESSION['sellerID'], $productCategory, $productName, $productDescription, $productMass, $productPrice, $productQuantity, $productImage);

    if (!$addProductQuery->execute())
        die("Add product query execution failed: " . $addProductQuery->error);

    $addProductQuery->close();

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
    //set the upload target folder
}
