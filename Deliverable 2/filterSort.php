<?php
require_once('buyerfunctions.php');
session_start();

if (isset($_POST['apply'])) {
    $filter = $_POST['filter'];
    $_SESSION['sortState']  = $_POST['sort'];

    switch ($_SESSION['sortState']) {
        case "price09":
            $orderBy = "ORDER BY price ASC";
            break;
        case "price90":
            $orderBy = "ORDER BY price DESC";
            break;
        case "nameAZ":
            $orderBy = "ORDER BY name ASC";
            break;
        case "nameZA":
            $orderBy = "ORDER BY name DESC";
            break;
        default:
            $_SESSION['sortState'] = "none";
            $orderBy = "none";
            break;
    }

    $_SESSION['filterState'] =  ($filter != "Filter") ? $filter : "none";
    // $_SESSION['sortState'] =  $orderBy;
    $_SESSION['orderState'] =  $orderBy;

    header("location: buypage.php");
}

if (isset($_POST['reset'])) {
    $_SESSION['filterState'] = "none";
    $_SESSION['sortState'] = "none";
    header("location: buypage.php");
}
