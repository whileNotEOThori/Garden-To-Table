<?php
require_once("user.php");
require_once('sellerfunctions.php');

class seller extends user
{
    public $sID;
    public $uID;
    public $streetAddress;
    public $postcode;
    public $totalSales;
    public $bankName;
    public $branchCode;
    public $accountNumber;
    public $deliveryRate;

    public function __construct($userRow, $sellerRow)
    {
        $this->uID = $userRow['uID'];
        $this->firstName = $userRow['firstName'];
        $this->lastName = $userRow['lastName'];
        $this->phoneNumber = $userRow['phoneNumber'];
        $this->emailAddress = $userRow['emailAddress'];
        $this->password = $userRow['password'];
        $this->sID = $sellerRow['sID'];
        $this->streetAddress = $sellerRow['streetAddress'];
        $this->postcode = $sellerRow['postcode'];
        $this->totalSales = $sellerRow['totalSales'];
        $this->bankName = $sellerRow['bankName'];
        $this->branchCode = $sellerRow['branchCode'];
        $this->accountNumber = $sellerRow['accountNumber'];
        $this->deliveryRate = $sellerRow['deliveryRate'];
    }

    public function editFirstName($updatedFirstName)
    {
        global $conn;
        $tableName = "users";

        $query = $conn->prepare("UPDATE $tableName SET firstName = ? WHERE uID = ?");

        if (!$query) die("Edit first query prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedFirstName, $this->uID);

        if (!$query->execute()) die("Edit first name query execution failed: " . $query->error);

        $query->close();

        $this->firstName = $updatedFirstName;
        return true;
    }

    public function editLastName($updatedLastName)
    {
        global $conn;
        $tableName = "users";

        $query = $conn->prepare("UPDATE $tableName SET lastName = ? WHERE uID = ?");

        if (!$query) die("Edit last query prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedLastName, $this->uID);

        if (!$query->execute()) die("Edit last name query execution failed: " . $query->error);

        $query->close();

        $this->lastName = $updatedLastName;
        return true;
    }

    public function editPhoneNumber($updatedPhoneNumber)
    {
        global $conn;
        $tableName = "users";

        $query = $conn->prepare("UPDATE $tableName SET phoneNumber = ? WHERE uID = ?");

        if (!$query) die("Edit phone number prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedPhoneNumber, $this->uID);

        if (!$query->execute()) die("Edit phone number query execution failed: " . $query->error);

        $query->close();

        $this->phoneNumber = $updatedPhoneNumber;
        return true;
    }

    public function editPostcode($updatedPostcode)
    {
        global $conn;
        $tableName = "sellers";

        $query = $conn->prepare("UPDATE $tableName SET postcode = ? WHERE sID = ?");

        if (!$query) die("Edit postcode prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedPostcode, $this->sID);

        if (!$query->execute()) die("Edit postcode query execution failed: " . $query->error);

        $query->close();

        $this->postcode = $updatedPostcode;
        return true;
    }

    public function editStreetAddress($updatedStreetAddress)
    {
        global $conn;
        $tableName = "sellers";

        $query = $conn->prepare("UPDATE $tableName SET streetAddress = ? WHERE sID = ?");

        if (!$query) die("Edit street address prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedStreetAddress, $this->sID);

        if (!$query->execute()) die("Edit street address query execution failed: " . $query->error);

        $query->close();

        $this->streetAddress = $updatedStreetAddress;
        return true;
    }

    public function editDeliveryRate($updatedDeliveryRate)
    {
        global $conn;
        $tableName = "sellers";

        $query = $conn->prepare("UPDATE $tableName SET deliveryRate = ? WHERE sID = ?");

        if (!$query) die("Edit delivery rate prepare failed: " . $conn->error);

        $query->bind_param('si', $updatedDeliveryRate, $this->sID);

        if (!$query->execute()) die("Edit delivery rate query execution failed: " . $query->error);

        $query->close();

        $this->deliveryRate = $updatedDeliveryRate;
        return true;
    }

    public function editBankingDetails($updatedBankName, $updatedBranchCode, $updatedAccountNumber)
    {
        global $conn;
        $tableName = "sellers";

        $query = $conn->prepare("UPDATE $tableName SET bankName = ?, branchCode = ?, accountNumber = ? WHERE sID = ?");

        if (!$query) die("Edit banking details prepare failed: " . $conn->error);

        $query->bind_param('sssi', $updatedBankName, $updatedBranchCode, $updatedAccountNumber, $this->sID);

        if (!$query->execute()) die("Edit banking details query execution failed: " . $query->error);

        $query->close();

        $this->bankName = $updatedBankName;
        $this->branchCode = $updatedBranchCode;
        $this->accountNumber = $updatedAccountNumber;
        return true;
    }

    public function getNumListedProducts()
    {
        global $conn;
        $tableName = "products";

        $query = $conn->prepare("SELECT COUNT(*) AS numProducts FROM $tableName WHERE sID = ?");

        if (!$query) die("Get number of listed products query prepare failed: " . $conn->error);

        $query->bind_param('i', $this->sID);

        if (!$query->execute()) die("Get number of listed products query execution failed: " . $query->error);

        $result = $query->get_result();

        $query->close();

        return $result->fetch_assoc()['numProducts'];
    }

    public function viewListedProducts()
    {
        global $conn;
        $tableName = "products";

        $query = $conn->prepare("SELECT * FROM $tableName WHERE sID = ?");

        if (!$query)
            die("View listed products query prepare failed: " . $conn->error);

        $query->bind_param("i", $_SESSION['seller']->sID);

        if (!$query->execute())
            die("View listed products query execution failed: " . $query->error);

        $result = $query->get_result();

        if ($result->num_rows > 0) {
            echo "
        <div class='table-responsive'>
        <table class='table table-striped'>
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

    public function addProduct()
    {
        global $conn;

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
        $productImage = file_get_contents(addslashes($fileTempName));

        $addProductQuery = $conn->prepare("INSERT INTO $tableName (sID, cID, name, description, mass, price, quantity, image) VALUES (?,?,?,?,?,?,?,?)");

        if (!$addProductQuery)
            die("Add product query prepare failed: " . $conn->error);

        $addProductQuery->bind_param("ssssssss", $_SESSION['seller']->sID, $productCategory, $productName, $productDescription, $productMass, $productPrice, $productQuantity, $productImage);

        if (!$addProductQuery->execute())
            die("Add product query execution failed: " . $addProductQuery->error);

        $addProductQuery->close();
    }

    public function editProduct()
    {
        global $conn;
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
}
