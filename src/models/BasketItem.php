<?php

namespace models;

class BasketItem
{
    public $id;
    public $title;
    public $image;
    public $price;
    public $movie_id;

    public function __construct($id, $title, $image, $price, $movie_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->price = $price;
        $this->movie_id = $movie_id;
    }
}
