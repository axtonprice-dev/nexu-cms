<?php
// error_reporting(0);
function rewriteUrl($loc)
{
    echo '<script>window.history.pushState("", "", \'' . $loc . '\');</script>';
}

// if (strpos($_SERVER['REQUEST_URI'], "/ncms-system/install")) {
if ($_COOKIE["installerPage"] == "0" || $_COOKIE["installerPage"] == "") {
    require("install/database_Connection.php");
} elseif ($_COOKIE["installerPage"] == "1") {
    require("install/website_Connection.php");
}
// }
// require("install/database_Connection.php");

// require("install/database_Connection.php");
// if ($_GET["render"] == "website_Configuration") {
//     require("install/website_Configuration.php");
//     rewriteUrl("/ncms-system/install/");
// } else if ($_GET["render"] == "test") {
//     require("test.php");
// } else {
//     require("install/database_Connection.php");
//     rewriteUrl("/ncms-system/install/");
// }
