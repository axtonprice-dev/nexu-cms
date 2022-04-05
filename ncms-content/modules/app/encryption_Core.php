<?php
function str_encryptaesgcm($plaintext, $password, $encoding = null)
{
    if ($plaintext != null && $password != null) {
        $keysalt = openssl_random_pseudo_bytes(16);
        $key = hash_pbkdf2("sha512", $password, $keysalt, 20000, 32, true);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-gcm"));
        $tag = "";
        $encryptedstring = openssl_encrypt($plaintext, "aes-256-gcm", $key, OPENSSL_RAW_DATA, $iv, $tag, "", 16);
        return $encoding == "hex" ? bin2hex($keysalt . $iv . $encryptedstring . $tag) : ($encoding == "base64" ? base64_encode($keysalt . $iv . $encryptedstring . $tag) : $keysalt . $iv . $encryptedstring . $tag);
    }
}

function str_decryptaesgcm($encryptedstring, $password, $encoding = null)
{
    if ($encryptedstring != null && $password != null) {
        $encryptedstring = $encoding == "hex" ? hex2bin($encryptedstring) : ($encoding == "base64" ? base64_decode($encryptedstring) : $encryptedstring);
        $keysalt = substr($encryptedstring, 0, 16);
        $key = hash_pbkdf2("sha512", $password, $keysalt, 20000, 32, true);
        $ivlength = openssl_cipher_iv_length("aes-256-gcm");
        $iv = substr($encryptedstring, 16, $ivlength);
        $tag = substr($encryptedstring, -16);
        return openssl_decrypt(substr($encryptedstring, 16 + $ivlength, -16), "aes-256-gcm", $key, OPENSSL_RAW_DATA, $iv, $tag);
    }
}

// $enc = str_encryptaesgcm("mysecretText", $json["INSTALL_KEY"], "base64"); // return a base64 encrypted string, you can also choose hex or null as encoding.
// $dec = str_decryptaesgcm($enc, $json["INSTALL_KEY"], "base64");

function encryptData($data)
{
    $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_env.json", true), true);
    return str_encryptaesgcm($data, $json["INSTALL_KEY"], "base64");
}
function decryptData($data)
{
    $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_env.json", true), true);
    return str_decryptaesgcm($data, $json["INSTALL_KEY"], "base64");
}
?>