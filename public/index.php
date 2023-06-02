<?php
$path = $_SERVER["PATH_INFO"] ?? null;

if ($path)
    switch ($path) {
        case '/login':
            require './views/members/login.php';
            break;
        default:
            echo "404";
            break;
    }
else
    echo "Test";
