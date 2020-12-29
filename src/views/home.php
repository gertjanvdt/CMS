<?php

// Twigg code
require_once 'vendor/autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


$loader = new Filesystemloader('templates');
$twig = new Environment($loader);

$page = (object) ['title' => 'hello'];
//echo $twig->render('index.html.twig', ['page' => $page]);

// CMS normal code
$moviesItems  = json_decode(file_get_contents("./movies.json"));
$movies = [];
$key = 0; 

class Movie {
    public $title;
    public $actors;
    public $description;
    public $image;
    public $rating;
    public $discount;
    public $price;

    public function __construct($title, $actors, $description, $image, $rating, $discount, $price) {
        $this->title = $title;
        $this->actors = $actors;
        $this->description = $description;
        $this->image = $image;
        $this->rating = $rating;
        $this->discount = $discount;
        $this->price = $price;
    }
}

foreach($moviesItems as $item) {
    $movie = new Movie($item->title, $item->actors, $item->description, $item->image, $item->rating, $item->discount, $item->price);
    array_push($movies, $movie);
};

function calculateDiscount($price) {
    return $price * 0.9;
};

echo "dit is home.php"
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gertjan Adwise CMS</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400&display=swap');
    </style>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
    <div>
        <img id="header_logo" class="header_image" src="http://pngimg.com/uploads/amazon/amazon_PNG25.png">
    </div>

    <div>
        <img src="images/shopping-cart.svg" alt="shopping cart" id="shopping_cart" class="header_image">
    </div>
    
    </header>

    <main>
        <img src="images/movie_collection.jpg" alt="background" class="background">
        <div class="container">
        <h1 id="page_title">Christmas movies!</h1>
            
            <?php // Loop through movies to construct movie container
                foreach($movies as $movie) { $key++ ?>
                <div 
                    class="movie_container" 
                    <?php // Set left and right alignment on page
                        if ($key % 2 == 0) {
                            $id = "left";
                        } else {
                            $id ="right";
                        };
                    ?>
                    id="<?php echo $id ?>"
                >
                    <div class="movie_info">
                        <h2><?php echo $key; echo ". "; echo $movie->title?></h2>
                        <p id="actors"><?php echo $movie->actors?></p>
                        <p id="description"><?php echo $movie->description?></p>
                        <p id="rating">
                            <?php 
                            // Loop through rating to convert to stars
                            for ($i = 0; $i < $movie->rating; $i++ ) {
                                echo "&#11088 ";
                            };
                            ?>
                        </p>
                        <div>
                            <!-- price info -->
                            <?php
                                if ($movie->discount == true) {
                                    $newPrice = calculateDiscount($movie->price);             
                            ?>      
                                <p>From: $<?php echo $movie->price ?></p>
                                <p>For: $<?php echo $newPrice?></p>
                            <?php } else { ?>
                                <p>Price: $<?php echo $movie->price ?></p>
                            <?php } ?>
                        </div>
                        <div>
                            <!-- Buttons -->
                            <button type="button">More info</button>
                            <button type="button" id="add_to_cart">Add to cart</button>
                        </div>

                    </div>
                    <div class="movie_image">
                        <img src="<?php echo $movie->image?>" alt="movie cover image" id="movie_image">
                    </div>    
                </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>