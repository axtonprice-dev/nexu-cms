<?php
function encryptData($str)
{
    $config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_env.json", true), true);
    $key = $config["INSTALL_KEY"];
    $pass1 = openssl_encrypt($str, "AES-128-ECB", $key);
    $pass2 = utf8_encode($pass1);
    $pass3 = base64_encode($pass2);
    return $pass3;
}
function decryptData($str)
{
    $config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_env.json", true), true);
    $key = $config["INSTALL_KEY"];
    $pass3 = base64_decode($str);
    $pass2 = utf8_decode($pass3);
    $pass1 = openssl_decrypt($pass2, "AES-128-ECB", $key);
    return $pass1;
}
?>