<main class="loggedin_container">


    <div class="loggedin_headerContainer">
        <h2 class="loggedin_header">Welcome <span class="loggedin_headerUser"><?php echo $_SESSION['firstname'], " ", $_SESSION['lastname']  ?></h2></span>
        <a href="../logout" class="logout"><img src="./images/logout.svg" alt="logout buttuon"></a>
    </div>

    <div class="loggedin_optionsContainer">
        <div>
            <p>As a valued customer your will get 10% off selected movies:</p>
            <button class="amazon_btnPrimary" id="claim">Claim your discount!</button>
        </div>


        <div>
            <div>
                <p class="hide loggedin_headerUser" id="congrats">Congrats! you claimed your discount</p>
                <img class="loggedin_optionsImage" src="./images/popcorn.svg" alt="">
                <p>Discover selected movies</p>
            </div>
            <div>
                <img class="loggedin_optionsImage" src="./images/cart-color.svg" alt="">
                <p>View my shopping cart</p>
            </div>

        </div>
    </div>

    </div>
    <script src="./js/loggedin.js"></script>
</main>