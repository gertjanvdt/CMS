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
            <div class="checkout_leftBasketItems">
                <!-- ROWS WITH ITEMS SET WITH BASED ON BASKET -->
                <?php
                if ($basket) {
                    // var_dump($basket);
                    foreach ($basket as $basketItem) {

                ?>
                        <div class="basketItem_row" data-title="<?php echo $basketRowId ?>">
                            <img src="../images/delete.svg" class="delete_btn" data-title="<?php echo $basketItem->id ?>">
                            <div>
                                <img src="<?php echo $basketItem->image ?>" alt="item_image">
                                <p><?php echo $basketItem->title ?></p>
                                <p>$ <?php echo $basketItem->price ?></p>
                            </div>
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
                <p>Subtotal: $
                    <span class="subtotal_amount">
                        <?php
                        echo setSubtotal($basket);
                        ?>
                    </span>
                </p>
                <small class="subtotal_gift" data-children-count="1">
                    <input type="checkbox">This order contains a gift</small>
                <button>Proceed to checkout</button>
            </div>
        </div>
    </div>
    <script src="../js/cart.js"></script>
</main>