<?php
require "$path/models/NavItem.php";
$result = $conn->query("SELECT * FROM category");
$navItems = [];

use models\NavItem;

if ($result) {
    while ($row = $result->fetch_object()) {
        array_push($navItems, new NavItem($row->Category_Id, $row->Name));
    }
}

?>

<div class="main_nav">
    <ul>
        <?php
        foreach ($navItems as $item) {
        ?>

            <li class="main_navItem" data-title="<?php echo $item->id ?>"><?php echo $item->name ?></li>
        <?php
        }
        ?>

    </ul>
</div>