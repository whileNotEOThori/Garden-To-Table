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

    //encrypt password
    $password = password_hash($password,PASSWORD_BCRYPT);

    //set table name
    $tableName = "users";

    // get all the columns with the entered email address
    $emailCheckQuery = $conn->prepare("SELECT * FROM $tableName WHERE emailAddress = ?");

    if (!$emailCheckQuery)
        die("Email check query prepare failed: " . $conn->error);

    $emailCheckQuery->bind_param("s",$emailAddress);
    $emailCheckQuery->execute();
    $emailCheckQueryResult = $emailCheckQuery->get_result();

    //check if the email address is already linked to an account
    if ($emailCheckQueryResult->num_rows != 0)
    {
        //send a bootstrap alert that the email address already exists
        echo "<script> alert('The entered password is already registered to an account') </script>";
        exit();
    }

    //insert the details into the 
    $signUpQuery = $conn->prepare("INSERT INTO $tableName (firstName, lastName, phoneNumber, emailAddress, password) VALUES (?,?,?,?,?)");
    
    // Check for SQL errors
    if (!$signUpQuery)
        die("Signup query prepare failed: " . $conn->error);

    $signUpQuery->bind_param("sssss", $firstName, $lastName, $phoneNumber, $emailAddress, $password);

    if (!$signUpQuery->execute()) {
        die("Signup query execution failed: " . $signUpQuery->error);
    }

    //send a bootstrap alert that the email address already exists
    echo "<script> alert('Account created successfully') </script>";
    //redirect the user to the specific page
    
    $signUpQuery->close();
    $conn->close();
}
?>