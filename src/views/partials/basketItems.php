<div class="checkout_leftBasketItems">
    <?php
    if ($basket) {
        // var_dump($basket);
        foreach ($basket as $basketItem) {

    ?>
            <div class="basketItem_row" data-title="<?php echo $basketRowId ?>">
                <?php
                if ($_SERVER["REQUEST_URI"] === '/cart') {
                ?>
                    <img src="../images/delete.svg" class="delete_btn" data-title="<?php echo $basketItem->id ?>">
                <?php
                }
                ?>
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