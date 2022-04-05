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

    if ($_GET["pg"] == "2") {
        require("install/website_Configuration.php");
    } elseif ($_GET["pg"] == "1") {
        require("install/database_Connection.php");
    } else {
        require("install/installation_Introduction.php");
    }
}
