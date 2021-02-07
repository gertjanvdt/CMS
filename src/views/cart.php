<?php
require 'models/basket.php';
$basketRowId = 0;
$basketCount = count($basket);

?>

<main>
    <div class="checkout_container">
        <div class="checkout_left">
            <?php
            if ($basketCount === 0) {
                include 'views/partials/emptyBasket.php';
            }
            ?>
            <div class="checkout_leftHeader">
                <div>
                    <h2>Dear
                        <span class="italic">
                            <?php
                            if (isset($_SESSION['firstname'])) {
                                echo $_SESSION['firstname'];
                            } else {
                                echo 'Guest';
                            }
                            ?>
                        </span>
                    </h2>
                    <h4>Your shopping basket has
                        <span class="italic basketItems_amount">
                            <?php
                            echo $basketCount;
                            ?>
                        </span>
                        item(s)
                    </h4>
                </div>

            </div>
            <!-- ROWS WITH ITEMS SET WITH BASED ON BASKET -->
            <?php
            include "$path/views/partials/basketItems.php";
            ?>
            <div class="disclaimer_text">
                <p>The price and availability of items at Amazon.com are subject to change. The Cart is a temporary place to store a list of your items and reflects each item's most recent price. Shopping CartLearn more
                    Do you have a gift card or promotional code? We'll ask you to enter your claim code when it's time to pay.</p>
            </div>
        </div>

        <div class="checkout_right">
            <div class="subtotal">
                <p>Subtotal: $
                    <span class="subtotal_amount">
                        <?php
                        echo setSubtotal($basket);
                        ?>
                    </span>
                </p>
                <small class="subtotal_gift" data-children-count="1">
                    <input type="checkbox">This order contains a gift</small>
                <a href="/checkout">
                    <button class="amazon_btnPrimary checkout_btn" <?php if (count($basket) === 0) {
                                                                        echo "disabled";
                                                                    } ?>>Proceed to checkout
                    </button>
                </a>
                <?php if (count($basket) === 0) {
                ?>
                    <small>Fill your basket before you can checkout</small>
                <?php
                } ?>
            </div>
        </div>
    </div>
    <script src="../js/cart.js"></script>
</main>