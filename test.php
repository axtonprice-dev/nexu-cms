<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/encryption_Core.php");
$config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/site_config.json", true), true);

echo decryptData("Hy82kAV4MhmpAnNAHWFww3CK0+9sTg8XPjWuheiYrimhPNetprcnffMxQX+a46zeH4g//AwO6M6iNllcjMfo6A==");
// echo $config["admin_email"];