<?php

namespace models;

class User
{
    public $First_Name;
    public $Last_Name;
    public $Email;
    public $Password;

    public function __construct($First_Name, $Last_Name, $Email, $Password)
    {
        $this->First_Name = $First_Name;
        $this->Last_Name = $Last_Name;
        $this->Email = $Email;
        $this->Password = $Password;
    }
}
