<?php
$json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/.env", true), true);
if ($json["INSTALL_STATE"] === false) {
    require("../../ncms-content/modules/view/render.php");
} else{
    header("Location: ../../");
}
?>