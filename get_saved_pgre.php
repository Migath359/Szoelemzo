<?php
require_once "config_for_postgre.php";
$conn = getPGConnection();
$result = pg_query($conn, "SELECT * FROM articles ORDER BY id DESC");
$articles = [];

while ($row = pg_fetch_assoc($result)) {
    $articles[] = [
        "title" => $row["title"],
        "desc" => $row["description"],
        "url" => $row["url"],
        "source" => $row["source"],
        "date" => $row["date"],
        "image" => $row["image"]
    ];
}

header('Content-Type: application/json');
echo json_encode(["articles" => $articles]);
pg_close($conn);
?>