<main class="register_container">
    <div class="registerForm_container">
        <h2>Create New Account</h2>
        <form method="POST">
            <label for="fname">
                <h5>First name:</h5>
            </label><input type="text" value="" id="fname" name="fname">
            <label for="lname">
                <h5>Last name:</h5>
            </label><input type="text" value="" id="lname" name="lname">
            <label for="email">
                <h5>Email:</h5>
            </label>
            <input type="text" value="" id="email" name="email">
            <label for="password">
                <h5>Password:</h5>
            </label>
            <input type="password" value="" id="password" name="password" placeholder="Minimum of 8 characters">
            <label for="confirm">
                <h5>Confirm Password:</h5>
            </label>
            <input type="password" value="" id="confirm" name="confirm" placeholder="Enter same password to confirm">
            <?php
            if (isset($warnings)) {
                foreach ($warnings as $warning) {
                    if (!empty($warning)) {
            ?>
                        <h4 class="login_warning">&#9888; <?php echo $warning ?></h4>
            <?php
                    }
                }
            }
            ?>
            <button type="submit" class="amazon_btnPrimary signin_btn">Create Account</button>
        </form>
    </div>
    <script src="../js/register.js"></script>
</main>