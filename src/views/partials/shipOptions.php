<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$shipOptions = [];
require "$path/models/ShipSelect.php";

use models\ShipSelect;

$result = $conn->query("SELECT * FROM `shipment`");

if ($result->num_rows >= 1) {
    while ($row = $result->fetch_object()) {
        array_push($shipOptions, new ShipSelect($row->Id, $row->Location, $row->Cost));
    }
}

foreach ($shipOptions as $option) {
?>
    <option value="<?php echo $option->shipId ?>"><?php echo $option->shipRegion ?></option>
<?php
}
