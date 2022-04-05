<?php
$hostname = "plesk.oxide.host";
$username = "surgenet_nexucms";
$password = "_gOw742j";
$database = "nexu.cms";

$conn = mysqli_connect($hostname, $username, $password, $database);

mysqli_query($conn, "CREATE TABLE `configuration` (
    `database_host` varchar(255) NOT NULL,
    `database_username` varchar(255) NOT NULL,
    `database_password` varchar(255) NOT NULL,
    `database_name` varchar(255) NOT NULL,
    `site_name` varchar(255) NOT NULL,
    `site_url` varchar(255) NOT NULL,
    `site_description` varchar(255) NOT NULL,
    `site_keywords` varchar(255) NOT NULL,
    `site_email` varchar(255) NOT NULL,
    `site_language` varchar(255) NOT NULL,
    `admin_email` varchar(255) NOT NULL,
    `admin_password` varchar(255) NOT NULL,
    `admin_username` varchar(255) NOT NULL) 
    ENGINE=InnoDB DEFAULT CHARSET=utf8;");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
123