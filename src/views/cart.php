<?php
require 'models/basket.php';


?>

<main>
    <div class="checkout_container">
        <div class="checkout_left">

            <!-- Show no items block if basket is empty -->
            <?php
            if (empty($basket)) {
                include 'views/partials/emptyBasket.php';
            }
            ?>

            <div class="checkout_leftHeader">
                <div>
                    <h2>Dear <span class="italic">Guest</span></h2>
                    <h4>Your shopping basket has <span class="italic basketItems_amount">0 </span> item(s)</h4>
                </div>
                <div class="checkout_leftHeaderBin">
                    <img src="./images/delete.svg" alt="" id="delete_btn">
                </div>

            </div>
            <div class="checkout_leftBasketItems">
                <!-- ROWS WITH ITEMS SET WITH JS -->
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
    <script src="../js/cart.js"></script>
</main>