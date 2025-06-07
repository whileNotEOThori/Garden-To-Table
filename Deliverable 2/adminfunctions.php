<?php
require_once('functions.php');

function isAdminSignedIn()
{
    if (empty($_SESSION['admin'])) {
        // echo "<script> alert('You have been signed out. Sign In again.') </script>";
        header("location: homepage.php");
        exit;
    }
}