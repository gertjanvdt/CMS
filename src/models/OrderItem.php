<?php

namespace models;

class OrderItem
{
    public $date;
    public $userId;
    public $movieId;


    public function __construct($date, $userId, $movieId)
    {
        $this->date = $date;
        $this->userId = $userId;
        $this->movieId = $movieId;
    }
}
