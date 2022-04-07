<?php

function crossReferenceFetch($table, $column, $value) {

    $db = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", true), true);
    $con = mysqli_connect(decryptData($db["hostname"]), decryptData($db["username"]), decryptData($db["password"]), decryptData($db["database"]));

    $query = "SELECT * FROM $table WHERE $column = '$value'";
    $results = mysqli_query($con, $query);
    $row_count = mysqli_num_rows($results);

    if ($row_count > 0) {
        $row = mysqli_fetch_array($results);
        return $row["post_id"];
    } else {
        return false;
    }
    
}