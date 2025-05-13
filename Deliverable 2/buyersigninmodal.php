<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="modal fade" id="buyerSignInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="buyerSignInModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="buyerSignInModalLabel">Buyer Sign In</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Sign In Form -->
                    <form id="buyerSignInForm" action="signin.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- Email Address Input Div -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="name@example.com" required />
                                <label for="emailAddress">Email address</label>
                            </div>

                            <!-- Password Input Div -->
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <?php $_SESSION['userType'] = "buyer"; ?>

                        <!-- Sign In Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="buyerSignIn" value="buyerSignIn" class="btn btn-primary">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>