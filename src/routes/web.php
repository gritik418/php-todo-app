<?php

    $uri = $_SERVER["REQUEST_URI"];

    switch ($uri){
        case "/":
            require_once __DIR__ . '/../views/home.php';
            break;

            
        case "/profile":
            require_once __DIR__. "/../views/profile.php";
            break;

        case "/login":
            require_once __DIR__. "/../views/login.php";
            break;

        default:
            echo "404 - Page Not Found";
    };


?>