<?php 
session_start();

if (isset($_POST['signOut']))
{
    if (session_destroy())
    {
        header("location: homepage.php"); 
        exit; 
    }
}
?>