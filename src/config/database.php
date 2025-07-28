<?php

$host = "127.0.0.1";
$username = "app_user";
$password = "root";
$dbName = "todo-php";

try {

    $conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
