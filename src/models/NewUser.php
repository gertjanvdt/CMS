<?php

namespace models;

class NewUser
{
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $confirm;

    public function __construct($firstName, $lastName, $email, $password, $confirm)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->confirm = $confirm;
    }
}
