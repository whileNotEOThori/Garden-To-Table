<?php
session_start();

if (isset($_POST['signOut'])) {
    // remove all session variables and destroy session
    if (session_unset() && session_destroy()) {
        header("location: homepage.php");
        exit;
    }
}
