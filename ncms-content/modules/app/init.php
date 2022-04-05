<?php
function initCheckStartup()
{
    function randomString($length)
    {
        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    $path = $_SERVER['DOCUMENT_ROOT'];
    $envFile = $path . "/_env.json";
    $encryptionKey = base64_encode(randomString(40));
    if (!file_exists($envFile)) {
        touch($envFile);
    }
    $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_env.json", true), true);
    if ($json["INSTALL_STATE"] == false || filesize($envFile) == 0) {
        $envContents = "INSTALL_KEY=" . $encryptionKey . " \n PRE_INIT_STATE=true \n INSTALL_STATE=false\n ";
        $envContents = json_encode('{ "INSTALL_KEY": "' . $encryptionKey . '","INSTALL_STATE": false }', JSON_PRETTY_PRINT);
        file_put_contents($envFile, json_decode($envContents, JSON_PRETTY_PRINT));
        header("Location: ./ncms-system/install/");
        exit;
    }
}

function initCheckInstallKey()
{
    $json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/_env.json", true), true);
    if ($json["INSTALL_KEY"] == "") {
        header("Location: ./ncms-system/error/?error=install_key_invalid");
        exit;
    }
}

function initCheckDatabase(){
    // check database tables presence
    // check config in config table   
}
?>