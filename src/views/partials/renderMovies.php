<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/models/Movie.php";
require "$path/connect.php";

use models\Movie;

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['DOCUMENT_ROOT'];
$key = 0;
$movies = [];

if ($method === 'POST') {
    $id = $_POST['category'];
    $movies = getMovies($movies, $conn, $id);
    $_SESSION['category'] = $id;
} elseif (isset($_SESSION['category'])) {
    $id = $_SESSION['category'];
    $movies = getMovies($movies, $conn, $id);
} else {
    $id = 1;
    $movies = getMovies($movies, $conn, $id);
}

function getMovies($movies, $conn, $category)
{
    $result = $conn->query("SELECT * FROM `movie` WHERE `Category` = $category");

    if ($result) {
        while ($row = $result->fetch_object()) {
            array_push($movies, new Movie($row->Movie_Id, $row->Title, $row->Actors, $row->Descriptions, $row->Image, $row->Rating, $row->Discount, $row->Price));
        }
    }
    return $movies;
}


?>

<div class="movies_container">
    <?php
    // Loop through movies to construct movie container
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
                    <button data-title="<?php echo $movie->id ?>" onclick="addToBasket('models/basket.php','title', <?php echo $movie->id ?> );" type="button" class="amazon_btnPrimary add_to_cart">Add to cart</button>
                </div>
            </div>

            <div class="">
                <img src="<?php echo $movie->image ?>" alt="movie cover image" class="movie_image">
            </div>
        </div>
    <?php } ?>
</div>