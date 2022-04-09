<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/init.php");
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/compose_init.php");
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/encryption_Core.php");

$env = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.env", true), true);
$config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json", true), true);
$settings = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_settings.json", true), true);
$db = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", true), true);

// User variable translations
$settings = str_replace("%site_name%", $config["site_name"], $settings);
$settings = str_replace("%sitename%", $config["site_name"], $settings);
$settings = str_replace("%site%", $config["site_name"], $settings);

$settings = str_replace("%site_description%", $config["site_description"], $settings);
$settings = str_replace("%sitedescription%", $config["site_description"], $settings);
$settings = str_replace("%sitedesc%", $config["site_description"], $settings);

$settings = str_replace("%site_email%", $config["site_email"], $settings);
$settings = str_replace("%site_keywords%", $config["site_keywords"], $settings);
$settings = str_replace("%site_language%", $config["site_language"], $settings);
$settings = str_replace("%admin_email%", $config["admin_email"], $settings);
$settings = str_replace("%admin_username%", $config["admin_username"], $settings);
$settings = str_replace("%site_url%", $config["site_url"], $settings);

// Functions 
function determineReadTime($content)
{
    $words = str_word_count(strip_tags($content));
    $minutes = floor($words / 200);
    $seconds = floor($words % 200 / (200 / 60));
    $minutes = intval($minutes);
    if ($minutes == 0) {
        return $seconds . " sec";
    } else {
        return $minutes . " min ";
    }
}

require("ncms-content/modules/view/public/author.php");
?>