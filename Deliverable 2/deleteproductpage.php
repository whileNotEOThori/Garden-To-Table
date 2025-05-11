<?php
include("seller.php");
include("product.php");
include("sellerfunctions.php");
session_start();

// Redirect the user back to the homepage to sign in again if there is no active session
isSellerSignedIn();

//remove the product from the session whenever the page is refreshed/reloaded
unset($_SESSION['deleteProduct']);

if (isset($_POST['deleteProduct'])) {
    // Retrieve/extract the delete product information entered in the form
    $productID = $_POST['productID+Name'];

    if (empty($productID)) die("Error: Product ID is empty or invalid." . $productID);

    if ($productID == "") {
        echo "<script> alert('You have not selected a product to edit')</script>";
        exit;
    }
    $productRow = getProductRow($productID);

    if ($productRow == null || $productRow == false) {
        echo "<script> alert('The product you have selected does not exist so we cannot delete it')</script>";
        exit;
    }

    $_SESSION['deleteProduct'] = new product($productRow);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garden To Table</title>
    <?php include("stylingdependecies.php") ?>
</head>

<body>
    <!-- header -->
    <?php include('sellerheader.php') ?>

    <main>
        <h2>Delete Product</h2>
        <!-- Delete Product Form -->
        <form id="deleteProductForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="container" style="width: 550px">
                <!-- Product ID and Name Selection -->
                <select class="form-select mb-3" id="productID+Name" name="productID+Name" aria-label="Product select" required>
                    <option value="" selected>Product ID and Name</option>
                    <?php getProductIDandName() ?>
                </select>

                <!-- Delete Button -->
                <div class="container mb-3" style="display: flex; justify-content: center">
                    <button type="submit" name="deleteProduct" value="deleteProduct" class="btn btn-primary">Delete Product</button>
                </div>
            </div>
        </form>
    </main>

    <!-- Footer -->
    <?php include('sellerfooter.php') ?>

    <!-- Seller Sign Out Modal -->
    <?php include('signoutmodal.php') ?>

    <!-- Modal -->
    <div class="modal fade" id="deleteProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Product</h1>
                    <button type="submit" id="deleteProductClose" name="deleteProductClose" value="deleteProductClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php echo "<p><strong>Are you sure you would like to delete the product below? </strong> </p>" ?>
                        <div class="col">
                            <?php $image = $_SESSION['deleteProduct']->image; // Encode the BLOB data as base64
                            echo "<img height=\"250px\" width=\"250px\" src=\"data:image/jpeg;base64,$image\" />" ?>
                        </div>

                        <div class="col">
                            <?php echo "<p><b>Product ID:</b> " . $_SESSION['deleteProduct']->pID . "</p>" ?>
                            <?php echo "<p><b>Name:</b> " . $_SESSION['deleteProduct']->name . "</p>" ?>
                            <?php echo "<p><b>Description:</b> " . $_SESSION['deleteProduct']->description . "</p>" ?>
                            <?php echo "<p><b>Mass:</b> " . $_SESSION['deleteProduct']->mass . " g</p>" ?>
                            <?php echo "<p><b>Price:</b> R" . $_SESSION['deleteProduct']->quantity . "</p>" ?>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <form id="deleteProductConfirm" action="deleteproduct.php" enctype="multipart/form-data" method="POST">
                        <button type="submit" id="deleteProductNo" name="deleteProductNo" value="deleteProductNo" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" id="deleteProductYes" name="deleteProductYes" value="deleteProductYes" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['deleteProduct'])): ?>
        <script>
            // Trigger the modal programmatically
            const deleteProductModal = new bootstrap.Modal(document.getElementById('deleteProductModal'));
            deleteProductModal.show();
        </script>

    <?php endif; ?>
</body>

</html>