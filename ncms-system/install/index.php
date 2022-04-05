<?php
$json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_env.json", true), true);
if ($json["INSTALL_STATE"] === false) {
    $_COOKIE["installerPage"] = "0";
    if(!$_COOKIE["installerPage"]){
        setcookie("installerPage", "0", time() + (86400 * 30), "/");
    }
    require("../../ncms-content/modules/view/render.php");
} else{
    header("Location: ../../");
}
?>