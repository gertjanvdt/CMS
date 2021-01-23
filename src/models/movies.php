<?php
require 'movie.php';

use models\Movie;

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['DOCUMENT_ROOT'];
$key = 0;
$movies = [];
$result = $conn->query("SELECT * FROM movies");

if ($result) {
    while ($row = $result->fetch_object()) {
        array_push($movies, new Movie($row->Movie_Id, $row->Title, $row->Actors, $row->Descriptions, $row->Image, $row->Rating, $row->Discount, $row->Price));
    }
}

if ($method === "POST" && $_POST['title'] == 'discount') {
    setDiscountTrue($movies);
    echo json_encode($movies);
}

// FUNCTIONS
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
