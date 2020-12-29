<?php

$request = $_SERVER['REQUEST_URI'];

// $request = '/about';

echo $request;
echo "dit is index.php";

if ($request == '/') {    
    echo "dit is de router /";
    require __DIR__ . '/views/home.php';
} elseif ($request == '') {
    echo "dit is de router '' ";
    require __DIR__ . '/views/home.php';
} elseif ($request == '/about') {   
     require __DIR__ . '/views/about.php'; 
} elseif ($request == '/test') { 
    echo " dit is router test";  
    require __DIR__ . '/views/test.php';  
} else {    http_response_code(404);  
    echo "dit is de router 404";  
    require __DIR__ . '/views/404.php';}
?>