<?php
include("seller.php");
include("sellerfunctions.php");
session_start();

//redirect the user back to the homepage to sign in again if there is no active session
if (empty($_SESSION['seller'])) {
  header("location: homepage.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Garden To Table</title>
  <!-- Icon next to title on tab -->
  <link rel="icon" href="images/GTT Logo.jpg" />
  <!-- Bootstrap CDN link -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
  <!-- link to stylesheet -->
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- header -->
  <?php include('sellerheader.php') ?>

  <main>
    <h2>Add Product</h2>

    <!-- Add Product Form -->
    <form id="addProductForm" action="addproduct.php" enctype="multipart/form-data" method="POST">
      <div class="container" style="width: 550px">
        <!-- Product Name Input Div -->
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="productName" name="productName" placeholder="Name" required />
          <label for="productName">Name</label>
        </div>

        <!-- Product Description Input Div -->
        <div class="form-floating mb-3">
          <textarea class="form-control h-100" rows="5" id="productDescription" name="productDescription" placeholder="Description" required></textarea>
          <label for="productDescription">Description</label>
        </div>

        <!-- Category Selection -->
        <select class="form-select mb-3" id="productCategory" name="productCategory" aria-label="Category select" required>
          <option value="" selected>Category</option>
          <?php getCategories() ?>
        </select>

        <!-- Mass Input Div -->
        <div class="form-floating mb-3">
          <input type="number" class="form-control" id="productMass" name="productMass" placeholder="Mass [g]" min="1" required />
          <label for="productMass">Mass [g]</label>
        </div>

        <!-- Price Input Div -->
        <div class="form-floating mb-3">
          <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Price" required />
          <label for="productPrice">Price</label>
        </div>

        <!-- Quantity Input Div -->
        <div class="form-floating mb-3">
          <input type="number" class="form-control" id="productQuantity" name="productQuantity" placeholder="Quantity" min="1" required />
          <label for="productQuantity">Quantity</label>
        </div>

        <!-- Image Input Div -->
        <div class="form-floating mb-3">
          <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required />
          <label for="productImage">Image</label>
        </div>

        <!-- Add Product Button -->
        <div class="container mb-3" style="display: flex; justify-content: center">
          <button type="submit" name="addProduct" value="addProduct" class="btn btn-primary">Add Product</button>
        </div>
      </div>
    </form>

  </main>

  <!-- Footer -->
  <?php include('sellerfooter.php') ?>

  <!-- Seller Sign Out Modal -->
  <?php include('signoutmodal.php') ?>
</body>

</html>