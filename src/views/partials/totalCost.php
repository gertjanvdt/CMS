<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/connect.php";
$method = $_SERVER['REQUEST_METHOD'];
$id = 0;

if ($method === 'POST') {
    echo getShipPrce($conn, $_POST['option']);
}

function getShipPrce($conn, $id)
{
    $result = $conn->query("SELECT * FROM `shipment` WHERE `Id` = $id");

    if ($result) {
        while ($row = $result->fetch_object()) {
            return $row->Cost;
        }
    }
}
