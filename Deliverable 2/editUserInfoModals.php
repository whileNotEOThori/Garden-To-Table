<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Edit First Name Modal -->
    <div class="modal fade" id="editFirstNameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFirstNameModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="editFirstNameModalLabel">Edit First Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Sign In Form -->
                    <form id="editFirstNameForm" action="editUserInfo.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- First Name Input Div -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="firstNameEdit" name="firstNameEdit" placeholder="First Name" required />
                                <label for="firstNameEdit">First Name</label>
                            </div>
                        </div>

                        <!-- Sign In Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="editFirstName" value="editFirstName" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Last Name Modal -->
    <div class="modal fade" id="editLastNameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLastNameModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="editLastNameModalLabel">Edit Last Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Sign In Form -->
                    <form id="editLastNameForm" action="editUserInfo.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- First Name Input Div -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lastNameEdit" name="lastNameEdit" placeholder="Last Name" required />
                                <label for="lastNameEdit">Last Name</label>
                            </div>
                        </div>

                        <!-- Sign In Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="editLastName" value="editLastName" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Phone Number Modal -->
    <div class="modal fade" id="editPhoneNumberModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPhoneNumberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="editPhoneNumberModalLabel">Edit Phone Number</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Sign In Form -->
                    <form id="editPhoneNumberForm" action="editUserInfo.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- First Name Input Div -->
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="phoneNumberEdit" name="phoneNumberEdit" placeholder="Phone Number" required />
                                <label for="phoneNumberEdit">Phone Number</label>
                            </div>
                        </div>

                        <!-- Sign In Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="editPhoneNumber" value="editPhoneNumber" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Postcode Modal -->
    <div class="modal fade" id="editPostcodeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPostcodeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="editPostcodeModalLabel">Edit Postcode</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Sign In Form -->
                    <form id="editPostcodeForm" action="editUserInfo.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- First Name Input Div -->
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="postcodeEdit" name="postcodeEdit" placeholder="Postcode" required />
                                <label for="postcodeEdit">Postcode</label>
                            </div>
                        </div>

                        <!-- Sign In Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="editPostcode" value="editPostcode" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Street Address Modal -->
    <div class="modal fade" id="editStreetAddressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editStreetAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="editStreetAddressModalLabel">Edit Street Address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Sign In Form -->
                    <form id="editStreetAddressForm" action="editUserInfo.php" method="POST">
                        <div class="container" style="width: 450px">
                            <!-- First Name Input Div -->
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="streetAddressEdit" name="streetAddressEdit" placeholder="Street Address" required />
                                <label for="streetAddressEdit">Street Address</label>
                            </div>
                        </div>

                        <!-- Sign In Button -->
                        <div class="container" style="display: flex; justify-content: center">
                            <button type="submit" name="editStreetAddress" value="editStreetAddress" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>