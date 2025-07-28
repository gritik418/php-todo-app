<?php

// = DATABASE CONFIGURATION

$host = "localhost";            // Change this if your DB is hosted elsewhere
$dbUsername = "your_db_user";   // Change to your actual DB username
$dbPassword = "your_db_pass";   // Change to your actual DB password
$dbName = "your_db_name";       // Change to your actual database name

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Check your Internet Connection. <br/>";
    echo "Connection failed: " . $e->getMessage();
}
