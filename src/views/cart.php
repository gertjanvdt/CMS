<?php
require 'models/basket.php';
$basketRowId = 0;


?>

<main>
    <div class="checkout_container">
        <div class="checkout_left">

            <div class="checkout_leftInfo">
                <img src="./images/empty_cart.svg" alt="">
                <div class="checkout_leftOptions">
                    <div>
                        <h2>Your Amazon Cart is empty</h2>
                        <a href="./">Shop todays holiday movie deals</a>
                    </div>
                    <div class="checkoutleft_leftOptionButtons">
                        <a href="./login"><button class="amazon_btnPrimary">Sign in to your account</button></a>
                        <a href="./login"><button class="amazon_btnSecondary">Sign up now</button></a>
                    </div>
                </div>
            </div>

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
                    <h4>Your shopping basket has <span class="italic basketItems_amount">0 </span> item(s)</h4>
                </div>
                <div class="checkout_leftHeaderBin">
                    <img src="./images/delete.svg" alt="" id="delete_btn">
                </div>

            </div>
            <div class="checkout_leftBasketItems">
                <!-- ROWS WITH ITEMS SET WITH JS -->
                <?php
                if ($basket) {
                    foreach ($basket as $basketItem) {
                        $basketRowId++
                ?>
                        <div class="basketItem_row" data-title="<?php echo $basketRowId ?>">
                            <img src="<?php echo $basketItem->image ?>" alt="item_image">
                            <p><?php echo $basketItem->title ?></p>
                            <p>$ <?php echo $basketItem->price ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="disclaimer_text">
                <p>The price and availability of items at Amazon.com are subject to change. The Cart is a temporary place to store a list of your items and reflects each item's most recent price. Shopping CartLearn more
                    Do you have a gift card or promotional code? We'll ask you to enter your claim code when it's time to pay.</p>
            </div>
        </div>

        <div class="checkout_right">
            <div class="subtotal">
                <p>Subtotal: $ <span class="subtotal_amount">0.00</span></p>
                <small class="subtotal_gift" data-children-count="1">
                    <input type="checkbox">This order contains a gift</small>
                <button>Proceed to checkout</button>
            </div>
        </div>
    </div>
    <!-- <script src="../js/cart.js"></script> -->
</main>