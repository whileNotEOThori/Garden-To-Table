<?php
require_once('buyer.php');
session_start();

if (isset($_POST['editFirstName'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editFirstName($_POST['firstNameEdit']);

    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}

if (isset($_POST['editLastName'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editLastName($_POST['lastNameEdit']);

    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}
