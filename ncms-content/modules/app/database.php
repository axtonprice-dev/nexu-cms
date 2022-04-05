<?php
$hostname = "plesk.oxide.host";
$username = "surgenet_nexucms";
$password = "_gOw742j";
$database = "nexu.cms";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
