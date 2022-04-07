<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/init.php");
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/compose_init.php");
?>



    <?php
    $error = $_GET["error"];
    if (!$error) {
        header("Location: ./");
    }

    if ($error == "404") {
        require("templates/404.php");
    }
    if ($error == "500") {
        require("templates/500.php");
    }
    if ($error == "403") {
        require("templates/403.php");
    }
    if ($error == "install_key_invalid") {
        echo "<h1>Invalid installation key!</h1>";
    }
    ?>