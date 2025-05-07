<?php
include("seller.php");
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
  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <!-- Navbar Logo and Title-->
        <a class="navbar-brand" href="homepage.php"><img src="images/GTT Logo.jpg" alt="Logo" height="100px" class="d-inline-block align-text-top" />Garden To Table</a>
        <!--  -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link fs-5" id="header-nav-link" href="#">Add Product</a></li>
            <li class="nav-item"><a class="nav-link fs-5" id="header-nav-link" href="editproductpage.php">Edit Product</a></li>
            <li class="nav-item"><a class="nav-link fs-5" id="header-nav-link" href="">Delete Product</a></li>
            <li class="nav-item"><a class="nav-link fs-5" id="header-nav-link" href="">Process Orders</a></li>
            <li class="nav-item"><a class="nav-link fs-5" id="header-nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="">Sign Out</a></li>
            <li class="nav-item"><a class="nav-link fs-5" style="color: darkolivegreen;" id="header-nav-link" href=""><?php echo " <i class='bi bi-person-circle'></i> " . $_SESSION['seller']->firstName . " " . $_SESSION['seller']->lastName ?></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

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
          <option selected>Category</option>
          <option value="1">Fruits</option>
          <option value="2">Vegetables</option>
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
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Add Product</a></li>
      <li class="nav-item"><a href="editproductpage.php" class="nav-link px-2 text-body-secondary">Edit Product</a></li>
      <li class="nav-item"><a href="" class="nav-link px-2 text-body-secondary">Edit Product</a></li>
      <li class="nav-item"><a href="" class="nav-link px-2 text-body-secondary">Process Order</a></li>
    </ul>
    <p class="text-center text-body-secondary"><img src="images/GTT Logo.jpg" alt="Logo" height="50px" /> Garden To Table ©. All rights reserved.</p>
  </footer>

  <!-- Seller Sign Out Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Seller Sign In</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Sign In Form -->
          <form id="sellerSignOutForm" action="signout.php" method="POST">
            <div class="container" style="width: 450px">
              <!-- Message -->
              <p class="text-center">Are you sure you want to sign out?</p>
              <p class="text-center">All you progress will be lost.</p>
            </div>

            <!-- Sign In Button -->
            <div class="container" style="display: flex; justify-content: center">
              <button type="submit" name="signOut" value="signOut" class="btn btn-primary">Sign Out</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>