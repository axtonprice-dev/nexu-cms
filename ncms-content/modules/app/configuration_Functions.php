<?php
function storeDatabaseConnection($hostname, $username, $password, $database, $prefix)
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json")) {
        unlink($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json");
    }
    $json = array(
        "hostname" => $hostname,
        "username" => $username,
        "password" => $password,
        "database" => $database,
        "prefix" => $prefix
    );
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", json_encode($json));
}

function updateConfiguration($field, $value)
{
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json")) {
        touch($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json");
    }
    $contents = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json");
    $contentsDecoded = json_decode($contents, true);
    $contentsDecoded[$field] = $value;
    $json = json_encode($contentsDecoded);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json", $json);
}

// function createConfigTable($servername, $username, $password, $database, $prefix)
// {
//     $table = $prefix . "configuration";
//     $conn = mysqli_connect($servername, $username, $password, $database);
//     mysqli_query($conn, "DELETE FROM `$table`;"); // remove current configuration if any
//     mysqli_query($conn, "CREATE TABLE `$table` (`perm_id` int(11) NOT NULL,`site_name` varchar(255) NOT NULL,`site_url` varchar(255) NOT NULL,`site_description` varchar(255) NOT NULL,`site_keywords` varchar(255) NOT NULL,`site_email` varchar(255) NOT NULL,`site_language` varchar(255) NOT NULL,`admin_email` varchar(255) NOT NULL,`admin_password` varchar(255) NOT NULL,`admin_username` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
//     mysqli_query($conn, "ALTER TABLE `$table` ADD PRIMARY KEY (`perm_id`);");
//     mysqli_query($conn, "ALTER TABLE `$table` MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT;");
//     mysqli_query($conn, "INSERT INTO `$table` (`site_name`, `site_url`, `site_description`, `site_keywords`, `site_email`, `site_language`, `admin_email`, `admin_password`, `admin_username`) VALUES ('', '', '', '', '', '', '', '', '');");
//     mysqli_close($conn);
// }