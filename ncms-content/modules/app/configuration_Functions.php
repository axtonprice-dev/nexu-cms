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
    touch($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json");
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", json_encode($json));
}

function updateConfiguration($field, $value)
{
    if (!is_dir($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration")) {
        mkdir("../../ncms-storage/configuration", 0777, true);
    }
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json")) {
        touch($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json");
    }
    $contents = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json");
    $contentsDecoded = json_decode($contents, true);
    $contentsDecoded[$field] = $value;
    $json = json_encode($contentsDecoded);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json", $json);
}

function setupDatabase($servername, $username, $password, $database, $prefix)
{
    $conn = mysqli_connect($servername, $username, $password, $database);

    $tableUsers = $prefix . "users";
    $tablePosts = $prefix . "posts";
    $tableAudits = $prefix . "auditlogs";

    mysqli_query($conn, "CREATE TABLE `$tableUsers` (`user_id` int(11) NOT NULL,`username` varchar(100) NOT NULL,`email` varchar(100) NOT NULL,`firstname` varchar(100) NOT NULL,`lastname` varchar(100) NOT NULL,`last_seen` timestamp(5) NOT NULL DEFAULT current_timestamp(5),`date_created` datetime(5) NOT NULL,`is_admin` varchar(100) NOT NULL,`is_editor` varchar(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    mysqli_query($conn, "ALTER TABLE `$tableUsers` ADD PRIMARY KEY (`user_id`);");
    mysqli_query($conn, "ALTER TABLE `$tableUsers` MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;");
    mysqli_query($conn, "COMMIT;");

    mysqli_query($conn, "CREATE TABLE `$tablePosts` (`post_id` int(11) NOT NULL,`author_id` varchar(50) NOT NULL,`post_date` timestamp(5) NOT NULL DEFAULT current_timestamp(5),`post_title` varchar(100) NOT NULL,`post_description` varchar(100) NOT NULL,`post_tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`post_tags`))) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    mysqli_query($conn, "ALTER TABLE `$tablePosts` ADD PRIMARY KEY (`post_id`);");
    mysqli_query($conn, "ALTER TABLE `$tablePosts` MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;");
    mysqli_query($conn, "COMMIT;");

    mysqli_query($conn, "CREATE TABLE `$tableAudits` (`log_id` int(11) NOT NULL,`log_content` varchar(100) NOT NULL,`log_ip` varchar(100) NOT NULL,`log_user` varchar(100) NOT NULL,`log_date` timestamp(5) NOT NULL DEFAULT current_timestamp(5)) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    mysqli_query($conn, "ALTER TABLE `$tableAudits` ADD PRIMARY KEY (`log_id`);");
    mysqli_query($conn, "ALTER TABLE `$tableAudits` MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;");
    mysqli_query($conn, "COMMIT;");

    // mysqli_query($conn, "INSERT INTO `$table` (`site_name`, `site_url`, `site_description`, `site_keywords`, `site_email`, `site_language`, `admin_email`, `admin_password`, `admin_username`) VALUES ('', '', '', '', '', '', '', '', '');");
    
    mysqli_close($conn);
}
