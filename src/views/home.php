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


require 'models/movies.php';

?>

<main class="homepage_container">
    <img src="https://m.media-amazon.com/images/G/01/digital/video/sonata/ROW_NL_TVOD_Hero_Elcano_Multi_Title_Store_Aug_V2/f99aae98-2775-4f85-be54-8a5a4fe6be47._UR3000,600_SX1500_FMwebp_.jpg" alt="background" class="background">

    <div class="container">
        <?php // Loop through movies to construct movie container
        foreach ($movies as $movie) {
            $key++ ?>
            <div class="movie_container" <?php // Set left and right alignment on page
                                            if ($key % 2 == 0) {
                                                $id = "left";
                                            } else {
                                                $id = "right";
                                            };
                                            ?> id="<?php echo $id ?>">
                <div class="movie_info">
                    <div>
                        <h2><?php echo "$key.  $movie->title" ?></h2>
                        <p class="actors"><?php echo $movie->actors ?></p>
                        <p class="description"><?php echo $movie->description ?></p>
                        <p class="rating">
                            <?php
                            // Loop through rating to convert to stars
                            for ($i = 0; $i < $movie->rating; $i++) {
                                echo "&#11088 ";
                            };
                            ?>
                        </p>
                    </div>

                    <div>
                        <!-- price info -->
                        <?php
                        if ($movie->discount == true) {
                            $newPrice = calculateDiscount($movie->price);
                        ?>
                            <p>From: $<?php echo $movie->price ?></p>
                            <p>For: $<?php echo $newPrice ?></p>
                        <?php } else { ?>
                            <p data-title="<?php echo $movie->price ?>">Price: $<?php echo $movie->price ?></p>
                        <?php } ?>
                    </div>

                    <div>
                        <button data-title="<?php echo $movie->title ?>" type="button" class="amazon_btnPrimary add_to_cart">Add to cart</button>
                    </div>
                </div>

                <div class="">
                    <img src="<?php echo $movie->image ?>" alt="movie cover image" class="movie_image">
                </div>
            </div>
        <?php } ?>
    </div>
    <script src="../js/home.js"></script>
</main>