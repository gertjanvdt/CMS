<?php
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['loggedin']);
setcookie("loggedin", "", time() - 3600);
?>

<main>
    <h1>You are logged out</h1>
    <a href="/">return home</a>
</main>