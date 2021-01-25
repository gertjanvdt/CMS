<?php
require './models/NewUser.php';
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/connect.php";

use models\NewUser;

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $newUser = new NewUser($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['confirm']);

    $warnings = [];
    array_push($warnings, checkPassword($newUser->password, $newUser->confirm));
    array_push($warnings, checkIfEmpty($newUser));
    array_push($warnings, checkAlreadyUser($conn, $newUser->email));

    var_dump($warnings);

    // if no warnings send sql query
    $sql = "INSERT INTO `users` (`User_Id`, `First_Name`, `Last_Name`, `Email`, `Password`) VALUES (NULL, '$newUser->firstName', '$newUser->lastName', '$newUser->email', '$newUser->password');";
    //sendSQLQuery($conn, $sql);
}

// Function to check if all fields are filled in
function checkIfEmpty($newUser)
{
    foreach ($newUser as $item) {
        if (empty($item)) {
            return 'Please fill in all fields';
        }
    }
    //return 'all fields are filled in';
}

// Function to check if password and confirm password match
function checkPassword($password, $confirm)
{
    if ($password != $confirm) {
        return 'Passwords do not match';
    } else {
        //return 'passwords match';
    }
}

// Function to check if user already exists in db
function checkAlreadyUser($conn, $userEmail)
{
    $result = $conn->query("SELECT `Email` FROM `users` WHERE `Email` = '$userEmail'");

    if ($result->num_rows >= 1) {
        return "You already have an account with this email address";
    } else {
        // return "email unknown";
    }
}


// Function to insert selected movie into basket in db
function sendSQLQuery($conn, $sql)
{
    if (mysqli_query($conn, $sql)) {
        echo "User succesfully added to db";
    } else {
        echo "ERROR: Unable to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>


<main class="register_container">
    <div class="registerForm_container">
        <h2>Create New Account</h2>
        <form method="POST">
            <label for="fname">
                <h5>First name:</h5>
            </label><input type="text" value="" id="fname" name="fname">
            <h5>Last name:</h5> <input type="text" value="" id="lname" name="lname">
            <h5>Email:</h5> <input type="text" value="" id="email" name="email">
            <h5>Password:</h5> <input type="password" value="" id="password" name="password">
            <h5>Confirm Password:</h5> <input type="password" value="" id="confirm" name="confirm">
            <button type="submit" class="amazon_btnPrimary signin_btn">Create Account</button>
        </form>
    </div>
</main>