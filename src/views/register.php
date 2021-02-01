<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$method = $_SERVER['REQUEST_METHOD'];
require "$path/connect.php";
require './models/NewUser.php';

use models\NewUser;

// Display page to register of page if registered

if ($method === "GET") {
    if (isset($addUser) && $addUser == true) {
        echo 'user added page';
        require "$path/views/partials/userRegistered.php";
    } else {
        require "$path/views/partials/registerUser.php";
    }
}


if ($method === 'POST') {
    // Store new user in object
    $newUser = new NewUser($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['confirm']);

    // Gather if any warnings apply
    $warnings = [];
    array_push($warnings, checkPassword($newUser->password, $newUser->confirm));
    array_push($warnings, checkIfEmpty($newUser));
    array_push($warnings, checkAlreadyUser($conn, $newUser->email));
    array_push($warnings, checkValidEmail($newUser->email));

    // If any warnings decide if user can be added 
    foreach ($warnings as $warning) {
        if (!empty($warning)) {
            $addUser = false;
            break;
        } else {
            $addUser = true;
        }
    }

    // if no warnings send sql query
    if ($addUser) {
        $hashedPassword = password_hash($newUser->password, PASSWORD_BCRYPT);
        addUserToDb($dbh, $hashedPassword, $newUser);
        require "$path/views/partials/userRegistered.php";
    } else {
        require "$path/views/partials/registerUser.php";
    }
}

// Function to send safe sql query
function addUserToDb($dbh, $hashedPassword, $newUser)
{
    $data = [
        'firstName' => $newUser->firstName,
        'lastName' => $newUser->lastName,
        'email' => $newUser->email,
    ];
    $sql = "INSERT INTO `users` (`User_Id`, `First_Name`, `Last_Name`, `Email`, `Password`) VALUES (NULL, :firstName, :lastName, :email, '$hashedPassword');";
    $sth = $dbh->prepare($sql);
    $sth->execute($data);
}

// Function to check if all fields are filled in
function checkIfEmpty($newUser)
{
    foreach ($newUser as $item) {
        if (empty($item)) {
            return 'Please fill in all fields';
        }
    }
}

// Function to check if password and confirm password match
function checkPassword($password, $confirm)
{
    if ($password != $confirm) {
        return 'Passwords do not match';
    } elseif (strlen($password) < 8) {
        return 'Password must be minimum of 8 characters';
    }
}

// Function to check if user already exists in db
function checkAlreadyUser($conn, $userEmail)
{
    $result = $conn->query("SELECT `Email` FROM `users` WHERE `Email` = '$userEmail'");

    if ($result->num_rows >= 1) {
        return "You already have an account with this email address";
    }
}

function checkValidEmail($haystack)
{
    $needle = '@';
    $valid = strpos($haystack, $needle);
    if (!$valid) {
        return 'Please enter a valid email address';
    }
}
