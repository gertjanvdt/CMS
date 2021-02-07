<?php
require "$path/models/OrderItem.php";

use models\OrderItem;

$userId = $_COOKIE['loggedin'];
$orders = [];
//$date = '';

$orderResult = $conn->query("SELECT * FROM `orders` WHERE `User_Id` = $userId");

if ($orderResult) {
    while ($row = $orderResult->fetch_object()) {
        array_push($orders, new OrderItem(strtotime($row->Date), $row->User_Id, $row->Movie_Id));
    }
}

usort($orders, 'cmp');

function cmp($a, $b)
{
    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
}

//var_dump($orders);

?>
<main class="orders_container">

    <div class="orders">
        <h2><span class="loggedin_headerUser">Your</span> orders</h2>
        <div class="orders_list">
            <?php
            if ($orders) {
                foreach ($orders as $item) {
                    $movieResult = $conn->query("SELECT `Title`, `Image` FROM `movie` WHERE `Movie_Id` = $item->movieId");

                    if ($movieResult) {
                        while ($row = $movieResult->fetch_object()) {
                            $image = $row->Image;
                            $title = $row->Title;
                        }
                    }
                    $date = $item->date;
            ?>
                    <div class="order_line">
                        <h5><?php echo date('d-m-Y', $date) ?></h5>
                        <img src="<?php echo $image ?>" alt="item_image">
                        <h5><?php echo $title ?></h5>
                    </div>
                <?php
                }
            } else {
                ?>
                <h5>No previous orders yet</h5>
                <a href="/">
                    <h5>Shop our movies!</h5>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</main>