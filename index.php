<?php
if($_SERVER["HTTP_CF_CONNECTING_IP"] != "86.2.10.33"){
    die("Quit looking at my discord status!");
}

require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/init.php"); 
require($_SERVER['DOCUMENT_ROOT'] . "/ncms-content/modules/app/compose_init.php");
?>

<h1>Hello world!!</h1>