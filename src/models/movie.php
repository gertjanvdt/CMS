<?php 
namespace models;

class Movie {
    public $id;
    public $title;
    public $actors;
    public $description;
    public $image;
    public $rating;
    public $discount;
    public $price;

    public function __construct($id, $title, $actors, $description, $image, $rating, $discount, $price) {
        $this->id = $id;
        $this->title = $title;
        $this->actors = $actors;
        $this->description = $description;
        $this->image = $image;
        $this->rating = $rating;
        $this->discount = $discount;
        $this->price = $price;
    }
}
