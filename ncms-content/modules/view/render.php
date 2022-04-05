<?php
error_reporting(0);
function rewriteUrl($loc)
{
    echo '<script>window.history.pushState("", "", \'' . $loc . '\');</script>';
}

if ($_GET["render"] == "website_Configuration") {
    require("website_Configuration.php");
    rewriteUrl("/ncms-system/install/");
} else if ($_GET["render"] == "test") {
    require("test.php");
    // rewriteUrl("/ncms-system/install/you-are-viewing-a-test-page");
} else {
    require("database_Connection.php");
    rewriteUrl("/ncms-system/install/");
}
