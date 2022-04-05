<?php

function createConfigTable($servername, $username, $password, $database)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "INSERT INTO `configuration` (`perm_id`, `site_name`, `site_url`, `site_description`, `site_keywords`, `site_email`, `site_language`, `admin_email`, `admin_password`, `admin_username`) VALUES ('0', '', '', '', '', '', '', '', '', '');";
    $query = mysqli_query($conn, $sql);
}

function updateConfiguration($servername, $username, $password, $database, $field, $value)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "UPDATE `configuration` SET `$field` = '$value' WHERE `perm_id` = '0';";
    $query = mysqli_query($conn, $sql);
}
