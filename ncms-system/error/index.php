<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/init.php");
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/compose_init.php");
?>

<body>

    <?php
    $error = $_GET["error"];
    if (!$error) {
        header("Location: /index.php");
    }

    if ($error == "404") {
        require("templates/404.html");
    }
    if ($error == "500") {
        require("templates/500.html");
    }
    if ($error == "403") {
        require("templates/403.html");
    }
    if ($error == "install_key_invalid") {
        echo "<h1>Invalid installation key!</h1>";
        $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_env.json", true), true);
        if ($json["INSTALL_KEY"] != "") {
            header("Location: ./");
            exit;
        }
    }
    ?>

    <script>
        window.history.pushState("", "", 'index.php');
    </script>
</body>