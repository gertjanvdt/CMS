<?php
session_start();

// Error handling
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("html_errors", 1);

// 
$path = $_SERVER['DOCUMENT_ROOT'];

// Database connection
include 'connect.php';

// Head of page
include 'views/partials/head.php';
?>

<body>
    <?php
    // Header of the page and navbar
    include 'views/partials/header.php';

    // php router
    $request = $_SERVER['REQUEST_URI'];

    if ($request == '/' || $request == '') {
        //include 'views/partials/header.php';
        include 'views/partials/subheader.php';
        require __DIR__ . '/views/home.php';
    } elseif ($request == '/about') {
        // include 'views/partials/header.php';
        require __DIR__ . '/views/about.php';
    } elseif ($request == '/cart') {
        //include 'views/partials/header.php';
        require __DIR__ . '/views/cart.php';
    } elseif ($request == '/login') {
        //include 'views/partials/header.php';
        require __DIR__ . '/views/login.php';
    } elseif ($request == '/logout') {
        //include 'views/partials/header.php';
        require __DIR__ . '/views/logout.php';
    } else {
        http_response_code(404);
        require __DIR__ . '/views/404.php';
    }

    // Footer of the page
    include 'views/partials/footer.php' ?>

</body>

</html>