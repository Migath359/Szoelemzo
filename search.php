<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = urlencode($_POST["query"]);
    $apiKey = " ";

    $maxArticles = 20;

    $url = "https://newsapi.org/v2/everything?q=$query&pageSize=$maxArticles&apiKey=$apiKey";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "User-Agent: MyCyberpunkApp/1.0"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    $articles = [];

    if (isset($data["articles"])) {
        foreach ($data["articles"] as $article) {
            $articles[] = [
                "title" => $article["title"] ?? "No title",
                "desc" => $article["description"] ?? "No description"
            ];
        }
    }

    echo json_encode(["articles" => $articles]);
}
?>