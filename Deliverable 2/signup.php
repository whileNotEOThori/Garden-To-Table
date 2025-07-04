<?php
require_once('functions.php');
session_start();


if (isset($_POST['signUp']) || isset($_POST['createAdmin'])) {
    //retrieve/extract the information entered in the form
    // Sanitize and validate user input
    $firstName = filter_var(trim($_POST['firstName']), FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_var(trim($_POST['lastName']), FILTER_SANITIZE_SPECIAL_CHARS);
    $phoneNumber = filter_var(trim($_POST['phoneNum']), FILTER_SANITIZE_SPECIAL_CHARS);
    $emailAddress = filter_var(trim($_POST['emailAddress']), FILTER_SANITIZE_EMAIL);

    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($phoneNumber) || empty($emailAddress)) {
        echo "<script> alert('All fields are required.') 
        window.location.href = 'signuppage.php';
        </script>";
        exit;
    }

    // Validate email format
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Invalid email address.') 
        window.location.href = 'signuppage.php';
        </script>";
        exit;
    }

    // Validate phone number (basic check: digits only, length 7-15)
    if (!preg_match('/^\d{7,15}$/', $phoneNumber)) {
        echo "<script> alert('Invalid phone number. Only digits allowed, length 7-15.') 
        window.location.href = 'signuppage.php';
        </script>";
        exit;
    }

    if (isset($_POST['signUp'])) {
        // Sanitize user input
        $password = trim($_POST['password']);
        $userType = filter_var(trim($_POST['userType']), FILTER_SANITIZE_SPECIAL_CHARS);
        $streetAddress = filter_var(trim($_POST['streetAddress']), FILTER_SANITIZE_SPECIAL_CHARS);
        $postcode = filter_var(trim($_POST['postcode']), FILTER_SANITIZE_SPECIAL_CHARS);

        // Validate required fields
        if (empty($password) || empty($userType) || empty($streetAddress) || empty($postcode)) {
            echo "<script> alert('All fields are required.') 
            window.location.href = 'signuppage.php';
            </script>";
            exit;
        }

        // Validate userType
        $allowedUserTypes = ['buyer', 'seller'];
        if (!in_array($userType, $allowedUserTypes)) {
            echo "<script> alert('Invalid user type selected.') 
            window.location.href = 'signuppage.php';
            </script>";
            exit;
        }

        // Validate postcode (digits only, length 3-10)
        if (!preg_match('/^\d{3,10}$/', $postcode)) {
            echo "<script> alert('Invalid postcode. Only digits allowed, length 3-10.') 
            window.location.href = 'signuppage.php';
            </script>";
            exit;
        }
    } else {
        $userType = "admin";
        $password = $firstName . $lastName . "Adm!nP@ssword";
    }

    if ($userType == "") {
        echo "<script> alert('Select a valid user type.') 
        window.location.href = 'signuppage.php';
        </script>";
        exit;
    }

    // Validate password strength
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&^])[A-Za-z\d@$!%*#?&^]{8,}$/', $password)) {
        echo "<script>
        alert('Password must be at least 8 characters long and include a letter, a number, and a special character.');
        window.location.href = 'signuppage.php';
        </script>";
        exit;
    }

    //encrypt password
    $password = password_hash($password, PASSWORD_BCRYPT);

    // NULL Check
    $emailCheckResult = emailCheck($emailAddress);
    if ($emailCheckResult == null || $emailCheckResult == false) {
        echo "<script> alert('An account is already linked to this email address')  
        window.location.href = 'signuppage.php';
        </script>";
        exit;
    }

    //check if the email address is already linked to an account
    if ($emailCheckResult->num_rows > 0) {
        $userID = $emailCheckResult->fetch_assoc()['uID'];

        if ($userType == "buyer") {
            if (isAlreadyBuyer(($userID))) {
                echo "<script> alert('The entered email is already registered to a buyer account') 
                window.location.href = 'signuppage.php';
        </script>";
                exit;
            }
        }

        if ($userType == "seller") {
            if (isAlreadySeller($userID)) {
                echo "<script> alert('The entered email is already registered to a seller account') 
                window.location.href = 'signuppage.php';
                </script>";
                exit;
            }
        }

        if ($userType == "admin") {
            if (isAlreadyAdmin($userID)) {
                echo "<script> alert('The entered email is already registered to a admin account') 
                window.location.href = 'signuppage.php';
                </script>";
                exit;
            }
        }
    } else {
        //insert the details into the 
        if (!addUserToTable($firstName, $lastName, $phoneNumber, $emailAddress, $password)) {
            echo "<script> alert('The user details could not be added into the user table') 
            window.location.href = 'signuppage.php';
            </script>";
            exit;
        }
    }

    $userRow = getUserData($emailAddress);
    if ($userRow == null || $userRow == false) {
        echo "<script> alert('The user data could not be retrieved.') 
        window.location.href = 'signuppage.php';
        </script>";
        exit;
    }

    $userID = $userRow['uID'];

    if ($userType == "buyer") {
        if (!addBuyerToTable($userID, $streetAddress, $postcode)) {
            echo "<script> alert('The buyer details could not be added into the user table') </script>";
            exit();
        }

        $buyerRow = getBuyerData($userID);
        if ($buyerRow == null || $buyerRow == false) {
            echo "<script> alert('The seller data could not be retrieved.') </script>";
            exit;
        }

        // remove all session variables on sign up
        session_unset();

        // Instantiate a buyer
        $_SESSION['buyer'] = new buyer($userRow, $buyerRow);
        $_SESSION['cart'] = array();
    }

    if ($userType == "seller") {
        if (!addSellerToTable($userID, $streetAddress, $postcode)) {
            echo "<script> alert('The seller details could not be added into the user table') 
            window.location.href = 'signuppage.php';
        </script>";
            exit;
        }

        $sellerRow = getSellerData($userID);
        if ($sellerRow == null || $sellerRow == false) {
            echo "<script> alert('The seller data could not be retrieved.') 
            window.location.href = 'signuppage.php';
        </script>";
            exit;
        }

        // remove all session variables on sign up
        session_unset();

        // Instantiate a seller
        $_SESSION['seller'] = new seller($userRow, $sellerRow);
    }

    if ($userType == "admin") {
        if (!addAdminToTable($userID)) {
            echo "<script> alert('The admin details could not be added into the user table') 
            window.location.href = 'signuppage.php';
        </script>";
            exit;
        }

        $adminRow = getAdminData($userID);
        if ($adminRow == null || $adminRow == false) {
            echo "<script> alert('The admin data could not be retrieved.') 
            window.location.href = 'signuppage.php';
        </script>";
            exit;
        }
    }

    // echo "<script> alert('Account created successfully') </script>";

    if ($userType == "seller") {
        echo "<script> alert('Seller account created successfully. Welcome to Garden To Table, " . $firstName . " " . $lastName . "')
        window.location.href = 'sellerhomepage.php';
        </script>";
        exit;
    }

    if ($userType == "buyer") {
        echo "<script> alert('Buyer account created successfully. Welcome to Garden To Table, " . $firstName . " " . $lastName . "')
        window.location.href = 'buyerhomepage.php';
        </script>";
        exit;
    }

    if ($userType == "admin") {
        echo "<script> alert('Admin account for " . $firstName . " " . $lastName . " has been created successfully.')
        window.location.href = '" . $_SERVER["HTTP_REFERER"] . "';
        </script>";
        exit;
    }

    $conn->close();
}
