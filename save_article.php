<?php
    $data = json_decode(file_get_contents("php://input"), true);
    $db = new SQLite3('news_database.db');
    $stmt = $db->prepare("
        INSERT OR IGNORE INTO articles (title, description, url, source, date)
        VALUES (:title, :desc, :url, :source, :date)
    ");
    $stmt->bindValue(':title', $data['title']);
    $stmt->bindValue(':desc', $data['desc']);
    $stmt->bindValue(':url', $data['url']);
    $stmt->bindValue(':source', $data['source']);
    $stmt->bindValue(':date', $data['date']);
    $result = $stmt->execute();
    echo json_encode(["status" => "ok"]);
?>