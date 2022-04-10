<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/init.php");
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/compose_init.php");
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/encryption_core.php");

$error = $_GET["error"];
if (!$error) {
    header("Location: ../../");
}

if ($error == "install_key_invalid") {
    $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.env", true), true);
    $backupJson = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/backups/backup.env", true), true);
    if ($json["INSTALL_KEY"] == "" || $json["INSTALL_KEY"] != $backupJson["INSTALL_KEY"]) {
        require("templates/invalid_install_key.php");
    } else {
        header("Location: ../../"); // invaid key resulted redirect
    }
} else {
    if ($error == "404") {
        require("templates/404.php");
    } else {
        if ($error == "500") {
            require("templates/500.php");
        } else {
            if ($error == "403") {
                require("templates/403.php");
            } else {
                if ($error == "database_configuration_error") {
                    require("templates/configuration_error.php");
                } else {
                    if ($error == "no_admin_user") {
                        require("templates/admin_user_missing.php");
                    } else {
                        if ($error == "database_connection_error") {
                            require("templates/database_connection_error.php");
                        } else {
                            header("Location: ../../");
                        }
                    }
                }
            }
        }
    }
}
