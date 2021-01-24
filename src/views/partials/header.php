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
        <div class="headerNav_option">
            <span class="headerNav_option">Returns</span>
            <span class="headerNav_optionBold">& Orders</span>
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