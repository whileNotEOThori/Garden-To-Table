<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garden to Table</title>
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!-- Navbar Logo and Title-->
                <a class="navbar-brand fs-1" href="index.php"><img src="images/GTT Logo.jpg" alt="Logo" height="100px" class="d-inline-block align-text-top" />Garden To Table</a>
                <!--  -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" href="viewproductspage.php">View Products</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" href="addproductpage.php">Add Product</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" href="editproductpage.php">Edit Product</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" href="deleteproductpage.php">Delete Product</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" href="sellervieworders.php">View Orders</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" data-bs-toggle="modal" data-bs-target="#signOutModal" href="">Sign Out</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" style="color: darkolivegreen;" id="header-nav-link" href="sellerhomepage.php"><?php echo " <i class='bi bi-person-circle'></i> " . $_SESSION['seller']->firstName . " " . $_SESSION['seller']->lastName ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>