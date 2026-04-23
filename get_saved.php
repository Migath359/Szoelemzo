<?php
    $db = new SQLite3('news_database.db');
    $result = $db->query("SELECT * FROM articles ORDER BY id DESC");
    $articles = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $articles[] = [
            "title" => $row["title"],
            "desc" => $row["description"],
            "url" => $row["url"],
            "source" => $row["source"],
            "date" => $row["date"]
        ];
    }
    header('Content-Type: application/json');
    echo json_encode(["articles" => $articles]);
?>