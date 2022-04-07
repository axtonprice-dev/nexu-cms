<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/init.php");
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/compose_init.php");

$error = $_GET["error"];
if (!$error) {
    header("Location: ../../");
}

if ($error == "404") {
    require("templates/404.php");
}
if ($error == "500") {
    require("templates/500.php");
}
if ($error == "403") {
    require("templates/403.php");
}
if ($error == "install_key_invalid") {
    $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_env.json", true), true);
    $backupJson = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/backups/backup_env.json", true), true);
    if ($json["INSTALL_KEY"] == "" || $json["INSTALL_KEY"] != $backupJson["INSTALL_KEY"]) {
        require("templates/invalidkey.php");
        exit;
    } else {
        header("Location: ../../");
    }
}
