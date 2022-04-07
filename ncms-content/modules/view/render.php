<?php
error_reporting(0);
function rewriteUrl($loc)
{
    echo '<script>window.history.pushState("", "", \'' . $loc . '\');</script>';
}

if (strpos($_SERVER['REQUEST_URI'], "ncms-system/install")) {

    if (!isset($_GET["pg"])) {
        $_GET["pg"] = null;
    }

    $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.env", true), true);
    if ($json["INSTALL_STATE"] === true) {
        header("Location: ../../");
        exit;
    }

    if ($_GET["pg"] == "1") {
        require("install/database_Connection.php");
    } elseif ($_GET["pg"] == "2") {
        require("install/website_Configuration.php");
    } elseif ($_GET["pg"] == "3") {
        require("install/final_Configurations.php");
    } else {
        require("install/installation_Introduction.php");
    }
}
