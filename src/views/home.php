<?php

// ---- TWIGG CODE -----
//require_once 'vendor/autoload.php';
// $loader = new Filesystemloader('templates');
// $twig = new Environment($loader);
//$page = (object) ['title' => 'hello'];
//echo $twig->render('index.html.twig', ['page' => $page]);
// use Twig\Environment;
// use Twig\Loader\FilesystemLoader;
// ----- TWIG CODE END -----
$path = $_SERVER['DOCUMENT_ROOT'];
//require "$path/models/Movie.php";
require "$path/connect.php";

//use models\Movie;

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['DOCUMENT_ROOT'];
$key = 0;
$moviesArray = [];

?>

<main class="homepage_container">
    <img src="https://m.media-amazon.com/images/G/01/digital/video/sonata/ROW_NL_TVOD_Hero_Elcano_Multi_Title_Store_Aug_V2/f99aae98-2775-4f85-be54-8a5a4fe6be47._UR3000,600_SX1500_FMwebp_.jpg" alt="background" class="background">
    <?php
    require "$path/views/partials/movieNav.php";
    ?>
    <div class="container">
        <?php require "$path/views/partials/renderMovies.php"; ?>
    </div>
    <script src="../js/home.js"></script>
</main>


<?php
function calculateDiscount($price)
{
    return $price * 0.9;
};

function setDiscountTrue($movies)
{
    foreach ($movies as $item) {
        return $item->discount = true;
    }
}
