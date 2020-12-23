<?php

$movies = (object) array(
    "movie_1" => (object) array(
        "title" => "Home Alone",
        "actors" => "Macaulay Culkin, Joe Pesci, Daniel Stern",
        "description" => "It’s more than a little far-fetched to think that any parents would completely forget about their 8-year-old, and even less likely that said 8-year-old could actually take on a pair of burglars, but once you move past the premise, this movie is classic Christmas entertainment.",
        "image" => "images/home_alone.jpeg",
        "rating" => 4,
        "discount" => false,
        "price" => 5.99
    ),
    "movie_2" => (object) array(
        "title" => "Love Actually",
        "actors" => "Hugh Grant, Martine McCutcheon, Liam Neeson",
        "description" => "Take an all-star cast, eight rom-com storylines, and Christmas, and what do you get? An incredible ensemble movie—that Hollywood has since tried (unsuccessfully) to replicate with the truly awful Valentine’s Day and what looks like an even worse New Year’s Eve.",
        "image" => "images/love_actually.jpg",
        "rating"=> 2,
        "discount" => true,
        "price" => 9.99
    ),
    "movie_3" => (object) array(
        "title" => "National Lampoon’s Christmas Vacation",
        "actors" => "Chevy Chase, Beverly D'Angelo, Juliette Lewis ",
        "description" => "Chevy Chase was at his peak as the head of the Griswold household, determined to give his family an old-fashioned Christmas. But despite his best efforts, things start to go awry as soon as his extended family arrives. ",
        "image" => "images/christmas_vacation.jpg",
        "rating"=> 3,
        "discount" => true,
        "price" => 7.50
    ),
    "movie_4" => (object) array(
        "title" => "Elf",
        "actors" => "Will Ferrell, James Caan, Bob Newhart",
        "description" => "If you haven’t seen this yet, don’t let the old-school animation at the beginning of the film put you off—the movie aims to make use of older animated Christmas classics. Whether you watch with your nieces and nephews or your parents, Will Ferrell is endearingly earnest as Buddy, even in the face of the cynical reality of New York City. ",
        "image" => "images/elf.jpg",
        "rating"=> 5,
        "discount" => false,
        "price" => 11.50
    ),
    "movie_5" => (object) array(
        "title" => "A Christmas Story",
        "actors" => "Peter Billingsley, Melinda Dillon, Darren McGavin",
        "description" => "This staple is ranked consistently as one of the best holiday films of all time, and for good reason. The sheer number of memorable scenes and lines—Flick getting his tongue stuck to the flagpole, the boys being triple-dog-dared to do something (and the aghast look on Ralphie’s face as the dares escalate), Ralphie’s cringe-inducing pink bunny pajamas, eating a Christmas dinner of Peking duck (or what Ralphie calls a Chinese turkey), and of course the iconic line, “You’ll shoot your eye out!” ",
        "image" => "images/christmas_story.jpg",
        "rating"=> 2,
        "discount" => true,
        "price" => 12.99
    )
);

function calculateDiscount($price) {
    return $price * 0.9;
};

function numberInBasket($amount) {
    return $amount++;
};

$key = 0; 



//echo '<pre>';
//var_dump($amount);

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
    <!-- <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
    <img id="header_logo" class="header_image" src="http://pngimg.com/uploads/amazon/amazon_PNG25.png">

    <div>
    <img src="images/shopping-cart.svg" alt="shopping cart" id="shopping_cart" class="header_image">
    <p>1</p>
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