<?php
require_once('connect.php');
session_start();

if (isset($_POST['apply'])) {
    $filter = $_POST['filter'];
    $sort = $_POST['sort'];

    switch ($sort) {
        case 'price09':
            $orderBy = "ORDER BY price ASC";
            break;
        case 'price90':
            $orderBy = "ORDER BY price DESC";
            break;
        case 'nameAZ':
            $orderBy = "ORDER BY name ASC";
            break;
        case 'nameZA':
            $orderBy = "ORDER BY name DESC";
            break;
        default:
            $orderBy = "";
            break;
    }

    // $_SESSION['filterState'] =  ($filter != "Filter") ? $filter : [];
    $_SESSION['filterState'] =  ($filter != "Filter") ? $filter : "none";
    $_SESSION['sortState'] =  $orderBy;

    header("location: buypage.php");
}

if (isset($_POST['reset'])) {
    $_SESSION['filterState'] = "none";
    // $_SESSION['filterState'] = [];
    // $_SESSION['sortState'] = "none";
    header("location: buypage.php");
}
