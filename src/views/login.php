<?php
require "$path/models/User.php";
$method = $_SERVER['REQUEST_METHOD'];
$users = [];
$result = $conn->query("SELECT * FROM users");

use models\User;

// Get users from DB
if ($result) {
    while ($row = $result->fetch_object()) {
        array_push($users, new User($row->First_Name, $row->Last_Name, $row->Email, $row->Password));
    }
}


// Check if user is already logged in. If not logged in run validation
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
    if ($method === 'POST') {
        userLogin($users);
    } else {
        require 'partials/userLogin.php';
    }
} else {
    require 'partials/userLoggedIn.php';
}

// Function to check if incoming request is a POST and compare submitted email and password match result from DB
function userLogin($users)
{
    //echo json_encode($users);
    if (isEmpty($_POST['email']) || isEmpty($_POST['password'])) {
        $warning = "Please enter email and password";
        require 'partials/userLogin.php';
    } elseif (validateUser($users, $_POST['email'], $_POST['password'])) {
        require 'partials/userLoggedIn.php';
    } else {
        $warning = "Email or password is incorrect";
        require 'partials/userLogin.php';
    }
}


function validateUser($users, $email, $password)

{
    foreach ($users as $user) {
        if ($user->Email === $email && $user->Password === $password) {
            setUserInfo($user);
            $_SESSION['loggedin'] = true;
            echo 'loggedin';
            return true;
        }
    }
    $_SESSION['loggedin'] = false;
    return false;
}

function setUserInfo($user)
{
    $_SESSION['firstname'] = $user->First_Name;
    $_SESSION['lastname'] = $user->Last_Name;
}


function isEmpty($text)
{
    return $text == '';
}
