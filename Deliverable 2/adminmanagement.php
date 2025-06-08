<?php
require_once('adminfunctions.php');
session_start();

if (isset($_POST['deleteUser'])) {
    $userID = $_POST['userID'];

    $_SESSION['admin']->deleteUser($userID);

    header("location: adminhomepage.php");
    exit;
}

if (isset($_POST['createAdmin'])) {
    $categoryName = $_POST['categoryName'];

    $_SESSION['admin']->addCategory($categoryName);

    header("location: adminhomepage.php");
    exit;
}
