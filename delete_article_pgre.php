<?php
require_once "config_for_postgre.php";
$conn = getPGConnection();
$data = json_decode(file_get_contents("php://input"), true);
$result = pg_query_params($conn,
    "DELETE FROM articles WHERE url = $1",
    [$data['url']]
);

echo json_encode(["status" => "ok"]);
pg_close($conn);
?>