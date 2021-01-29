<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/connect.php";
require 'BasketItem.php';

use models\BasketItem;

$method = $_SERVER['REQUEST_METHOD'];
$basket = [];

$sessionId = $_COOKIE['PHPSESSID'];

// Set movieId or deleteId when request comes in.
if (isset($_POST['title'])) {
    $movieId = $_POST['title'];
} elseif (isset($_POST['delete'])) {
    $deleteId = $_POST['delete'];
}

if ($method === "POST" && isset($movieId)) {
    $movie = getMovieInfo($conn, $movieId);
    if (userLoggedIn()) {
        $userId = $_COOKIE['loggedin'];
        $sql = "INSERT INTO `basket` (`Item_Id`, `Image`, `Title`, `Price`, `Discount`, `Amount`, `User_Id`, `Movie_Id`, `Session_Id`) VALUES (NULL, '$movie->image', '$movie->title', '$movie->price', '0', '1', $userId , $movieId, '$sessionId' );";
        echo 'insert to basket while logged in';
    } else {
        $sql = "INSERT INTO `basket` (`Item_Id`, `Image`, `Title`, `Price`, `Discount`, `Amount`, `User_Id`, `Movie_Id`, `Session_Id`) VALUES (NULL, '$movie->image', '$movie->title', $movie->price, '0', '1', 0, $movieId, '$sessionId' );";
        echo 'insert to basket NOT logged in' . $sessionId;
    }
    $action = "Add to";
    sendSQLQuery($action, $conn, $sql);
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
            array_push($basket, new BasketItem($row->Item_Id, $row->Title, $row->Image, $row->Price));
        }
    }
    // Echo to JS get request to set set basket amount in header
    if (isset($_GET['basket'])) {
        echo count($basket);
    }
    //var_dump($_GET);
};

// Code for delete button
if ($method === "POST" && isset($deleteId)) {
    $action = "Delete from";
    $sql = "DELETE FROM `basket` WHERE `basket`.`Item_Id` = $deleteId";
    sendSQLQuery($action, $conn, $sql);
}


// ---- FUNCTIONS ------

// Function to get movie info from db that has to be added to the basket table in db
function getMovieInfo($conn, $movieId)
{
    $result = $conn->query("SELECT * FROM movie WHERE Movie_Id = $movieId");
    if ($result) {
        while ($row = $result->fetch_object()) {
            return new BasketItem(0, $row->Title, $row->Image, $row->Price);
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
function sendSQLQuery($action, $conn, $sql)
{
    if (mysqli_query($conn, $sql)) {
        echo "$action succesfully done to db";
    } else {
        echo "ERROR: Unable to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

// Display subtotal in cart page
function setSubtotal($basket)
{
    $subtotal = 0;
    foreach ($basket as $item) {
        $subtotal += $item->price;
    }
    return $subtotal;
}
