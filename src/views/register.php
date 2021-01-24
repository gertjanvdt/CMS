<?php
require './models/NewUser.php';

use models\NewUser;

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $newUser = new NewUser($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['confirm']);
    var_dump($newUser);
}

function checkIfEmpty($newUser)
{
    foreach ($newUser as $item) {
        if (empty($item)) {
            return true;
        } else {
            return false;
        }
    }
}

function checkPassword($password, $confirm)
{
    if ($password === $confirm) {
        return true;
    } else {
        return false;
    }
}

?>


<main class="register_container">
    <div class="registerForm_container">
        <h2>Create New Account</h2>
        <form method="POST">
            <h5>First name:</h5> <input type="text" value="" id="fname" name="fname">
            <h5>Last name:</h5> <input type="text" value="" id="lname" name="lname">
            <h5>Email:</h5> <input type="text" value="" id="email" name="email">
            <h5>Password:</h5> <input type="password" value="" id="password" name="password">
            <h5>Confirm Password:</h5> <input type="password" value="" id="confirm" name="confirm">
            <button type="submit" class="amazon_btnPrimary signin_btn">Create Account</button>
        </form>
    </div>
</main>