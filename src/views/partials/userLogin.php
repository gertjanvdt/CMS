<main class="login_container">
    <div class="login_boxContainer">
        <h2>Sign-in</h2>
        <form method="POST">
            <h5>E-mail</h5><input class="<?php if (isset($warning)) {
                                                echo "warning";
                                            } ?>" type="text" value="" id="email" name="email">
            <h5>Password</h5><input class="<?php if (isset($warning)) {
                                                echo "warning";
                                            } ?>" type="password" value="" id="password" name="password">
            <h4 class="login_warning">
                <?php
                if (isset($warning)) {
                    echo $warning;
                }
                ?>
            </h4>
            <button type="submit" class="amazon_btnPrimary signin_btn">Sign in</button>
        </form>
        <p>By signing in you agree to the AMAZON FAKE CLONE Conditions of Use & Sale. Please see our Privacy Notice, our Cookies Notice and our Interet-based Adds Notice.</p>
        <button class="amazon_btnSecondary signin_btn">Create your Amazon Account</button>
    </div>
</main>