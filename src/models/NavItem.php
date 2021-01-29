<?php

namespace models;

class NavItem
{
    public $id;
    public $name;
    public $numberOfMovies;


    public function __construct($id, $name, $numberOfMovies)
    {
        $this->id = $id;
        $this->name = $name;
        $this->numberOfMovies = $numberOfMovies;
    }
}
