<?php
if (strpos($_SERVER['REQUEST_URI'], "ncms-system/install") == false) {
    if (strpos($_SERVER['REQUEST_URI'], "ncms-system/error") == false) {
        initCheckStartup();
        initCheckInstallKey();
    }
}
?>