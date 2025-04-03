<?php
header('Content-Type: application/json');
include 'db.php';

$id = $_GET['id'] ?? 5;

$stmt = $conn->prepare("SELECT * FROM article_view5 WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$stmt->close();
$conn->close();

if (!$article) {
    echo json_encode(["error" => "ไม่พบบทความ"]);
    exit;
}

echo json_encode([
    "id" => $article['id'],
    "caption" => $article['caption_main'],
    "content" => $article['article_html'],
]);
?>
