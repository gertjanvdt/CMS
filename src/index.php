<?php
$request = $_SERVER['REQUEST_URI'];

if ($request == '/') {    
    require __DIR__ . '/views/home.php';
} elseif ($request == '') {
    require __DIR__ . '/views/home.php';
} elseif ($request == '/about') {   
     require __DIR__ . '/views/about.php';
} else {    http_response_code(404);    
    require __DIR__ . '/views/404.php';}
?>