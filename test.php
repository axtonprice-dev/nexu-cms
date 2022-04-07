<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/configuration_Functions.php");
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/encryption_Core.php");

$config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", true), true);
echo decryptData("QlFweHROL3VtWE51cmNNMkNrMG81dz09");