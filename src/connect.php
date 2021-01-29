<?php
$servername = "database";
$username = "root";
$password = "";
$database = "CMS_Amazon";

//Create connection
$conn =  new mysqli($servername, $username, $password, $database);

$dbh = new PDO('mysql:dbname=CMS_Amazon;host=database', $username, $password);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
