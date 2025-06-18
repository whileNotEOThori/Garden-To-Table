<?php
require_once('adminfunctions.php');
session_start();

if (isset($_POST['deleteUser'])) {
    $userID = $_POST['userID'];
    $result = $_SESSION['admin']->deleteUser($userID);

    if ($result === true)
        echo "<script> alert('User " . $userID . "'s account has been deleted successfully.') </script>";
    else
        echo "<script> alert('User " . $userID . "'s account has could not be deleted.') </script>";

    echo "<script>
    window.location.href = 'adminhomepage.php';
    </script>";
    exit;
}

if (isset($_POST['addCategory'])) {
    $categoryName = $_POST['categoryName'];
    $result = $_SESSION['admin']->addCategory($categoryName);

    if ($result === true)
        echo "<script> alert('" . $categoryName . " has been added successfully as a category.') </script>";
    else
        echo "<script> alert('" . $categoryName . " could not be added as a category.') </script>";

    echo "<script>
    window.location.href = 'adminhomepage.php';
    </script>";
    exit;
}

if (isset($_POST['deleteProduct'])) {
    $productID = $_POST['productID'];
    $result = $_SESSION['admin']->deleteProduct($productID);

    if ($result === true)
        echo "<script> alert('Product " . $productID . " has been deleted successfully.') </script>";
    else
        echo "<script> alert('Product " . $productID . " could not be deleted.') </script>";

    echo "<script>
    window.location.href = 'adminhomepage.php';
    </script>";
    exit;
}

if (isset($_POST['payOut'])) {
    $_SESSION['admin']->payout();

    echo "<script> alert('Unpaid proceeds have been paid out to sellers.')
    window.location.href = 'adminhomepage.php';
    </script>";
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
