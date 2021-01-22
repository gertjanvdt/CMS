<?php

$method = $_SERVER['REQUEST_METHOD'];
$info = $_POST;


if (isset($_COOKIE['data'])) {
    $basket = json_decode($_COOKIE['data']);
} else {
    //  echo 'there is no coockie';
    $basket = array();
}

if ($method === "POST") {

    if ($_POST['title'] == 'delete') {
        echo 'delete';
        setcookie("data", "", time() - 3600);
    } else {
        $moviesItems  = json_decode(file_get_contents("../movies.json"));
        foreach ($moviesItems as $movie) {
            if ($movie->title == $_POST['title']) {
                array_push($basket, $movie);
                setcookie("data", json_encode($basket), "/");
                var_dump($basket);
            }
        }
    }
}

// Waarom pakt php het cookie niet op bij load/get?

if ($method === "GET") {
    if (isset($_COOKIE['data'])) {
        echo json_encode($basket);
    } else {
        //echo 'there is no cookie';
    }
};
