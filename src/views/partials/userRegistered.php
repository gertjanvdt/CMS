<?php
//var_dump($newUser);
//echo $newUser->firstName;
?>

<main class="registered">
    <div class="registered_container">
        <div>
            <h2>You have registered!</h2>
            <h3>Welcome <span class="loggedin_headerUser"><?php echo "$newUser->firstName $newUser->lastName" ?></span>, we are happy you have joined.</h3>
        </div>

        <div>
            <a href="/login">
                <img class="login_icon" src="../../images/user.svg" alt="">
            </a>
        </div>
    </div>
</main>