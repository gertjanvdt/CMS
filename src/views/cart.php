<?php
require_once 'models/basket.php';
use models\BasketItem;
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
                <h2>Dear <span class="italic">Guest</span></h2>
                <h4>Your shopping basket has <span class="italic">0</span> items</h4>
            </div>
            <div class="checkout_leftBasketItems">
                <?php 
                if (!empty($basket)) {
                    foreach ($basket as $item) {
                ?>
                    <div class="basketItem_row">
                        <img src="<?php echo $item->image?>" alt="movie cover image">
                        <p> <?php echo $item->title?></p>
                        <p>$ <?php echo $item->price?></p>
                    </div>

                <?php   };

                }
                ?>
                <!-- <div class="basketItem_row">
                    <img src="./images/home_alone.jpeg" alt="">
                    <p> Home Alone</p>
                    <p>$ 5.99</p>
                </div> -->


            </div>
            <div class="disclaimer_text">
                <p>The price and availability of items at Amazon.com are subject to change. The Cart is a temporary place to store a list of your items and reflects each item's most recent price. Shopping CartLearn more
                    Do you have a gift card or promotional code? We'll ask you to enter your claim code when it's time to pay.</p>
            </div>
        </div>
    
        <div class="checkout_right">
            <div class="subtotal">
                <p>Subtotal: <strong>$0.00</strong></p>
                <small class="subtotal_gift" data-children-count="1">
                    <input type="checkbox">This order contains a gift</small>
                <button>Proceed to checkout</button>
            </div>
        </div>
    </div>
</main>
