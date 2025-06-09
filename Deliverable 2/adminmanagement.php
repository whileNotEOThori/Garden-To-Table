<?php
require_once('adminfunctions.php');
session_start();

if (isset($_POST['deleteUser'])) {
    $userID = $_POST['userID'];

    $_SESSION['admin']->deleteUser($userID);

    header("location: adminhomepage.php");
    exit;
}

if (isset($_POST['addCategory'])) {
    $categoryName = $_POST['categoryName'];

    $_SESSION['admin']->addCategory($categoryName);

    header("location: adminhomepage.php");
    exit;
}

if (isset($_POST['deleteProduct'])) {
    $productID = $_POST['productID'];

    $_SESSION['admin']->deleteProduct($productID);

    header("location: adminhomepage.php");
    exit;
}

if (isset($_POST['payOut'])) {
    $_SESSION['admin']->payout();

    header("location: adminhomepage.php");
    exit;
}

if (isset($_POST['markAsReadButton'])) {
    $messageID = $_POST['markAsReadButton'];
    $_SESSION['admin']->markMessageAsRead($messageID);
    header("location: adminmessages.php");
    exit;
}

if (isset($_POST['markAsUnreadButton'])) {
    $messageID = $_POST['markAsUnreadButton'];
    $_SESSION['admin']->markMessageAsUnread($messageID);
    header("location: adminmessages.php");
    exit;
}
