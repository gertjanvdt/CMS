<?php
// Error handling
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("html_errors", 1);


// Head of page
include 'views/partials/head.php';
?>

<body>
    <?php
    // Header of the page and navbar
    include 'views/partials/header.php';

    // php router
    $request = $_SERVER['REQUEST_URI'];

    if ($request == '/') {
        include 'views/partials/subheader.php';
        require __DIR__ . '/views/home.php';
    } elseif ($request == '') {
        include 'views/partials/subheader.php';
        require __DIR__ . '/views/home.php';
    } elseif ($request == '/about') {
        require __DIR__ . '/views/about.php';
    } elseif ($request == '/cart') {
        require __DIR__ . '/views/cart.php';
    } elseif ($request == '/login') {
        require __DIR__ . '/views/login.php';
    } else {
        http_response_code(404);
        require __DIR__ . '/views/404.php';
    }

    // Footer of the page
    include 'views/partials/footer.php' ?>

</body>

</html>