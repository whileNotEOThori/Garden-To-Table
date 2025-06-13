<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <!-- Redirect the seller to the sellerhomepage if they already have an active session -->
            <?php if (!empty($_SESSION['seller'])): ?>
                <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="sellerhomepage.php">Sell</a></li>
            <?php else: ?> <!-- Open the seller sign in modal if there no active session -->
                <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="" data-bs-toggle="modal" data-bs-target="#sellerSignInModal">Sell</a></li>
            <?php endif; ?>

            <!-- Redirect the buyer to the buyerhomepage if they already have an active session -->
            <?php if (!empty($_SESSION['buyer'])): ?>
                <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="buyerhomepage.php">Buy</a></li>
            <?php else: ?> <!-- Open the seller sign in modal if there no active session -->
                <li class="nav-item"><a class="nav-link px-2 text-body-secondary" href="" data-bs-toggle="modal" data-bs-target="#buyerSignInModal">Buy</a></li>
            <?php endif; ?>

            <li class="nav-item"><a href="index.php#about" class="nav-link px-2 text-body-secondary">About Us</a></li>
            <li class="nav-item"><a href="index.php#faq" class="nav-link px-2 text-body-secondary">FAQ</a></li>
            <li class="nav-item"><a href="index.php#contact" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
            <li class="nav-item"><a href="signuppage.php" class="nav-link px-2 text-body-secondary">Sign Up</a></li>
            <li class="nav-item"><a href="signinpage.php" class="nav-link px-2 text-body-secondary">Sign In</a></li>
        </ul>
        <p class="text-center text-body-secondary"><img src="images/GTT Logo.jpg" alt="Logo" height="50px" /> Garden To Table ©. All rights reserved.</p>
    </footer>
</body>

</html>