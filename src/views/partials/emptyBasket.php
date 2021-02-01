<div class="checkout_leftInfo">
    <img src="./images/empty_cart.svg" alt="">
    <div class="checkout_leftOptions">
        <div>
            <h2>Your Amazon Cart is empty</h2>
            <a href="./">Shop todays holiday movie deals</a>
        </div>
        <div class="checkoutleft_leftOptionButtons">
            <?php
            if (!isset($_SESSION['loggedin'])) {
            ?>
                <a href="./login"><button class="amazon_btnPrimary">Sign in to your account</button></a>
                <a href="./register"><button class="amazon_btnSecondary">Sign up now</button></a>
            <?php
            }
            ?>

        </div>
    </div>
</div>