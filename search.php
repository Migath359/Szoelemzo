<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $query = urlencode($_POST["query"]);
    $apiKey = " ";
    $maxArticles = 35;

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
    if (isset($data["articles"]) && is_array($data["articles"])) {
        foreach ($data["articles"] as $article) {
            $articles[] = [
                "title" => !empty($article["title"]) ? $article["title"] : "No title",
                "desc" => !empty($article["description"]) ? $article["description"] : "No description",
                "url" => !empty($article["url"]) ? $article["url"] : "#",
                "image" => !empty($article["urlToImage"]) ? $article["urlToImage"] : "",
                "source" => isset($article["source"]["name"]) ? $article["source"]["name"] : "Unknown",
                "date" => !empty($article["publishedAt"]) ? $article["publishedAt"] : ""
            ];
        }
    }
    header('Content-Type: application/json');
    echo json_encode(["articles" => $articles]);
}
?>