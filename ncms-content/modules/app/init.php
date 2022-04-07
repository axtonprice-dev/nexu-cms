<?php
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
        header("Location: ./ncms-system/error/?error=install_key_invalid");
        exit;
    }
}

function initCheckDatabase()
{
    // check database tables presence
    // check config in config table  

    // $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", true), true);
    // $conn = mysqli_connect($json["hostname"], $json["username"], $json["password"], $json["database"]);
    // $configTable = $json["prefix"] . "configuration";

    // $mysqli = new mysqli($json["hostname"], $json["username"], $json["password"], $json["database"]);
    // if ($mysqli->connect_errno) {
    //     die("Connect failed: " . $mysqli->connect_error);
    // }

    // $query = "SELECT * FROM `$configTable`";
    // $result = $mysqli->query($query);

    // while ($row = $result->fetch_array()) {
    //     echo '';
    // }
}
