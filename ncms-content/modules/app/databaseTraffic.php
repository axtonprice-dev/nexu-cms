<?php

function createConfigTable($servername, $username, $password, $database, $prefix)
{
    $table = $prefix . "configuration";
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_query($conn, "DELETE FROM `$table`;"); // remove current configuration if any
    mysqli_query($conn, "CREATE TABLE `$table` (`perm_id` int(11) NOT NULL,`site_name` varchar(255) NOT NULL,`site_url` varchar(255) NOT NULL,`site_description` varchar(255) NOT NULL,`site_keywords` varchar(255) NOT NULL,`site_email` varchar(255) NOT NULL,`site_language` varchar(255) NOT NULL,`admin_email` varchar(255) NOT NULL,`admin_password` varchar(255) NOT NULL,`admin_username` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    mysqli_query($conn, "ALTER TABLE `$table` ADD PRIMARY KEY (`perm_id`);");
    mysqli_query($conn, "ALTER TABLE `$table` MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT;");
    mysqli_query($conn, "INSERT INTO `$table` (`site_name`, `site_url`, `site_description`, `site_keywords`, `site_email`, `site_language`, `admin_email`, `admin_password`, `admin_username`) VALUES ('', '', '', '', '', '', '', '', '');");
    mysqli_close($conn);
}

function updateConfiguration($servername, $username, $password, $database, $prefix, $field, $value)
{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $table = $prefix . "configuration";
    $sql = "UPDATE `$table` SET `$field` = '$value' WHERE `perm_id` = '1';";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
