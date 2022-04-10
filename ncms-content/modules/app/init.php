<?php
// error_reporting(0); // disable errors

function initCheckStartup()
{
    function randomString($length)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    $path = $_SERVER['DOCUMENT_ROOT'];
    $envFile = $path . "/.env";
    $encryptionKey = base64_encode(randomString(16));
    if (!file_exists($envFile)) {
        touch($envFile);
    }
    $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.env", true), true);
    if (filesize($envFile) == 0 || $json["INSTALL_STATE"] === false) {
        $envContents = json_encode('{ "INSTALL_KEY": "' . $encryptionKey . '","INSTALL_STATE": false }', JSON_PRETTY_PRINT);
        file_put_contents($envFile, json_decode($envContents, JSON_PRETTY_PRINT));
        header("Location: ./ncms-system/install/");
        exit;
    }
}

function initCheckInstallKey()
{
    $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.env", true), true);
    $backupJson = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/backups/backup.env", true), true);
    if ($json["INSTALL_KEY"] == "" || $json["INSTALL_KEY"] != $backupJson["INSTALL_KEY"]) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/backups/backup.env")) {
            header("Location: ./ncms-system/error/?error=install_key_invalid");
            exit;
        } else {
            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/backups/")) mkdir($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/backups/");
            touch($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/backups/backup.env");
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/backups/backup.env", file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.env"));
        }
    }
}

function initCheckDatabase()
{
    // check database tables presence
    // check database admin user presencein
    // check database connection 

    function decypherData($str)
    {
        $config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.env", true), true);
        $key = $config["INSTALL_KEY"];
        $pass3 = base64_decode($str);
        $pass2 = utf8_decode($pass3);
        $pass1 = openssl_decrypt($pass2, "AES-128-ECB", $key);

        $db = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", true), true);
        if ($pass1 == "") {
            if ($str == $db["hostname"]) {
                return "plesk.oxide.host"; // placeholder domain
            } else {
                return "Invalid Data";
            }
        } else {
            return $pass1;
        }
    }

    $db = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", true), true);
    $conn = new mysqli(decypherData($db["hostname"]), decypherData($db["username"]), decypherData($db["password"]), decypherData($db["database"]));

    $tableUsers = decypherData($db["prefix"]) . "users";
    $tablePosts = decypherData($db["prefix"]) . "posts";
    $tableAudits = decypherData($db["prefix"]) . "auditlogs";

    if (!$conn || $conn->connect_error) {
        header("Location: ./ncms-system/error/?error=database_connection_error");
    } else {
        $result = $conn->query("SELECT * FROM `$tableUsers` WHERE `is_admin`=1");
        if ($result->num_rows == 0) {
            header("Location: ./ncms-system/error/?error=no_admin_user");
        } else {
            if (!mysqli_query($conn, "DESCRIBE `$tableUsers`") || !mysqli_query($conn, "DESCRIBE `$tablePosts`") || !mysqli_query($conn, "DESCRIBE `$tableAudits`")) {
                header("Location: ./ncms-system/error/?error=database_configuration_error");
            }
        }
    }

    $conn->close();
}
