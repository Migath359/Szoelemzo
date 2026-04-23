<?php
    $db = new SQLite3('news_database.db');
    $db->exec("
    CREATE TABLE IF NOT EXISTS articles (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        description TEXT,
        url TEXT UNIQUE,
        source TEXT,
        date TEXT
    )
    ");
?>