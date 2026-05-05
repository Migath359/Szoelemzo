<?php

function getPGConnection() {
    $host = " ";
    $dbname = " ";
    $user = " ";
    $password = " ";

    $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
    if (!$conn) {
        die(json_encode([
            "status" => "error",
            "message" => "PostgreSQL connection failed"
        ]));
    }
    return $conn;
}
?>