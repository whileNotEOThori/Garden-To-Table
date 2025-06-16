<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garden To Table</title>
</head>

<body>
    <div class="modal fade" id="signOutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="signOutModalLabel">Sign Out</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Sign Out Form -->
                    <form id="sellerSignOutForm" action="signout.php" method="POST">
                        <div class="container" >
                            <!-- Message -->
                            <p>Are you sure you want to sign out?</p>
                            <p>All your progress will be lost.</p>
                        </div>

                        <!-- Sign Out Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="signOut" value="signOut" class="btn btn-primary">Sign Out</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>