<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <!-- Redirect the seller to the sellerhomepage if they already have an active session -->
                        <?php if (!empty($_SESSION['seller'])): ?>
                            <li class="nav-item"><a class="nav-link" id="header-nav-link" href="sellerhomepage.php">Sell</a></li>
                        <?php else: ?> <!-- Open the seller sign in modal if there no active session -->
                            <li class="nav-item"><a class="nav-link" id="header-nav-link" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sell</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link" id="header-nav-link" href="">Buy</a></li>
                        <li class="nav-item"><a class="nav-link" id="header-nav-link" href="homepage.php#about">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" id="header-nav-link" href="homepage.php#faq">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" id="header-nav-link" href="homepage.php#contact">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" id="header-nav-link" href="signuppage.php">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link" id="header-nav-link" aria-current="page" href="signinpage.php">Sign In</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>