<?php
require_once('sellerfunctions.php');
require_once('buyerfunctions.php');
session_start();

// if (isset($_SESSION['buyer'])) $tableName = "buyer";
// if (isset($_SESSION['seller'])) $tableName = "seller";
// if (isset($_SESSION['buyer'])) $tableName = "buyer";

if (isset($_POST['editFirstName'])) {
    if (isset($_SESSION['buyer'])) $_SESSION['buyer']->editFirstName($_POST['firstNameEdit']);
    // if (isset($_SESSION['seller'])) $tableName = "seller";

    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
}
