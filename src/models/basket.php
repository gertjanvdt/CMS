<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/connect.php";
require 'BasketItem.php';

use models\BasketItem;

$method = $_SERVER['REQUEST_METHOD'];
$basket = [];

$sessionId = $_COOKIE['PHPSESSID'];

// Set movieId when request comes in.
if (isset($_POST['title'])) {
    $movieId = $_POST['title'];
}

if ($method === "POST" && $movieId != 'delete') {
    $movie = getMovieInfo($conn, $movieId);
    if (userLoggedIn()) {
        $userId = $_COOKIE['loggedin'];
        $sql = "INSERT INTO `basket` (`Item_Id`, `Image`, `Title`, `Price`, `Discount`, `Amount`, `User_Id`, `Movie_Id`, `Session_Id`) VALUES (NULL, '$movie->image', '$movie->title', '$movie->price', '0', '1', $userId , $movieId, '$sessionId' );";
        echo 'insert to basket while logged in';
    } else {
        $sql = "INSERT INTO `basket` (`Item_Id`, `Image`, `Title`, `Price`, `Discount`, `Amount`, `User_Id`, `Movie_Id`, `Session_Id`) VALUES (NULL, '$movie->image', '$movie->title', $movie->price, '0', '1', 0, $movieId, '$sessionId' );";
        echo 'insert to basket NOT logged in' . $sessionId;
    }

    insertMoviesSQL($conn, $sql);
}



// Response to GET when cart page is loaded to put in basket on the basket page
if ($method === "GET") {
    // Get items in basket based on sessionid or userid
    if (userLoggedIn()) {
        $userId = $_COOKIE['loggedin'];
        $result = $conn->query("SELECT * FROM `basket` WHERE `basket`.`User_Id` = $userId OR `basket`.`Session_Id` = '$sessionId'");
    } else {
        $result = $conn->query("SELECT * FROM `basket` WHERE `basket`.`Session_Id` = '$sessionId'");
    }
    // Put response from db basketitems in basket array
    if ($result) {
        while ($row = $result->fetch_object()) {
            array_push($basket, new BasketItem($row->Title, $row->Image, $row->Price));
        }
        //var_dump($basket);
    }
};

// Write code for delete button


// ---- FUNCTIONS ------

// Function to get movie info from db that has to be added to the basket table in db
function getMovieInfo($conn, $movieId)
{
    $result = $conn->query("SELECT * FROM movies WHERE Movie_Id = $movieId");
    if ($result) {
        while ($row = $result->fetch_object()) {
            return new BasketItem($row->Title, $row->Image, $row->Price);
        }
    }
}

// Function to check if user is logged in when addin to basket
function userLoggedIn()
{
    if (isset($_COOKIE['loggedin'])) {
        return true;
    }
};

// Function to insert selected movie into basket in db
function insertMoviesSQL($conn, $sql)
{
    if (mysqli_query($conn, $sql)) {
        echo "Records inserted successfully.";
    } else {
        echo "ERROR: Unable to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
}




// if (isset($_COOKIE['data'])) {
//     $basket = json_decode($_COOKIE['data']);
// } else {
//     //  echo 'there is no coockie';
//     $basket = array();
// }

// If add to cart button is pushed JS will send POST request


// function cookieBasket()
// {
//     if ($_POST['title'] == 'delete') {
//         echo 'delete';
//         setcookie("data", "", time() - 3600);
//     } else {
//         $moviesItems  = json_decode(file_get_contents("../movies.json"));
//         foreach ($moviesItems as $movie) {
//             if ($movie->title == $_POST['title']) {
//                 array_push($basket, $movie);
//                 setcookie("data", json_encode($basket), "/");
//                 var_dump($basket);
//             }
//         }
//     }
// }
