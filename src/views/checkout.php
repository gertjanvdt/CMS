<?php
include './models/basket.php';
//include "$path/views/partials/totalCost.php"

?>

<main>
    <div class="checkout_container">
        <div class="checkout_left">
            <?php
            include "$path/views/partials/basketItems.php";
            ?>

            <div class="checkout_shipment">
                <h2>Shipping</h2>
                <label for="shipment">
                    <h5>Select where to ship your order</h5>
                </label>
                <select name="shipment" id="shipment">
                    <option value="" selected disabled hidden>Select your part of the world</option>
                    <?php include "$path/views/partials/shipOptions.php"
                    ?>
                </select>

            </div>

            <div class="order_total">
                <h2>Total cost</h2>
                <h5>Movie(s): $ <span id="movies_price"> <?php
                                                            echo setSubtotal($basket);
                                                            ?> </span></h5>
                <h5>Shipment: $ <span id="shipment_price"></span></h5>
                <h2>Total amount: $ <span id="total_amount"></span> </h2>
            </div>
        </div>

        <div class="checkout_payment">
            <h2>Payment Type</h2>
            <label for="cctype">
                <h5>Select your Credit Card type</h5>
            </label>
            <select name="cctype" id="cctype">
                <option value="" selected disabled hidden>Select your cart type</option>
                <option value="mastercard">MasterCard</option>
                <option value="visa">Visa</option>
                <option value="amex">American Express</option>
            </select>
            <h2>Payment Details</h2>
            <form action="">
                <label for="creditcard_number">
                    <h5>Credit Card Number</h5>
                </label><input type="text" name="creditcard_number" placeholder="Enter your FAKE creditcard number">
                <label for="cvv">
                    <h5>CVV</h5>
                </label><input type="text" name="cvv" id="cvv" placeholder="Enter FAKE cvv">
                <label for="expire">
                    <h5>Expiration Date</h5>
                </label><input type="text" name="expire" id="expire" placeholder="DD-MM-YY">

                <button class="amazon_btnPrimary" type="submit" id="payment_btn">Submit Payment</button>
            </form>
            <small>For this clone no information entered here will be saved or used. However, for testing purpose make sure not to submit real credit card data.</small>


        </div>
    </div>
    <script src="../js/checkout.js"></script>
    <script src="../js/register.js"></script>
</main>