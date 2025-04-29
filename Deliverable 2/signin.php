<?php
include('connect.php');

if (isset($_POST['signIn']))
{
    //retrieve/extract the information entered in the form
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];

    if ($userType != "buyer" && $userType != "seller" && $userType != "admin")
    {
        // send a bootstrap alert that the user type is invalid
        echo "<script> alert('Select a valid user type.') </script>";
        exit();
    }

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
    if ($emailCheckQueryResult->num_rows == 0)
    {
        // send a bootstrap alert that the email address already exists
        echo "<script> alert('The entered email is not registered to an account') </script>";
        exit();
    }

    $userRow = $emailCheckQueryResult->fetch_assoc();
    $userID = $userRow['uID'];

    if ($userType == "buyer")
        $tableName = "buyers";
    else if ($userType == "seller")
        $tableName = "sellers";
    else if ($userType == "admin")
        $tableName = "admins";

    $userTypeQuery = $conn->prepare("SELECT * FROM $tableName WHERE uID = ?");

    if (!$userTypeQuery)
        die("User type Query prepare failed: " . $conn->error);

    $userTypeQuery->bind_param("s",$userID);

    if(!$userTypeQuery->execute())
        die("User type query execution failed: " . $userTypeQuery->error);

    if ($userTypeQuery->get_result()->num_rows == 0)
    {
        // send a bootstrap alert that the email address already exists
        echo "<script> alert('The entered email does not have a $userType account') </script>";
        exit();
    }
    $userTypeQuery->close();

    $encryptedPassword = $userRow['password'];

    if (password_verify($password, $encryptedPassword)) 
        { 
            $firstName = $userRow['firstName'];
            $lastName = $userRow['lastName'];
            echo "<script> alert('Welcome back to Garden To Table $firstName $lastName.') </script>";
            // header("location: welcome.php"); 
            exit; 
        } 
        else 
        { 
            echo "<script> alert('Incorrect password entered.') </script>";

        } 

    $emailCheckQuery->close();
    $conn->close();
}


?>