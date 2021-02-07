<?php
include './models/basket.php';
$method = $_SERVER['REQUEST_METHOD'];


if (isset($_COOKIE['loggedin'])) {
    $user = $_COOKIE['loggedin'];
    $date = date('y-m-d');
    foreach ($basket as $item) {
        $conn->query("INSERT INTO `orders` (`User_Id`, `Movie_Id`, `Date`) VALUES ('$user', $item->movie_id, '$date');");
    }
}



function emptyBasket($conn, $basket)
{
    foreach ($basket as $item) {
        $movie = $item->id;
        $conn->query("DELETE FROM `basket` WHERE `basket`.`Item_Id` = $movie;");
    }
}

if ($basket) {
    rendorWithBasket($path, $basket);
} else {
    rendorNoBasket();
}

function rendorWithBasket($path, $basket)
{
?>
    <div class="completed_container">
        <h2><span class="loggedin_headerUser">Thank you!</span> Your order is completed</h2>

        <?php
        include "$path/views/partials/basketItems.php";
        ?>
        <script src="../js/completed.js"></script>
    </div>
<?php
}

function rendorNoBasket()
{
?>
    <div class="completed_container">
        <a href="/"><button class="amazon_btnPrimary">Return home to fill my basket</button></a>
        <a href="/login"><button class="amazon_btnSecondary">Login to view my orders</button></a>
    </div>

<?php
}

emptyBasket($conn, $basket);
?>