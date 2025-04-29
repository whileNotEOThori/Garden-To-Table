<?php
include('connect.php');

if (isset($_POST['signUp']))
{
    //retrieve/extract the information entered in the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNum'];
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $streetAddress = $_POST['streetAddress'];
    $postcode = $_POST['postcode'];

    if ($userType != "buyer" && $userType != "seller")
    {
        // send a bootstrap alert that the user type is invalid
        echo "<script> alert('Select a valid user type.') </script>";
        exit();
    }

    //encrypt password
    $password = password_hash($password,PASSWORD_BCRYPT);

    //set table name
    $tableName = "users";

    // get all the columns with the entered email address
    $emailCheckQuery = $conn->prepare("SELECT * FROM $tableName WHERE emailAddress = ?");

    if (!$emailCheckQuery)
        die("Email check query prepare failed: " . $conn->error);

    $emailCheckQuery->bind_param("s",$emailAddress);

    if (!$emailCheckQuery->execute())
        die("Email check query execution failed: " . $emailCheckQuery->error);

    $emailCheckQueryResult = $emailCheckQuery->get_result();

    //check if the email address is already linked to an account
    if ($emailCheckQueryResult->num_rows > 0)
    {
        $userID = $emailCheckQueryResult->fetch_assoc()['uID'];

        if ($userType == "buyer")
        {
            $tableName = "buyers";

            $buyerCheckQuery = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

            if (!$buyerCheckQuery)
                die("Buyer check query prepare failed: ".$conn->error);

            $buyerCheckQuery->bind_param("s", $userID);

            if(!$buyerCheckQuery->execute())
                die("Buyer check query execution failed: " . $buyerCheckQuery->error);

            if ($buyerCheckQuery->get_result()->num_rows > 0)
            {
                // send a bootstrap alert that the email address already exists
                echo "<script> alert('The entered email is already registered to an account') </script>";
                exit();
            }

            $buyerCheckQuery->close();
        }
        else //if ($userType == "seller")
        {
            $tableName = "sellers";

            $sellerCheckQuery = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

            if (!$sellerCheckQuery)
                die("Seller check query prepare failed: ".$conn->error);

            $sellerCheckQuery->bind_param("s", $userID);

            if(!$sellerCheckQuery->execute())
                die("Seller check query execution failed: " . $sellerCheckQuery->error);

            if ($sellerCheckQuery->get_result()->num_rows > 0)
            {
                // send a bootstrap alert that the email address already exists
                echo "<script> alert('The entered email is already registered to an account') </script>";
                exit();
            }

            $sellerCheckQuery->close();
        }
    }
    $emailCheckQuery->close();

    $tableName = "users";

    //insert the details into the 
    $signUpQuery = $conn->prepare("INSERT INTO $tableName (firstName, lastName, phoneNumber, emailAddress, password) VALUES (?,?,?,?,?)");
    
    // Check for SQL errors
    if (!$signUpQuery)
        die("Signup query prepare failed: " . $conn->error);

    $signUpQuery->bind_param("sssss", $firstName, $lastName, $phoneNumber, $emailAddress, $password);

    if (!$signUpQuery->execute())
        die("Signup query execution failed: " . $signUpQuery->error);

    $signUpQuery->close();

    //add the user to either the buyer or sell table
    $userIDQuery = $conn->prepare("SELECT uID as userID FROM $tableName WHERE emailAddress = ?");

    if (!$userIDQuery)
        die("userID query prepare failed: " . $conn->error);

    $userIDQuery->bind_param("s",$emailAddress);
    

    if (!$userIDQuery->execute())
        die("userID query execution failed: " . $userIDQuery->error);

    $userID = $userIDQuery->get_result()->fetch_assoc()['userID'];

    $userIDQuery->close();

    if ($userType == "buyer")
    {
        $tableName = "buyers";

        $buyerSignUpQuery = $conn->prepare("INSERT INTO $tableName (uID, streetAddress, postcode) VALUES (?,?,?)");

        // Check for SQL errors
        if (!$buyerSignUpQuery)
            die("Buyer signup query prepare failed: " . $conn->error);

        $buyerSignUpQuery->bind_param("sss", $userID, $streetAddress, $postcode);

        if (!$buyerSignUpQuery->execute())
            die("Buyer sign up query execution failed: " . $buyerSignUpQuery->error);

        $buyerSignUpQuery->close();
    }
    else
    {
        $tableName = "sellers";

        $sellerSignUpQuery = $conn->prepare("INSERT INTO $tableName (uID, streetAddress, postcode) VALUES (?,?,?)");

        // Check for SQL errors
        if (!$sellerSignUpQuery)
            die("Seller signup query prepare failed: " . $conn->error);

        $sellerSignUpQuery->bind_param("sss", $userID, $streetAddress, $postcode);
        
        if (!$sellerSignUpQuery->execute())
            die("Seller sign up query execution failed: " . $sellerSignUpQuery->error);

        $sellerSignUpQuery->close();
    }

    //send a bootstrap alert that the email address already exists
    echo "<script> alert('Account created successfully') </script>";
    //redirect the user to the specific page
    
    $conn->close();
}
?>