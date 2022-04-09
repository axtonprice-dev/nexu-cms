<?php

function crossReferenceFetch($table, $field, $value, $matchup)
{

    $db = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/ncms-storage/configuration/database_config.json", true), true);
    $conn = mysqli_connect(decryptData($db["hostname"]), decryptData($db["username"]), decryptData($db["password"]), decryptData($db["database"]));
    $sql = "SELECT $field FROM $table WHERE $value='$matchup'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return $row[$field];
        }
    } else {
        return "null";
    }
    $conn->close();
}

function determineReadTime($content)
{
    $words = str_word_count(strip_tags($content));
    $minutes = floor($words / 200) * 2;
    $seconds = floor($words % 200 / (200 / 60));
    $minutes = intval($minutes);
    if ($minutes == 0) {
        return $seconds . " sec";
    } else {
        return $minutes . " min ";
    }
}
