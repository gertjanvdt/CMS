<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/models/basket.php";
?>

<main class="loggedin_container">


    <div class="loggedin_headerContainer">
        <h2 class="loggedin_header">Welcome <span class="loggedin_headerUser"><?php echo $_SESSION['firstname'], " ", $_SESSION['lastname']  ?></h2></span>
        <a href="../logout" class="logout"><img src="./images/logout.svg" alt="logout buttuon"></a>
    </div>

    <div class="loggedin_optionsContainer">

        <?php
        if (count($basket) > 0 && isset($_COOKIE['loggedin'])) {
        ?>
            <div class="loggedin_checkout">
                <p>Get your wanted movies now!</p>
                <a href="/checkout"><button class="amazon_btnPrimary" id="claim">Checkout</button></a>
            </div>
        <?php
        }
        ?>



        <div>
            <div>
                <a href="/" class="loggedin_basketLink">
                    <p class="hide loggedin_headerUser" id="congrats">Congrats! you claimed your discount</p>
                    <img class="loggedin_optionsImage" src="./images/popcorn.svg" alt="">
                    <p>Discover selected movies</p>
                </a>
            </div>
            <div>
                <a href="/cart" class="loggedin_basketLink">
                    <img class="loggedin_optionsImage" src="./images/cart-color.svg" alt="">
                    <p>View my shopping cart</p>
                </a>
            </div>

        </div>
    </div>

    </div>
    <!-- <script src="./js/loggedin.js"></script> -->
</main>