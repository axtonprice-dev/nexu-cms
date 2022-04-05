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
