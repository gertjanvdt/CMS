<?php
namespace models;

class BasketItem {
    public $title;
    public $image;
    public $price;

    public function __construct($title, $image, $price) {
        $this->title = $title;
        $this->image = $image;
        $this->price = $price;
    }
}

$basket = [];
?>