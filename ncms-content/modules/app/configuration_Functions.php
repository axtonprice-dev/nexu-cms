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
    $config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json", true), true);

    $userEmail = $config["admin_email"];
    $userUsername = $config["admin_username"];
    $userPassword = $config["admin_password"];

    $tableUsers = $prefix . "users";
    $tablePosts = $prefix . "posts";
    $tableAudits = $prefix . "auditlogs";

    mysqli_query($conn, "CREATE TABLE `$tableUsers` (`user_id` int(11) NOT NULL,`username` varchar(100) NOT NULL,`email` varchar(100) NOT NULL,`firstname` varchar(100) NOT NULL,`lastname` varchar(100) NOT NULL,`last_seen` timestamp(5) NOT NULL DEFAULT current_timestamp(5),`date_created` datetime(5) NOT NULL,`is_admin` varchar(100) NOT NULL,`is_editor` varchar(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    mysqli_query($conn, "ALTER TABLE `$tableUsers` ADD PRIMARY KEY (`user_id`);");
    mysqli_query($conn, "ALTER TABLE `$tableUsers` MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;");
    mysqli_query($conn, "COMMIT;");
    mysqli_query($conn, "INSERT INTO `$tableUsers` (`username`, `email`, `password`, `firstname`, `lastname`, `is_admin`, `is_editor`) VALUES ('$userUsername', '$userEmail', '$userPassword', 'Admin', '', '1', '0');");
    mysqli_query($conn, "ALTER TABLE `$tableUsers` AUTO_INCREMENT = 1");

    mysqli_query($conn, "CREATE TABLE `$tablePosts` (`post_id` int(11) NOT NULL,`author_id` varchar(50) NOT NULL,`post_date` timestamp(5) NOT NULL DEFAULT current_timestamp(5),`post_title` varchar(100) NOT NULL,`post_teaser` varchar(100) NOT NULL,`post_description` varchar(1000) NOT NULL,`post_tags` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,`post_img_landscape` varchar(100) NOT NULL,`post_img_portrait` varchar(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    mysqli_query($conn, "ALTER TABLE `$tablePosts` ADD PRIMARY KEY (`post_id`);");
    mysqli_query($conn, "ALTER TABLE `$tablePosts` MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;");
    mysqli_query($conn, "COMMIT;");
    mysqli_query($conn, "ALTER TABLE `$tablePosts` AUTO_INCREMENT = 1");

    mysqli_query($conn, "CREATE TABLE `$tableAudits` (`log_id` int(11) NOT NULL,`log_content` varchar(100) NOT NULL,`log_ip` varchar(100) NOT NULL,`log_user` varchar(100) NOT NULL,`log_date` timestamp(5) NOT NULL DEFAULT current_timestamp(5)) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    mysqli_query($conn, "ALTER TABLE `$tableAudits` ADD PRIMARY KEY (`log_id`);");
    mysqli_query($conn, "ALTER TABLE `$tableAudits` MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;");
    mysqli_query($conn, "COMMIT;");
    mysqli_query($conn, "ALTER TABLE `$tableAudits` AUTO_INCREMENT = 1");

    mysqli_close($conn);

    /*
    Audit Log formatting

    ACCOUNT:
    Account Created
    Account Deleted
    Account Profile Picture Updated
    Account Username Updated
    Account Firstname Updated
    Account Lastname Updated
    Account Password Updated
    Account Description Updated
    Account Email Updated
    Account Logged In
    Account Logged Out
    Account Updated <- Non Specific
    
    SYSTEM:
    Site Name Updated
    Site Description Updated
    Site Keywords Updated
    Site Email Updated
    Site Element Updated
    Site Updated <- Non Specific

    */
}

function createNewUser($userEmail, $userUsername, $userPassword)
{
    $config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json", true), true);
    $servername = $config["database_host"];
    $username = $config["database_username"];
    $password = $config["database_password"];
    $database = $config["database_name"];
    $prefix = $config["database_prefix"];

    $conn = mysqli_connect($servername, $username, $password, $database);
    $table = $prefix . "users";

    mysqli_query($conn, "INSERT INTO `$table` (`username`, `email`, `password`, `firstname`, `lastname`, `is_admin`, `is_editor`) VALUES ('$userUsername', '$userEmail', '$userPassword', 'Admin', '', '1', '0');");
    mysqli_query($conn, "ALTER TABLE `$table` AUTO_INCREMENT = 1");

    mysqli_close($conn);
}
