<?php
// Require Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

//get .env variables
$dbHost = $_ENV['DB_HOST'];
$dbUser = $_ENV['DB_USER'];
$dbPassword = $_ENV['DB_PASS'];
$dbName = $_ENV['DB_NAME'];

// create database connection
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check database connection
if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);

?>
