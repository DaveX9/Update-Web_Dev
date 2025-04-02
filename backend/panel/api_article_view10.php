<?php
header('Content-Type: application/json');
include 'db.php';

$id = $_GET['id'] ?? 10;

if (!$id) {
    echo json_encode(["error" => "Missing ID"]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM article_view10 WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$stmt->close();
$conn->close();

if (!$article) {
    echo json_encode(["error" => "Article not found"]);
    exit;
}

echo json_encode([
    "id" => $article['id'],
    "title" => $article['title'],
    "caption" => $article['caption_main'],
    "tags" => $article['tags'],
    "content" => $article['article_html'],
]);
?>
