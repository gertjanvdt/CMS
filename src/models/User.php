<?php

namespace models;

class User
{
    public $User_Id;
    public $First_Name;
    public $Last_Name;
    public $Email;
    public $Password;

    public function __construct($User_Id, $First_Name, $Last_Name, $Email, $Password)
    {
        $this->User_Id = $User_Id;
        $this->First_Name = $First_Name;
        $this->Last_Name = $Last_Name;
        $this->Email = $Email;
        $this->Password = $Password;
    }
}
