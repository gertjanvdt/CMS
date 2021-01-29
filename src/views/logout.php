<?php
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['loggedin']);
setcookie("loggedin", "", time() - 3600);

//destroy session
?>

<main class="main_logout">
    <div class="logout_container">
        <div>
            <h1>You are <span class="loggedin_headerUser">logged out</span></h1>
            <h3>We hope to see you back soon!</h3>
        </div>
        <div>
            <a href="/"><img class="home_icon" src="../images/home.svg" alt=""></a>
        </div>
    </div>
</main>