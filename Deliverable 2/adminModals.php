<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Create Admin Modal -->
    <div class="modal fade" id="createAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="createAdminModalLabel">Create Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Create Admin Form -->
                    <form action="signup.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- First Name Input Div -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required />
                                <label for="firstName">First Name</label>
                            </div>

                            <!-- Last Name Input Div -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required />
                                <label for="lastName">Last Name</label>
                            </div>

                            <!-- Phone Number Input Div -->
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="phoneNum" name="phoneNum" placeholder="Phone Number" required />
                                <label for="phoneNum">Phone Number</label>
                            </div>

                            <!-- Email Address Input Div -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="name@example.com" required />
                                <label for="emailAddress">Email address</label>
                            </div>
                        </div>

                        <!-- Create Admin Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="createAdmin" value="createAdmin" class="btn btn-primary">Create Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div class="modal fade" id="deleteUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="deleteUserModalLabel">Delete User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Delete Form -->
                    <form action="adminmanagement.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- User ID Input Div -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="userID" name="userID" placeholder="User ID" required />
                                <label for="userID">User ID</label>
                            </div>
                        </div>

                        <!-- Delete User Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="deleteUser" value="deleteUser" class="btn btn-danger">Delete User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="addCategoryModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add Category Form -->
                    <form action="adminmanagement.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- Category Name Input Div -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Category Name" required />
                                <label for="categoryName">Category Name</label>
                            </div>
                        </div>

                        <!-- Create Admin Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="addCategory" value="addCategory" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Product Modal -->
    <div class="modal fade" id="deleteProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="deleteProductModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Delete Form -->
                    <form action="adminManagement.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- User ID Input Div -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="productID" name="productID" placeholder="Product ID" required />
                                <label for="productID">Product ID</label>
                            </div>
                        </div>

                        <!-- Delete User Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="deleteProduct" value="deleteProduct" class="btn btn-danger">Delete Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>