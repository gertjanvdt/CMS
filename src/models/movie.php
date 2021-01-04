<?php 
namespace models;

class Movie {
    public $title;
    public $actors;
    public $description;
    public $image;
    public $rating;
    public $discount;
    public $price;

    public function __construct($title, $actors, $description, $image, $rating, $discount, $price) {
        $this->title = $title;
        $this->actors = $actors;
        $this->description = $description;
        $this->image = $image;
        $this->rating = $rating;
        $this->discount = $discount;
        $this->price = $price;
    }
}

?>