<?php

$host = "127.0.0.1";
$dbUsername = "app_user";
$dbPassword = "root";
$dbName = "todo-php";

try {

    $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
