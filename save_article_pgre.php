<?php
require_once "config_for_postgre.php";
$conn = getPGConnection();
$data = json_decode(file_get_contents("php://input"), true);
$query = "
INSERT INTO articles (title, description, url, source, date, image)
VALUES ($1, $2, $3, $4, $5, $6)
ON CONFLICT (url) DO NOTHING
";

$result = pg_query_params($conn, $query, [
    $data['title'] ?? '',
    $data['desc'] ?? '',
    $data['url'] ?? '',
    $data['source'] ?? '',
    $data['date'] ?? '',
    $data['image'] ?? ''
]);

if ($result) {
    echo json_encode(["status" => "ok"]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => pg_last_error($conn)
    ]);
}
pg_close($conn);
?>