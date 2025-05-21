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
                <a class="navbar-brand" href="homepage.php"><img src="images/GTT Logo.jpg" alt="Logo" height="100px" class="d-inline-block align-text-top" />Garden To Table</a>
                <!--  -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" href="buypage.php">Buy</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" href="">View Orders</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" href="">Process Orders</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" id="header-nav-link" data-bs-toggle="modal" data-bs-target="#signOutModal" href="">Sign Out</a></li>
                        <li class="nav-item"><a class="nav-link fs-6" style="color: darkolivegreen;" id="header-nav-link" href="buyerhomepage.php"><?php echo " <i class='bi bi-person-circle'></i> " . $_SESSION['buyer']->firstName . " " . $_SESSION['buyer']->lastName ?></a></li>
                        <li class="nav-item"><a class="nav-link fs-6 position-relative" id="header-nav-link" data-bs-toggle="modal" data-bs-target="#cartModal" href=""><i class="bi bi-cart4 h3"></i><span class="position-absolute top-10 start-60 translate-middle badge rounded-pill bg-success"><?php echo ($_SESSION['cart'] == null) ? 0 : count($_SESSION['cart']) ?></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>