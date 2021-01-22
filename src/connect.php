<?php
$servername = "database";
$username = "root";
$password = "";
$database = "CMS_Amazon";

//Create connection
$conn =  new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
