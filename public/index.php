<?php

$url = explode('/', $_GET['url']) ?? "home";
$url_header = $url[0];

$pages = [
    'home' => 'home.php',
    'register' => 'auth/register.php'
];

$page = 'errors/404.php';

foreach ($pages as $name => $path) {
    if ($name === $url_header)
        $page = $path;
}

require __DIR__  . "/pages/$page";