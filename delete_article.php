<?php
    $data = json_decode(file_get_contents("php://input"), true);
    $db = new SQLite3('news_database.db');
    $stmt = $db->prepare("DELETE FROM articles WHERE url = :url");
    $stmt->bindValue(':url', $data['url']);
    $result = $stmt->execute();
    echo json_encode(["status" => "ok"]);
?>