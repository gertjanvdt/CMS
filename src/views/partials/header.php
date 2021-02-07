<header>
    <div>
        <a href="./">
            <img id="header_logo" class="header_image" src="http://pngimg.com/uploads/amazon/amazon_PNG25.png">
        </a>
    </div>

    <div class="searchBar">
        <input class="searchBar_input" type="text">
        <img class="searchBar_img" src="./images/magnifying-glass.svg" alt="">
    </div>

    <div class="headerNav">
        <div class="headerNav_option">
            <a href="./login">
                <p class="headerNav_option">Hello,
                    <?php
                    if (!isset($_SESSION['firstname'])) {
                        echo 'sign in';
                    } else {
                        echo $_SESSION['firstname'];
                    }
                    ?>
                </p>
                <p class="headerNav_optionBold">Accounts & Lists</p>
            </a>
        </div>
        <div class="headerNav_option option_orders">
            <div class="order_link">
                <span class="headerNav_option">Returns</span>
                <span class="headerNav_optionBold">& Orders</span>
            </div>

            <div class="ordersLogin_popup hide">
                <p class="close_popup">x</p>
                <a href="/login"><button type="submit" class="amazon_btnPrimary signin_btn">Sign in</button></a>
                <a href="/register"><button class="amazon_btnSecondary signin_btn">Create your Amazon Account</button></a>
            </div>
        </div>

        <div class="headerNav_option" id="cart_container">
            <a href="./cart">
                <img src="images/cart.svg" alt="shopping cart" id="shopping_cart">
                <!-- Amount shown in  basket set by JS in header.js -->
                <p id="cart_amount"></p>
            </a>
        </div>
    </div>
    <script src="../js/header.js"></script>
</header>