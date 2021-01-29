<?php
require "$path/models/User.php";
$method = $_SERVER['REQUEST_METHOD'];
$users = [];

use models\User;

// Check if user is already logged in. If not logged in run validation
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
    if ($method === 'POST') {
        $user = getUserInfo($dbh, $_POST['email']);
        userLogin($user);
    } else {
        require 'partials/userLogin.php';
    }
} else {
    require 'partials/userLoggedIn.php';
}

// ----- FUNTIONS -----

//  NEW Function to get user login info safely
function getUserInfo($dbh, $email)
{
    $sql = "SELECT * FROM users WHERE Email = :email";
    $sth = $dbh->prepare($sql);
    $sth->execute([':email' => $email]);

    foreach ($sth->fetchAll() as $row) {
        // echo "<pre>";
        // var_dump($row);
        $user = new User($row['User_Id'], $row['First_Name'], $row['Last_Name'], $row['Email'], $row['Password']);
    }

    if (isset($user)) {
        return $user;
    }
}

// Function to check if incoming request is a POST and compare submitted email and password match result from DB
function userLogin($user)
{
    //echo json_encode($users);
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $warning = "Please enter email and password";
        require 'partials/userLogin.php';
    } elseif (validateUser($user, $_POST['password'], $user->Password)) {
        require 'partials/userLoggedIn.php';
    } else {
        $warning = "Email or password is incorrect";
        require 'partials/userLogin.php';
    }
}

// Function to validate password and set as loggedin
function validateUser($user, $password, $hash)
{
    if (password_verify($password, $hash)) {
        setUserInfo($user);
        $_SESSION['loggedin'] = true;
        setcookie("loggedin", $user->User_Id, "/");
        return true;
    } else {
        $_SESSION['loggedin'] = false;
        return false;
    }
}

function setUserInfo($user)
{
    $_SESSION['firstname'] = $user->First_Name;
    $_SESSION['lastname'] = $user->Last_Name;
    $_SESSION['userid'] = $user->User_Id;
}
