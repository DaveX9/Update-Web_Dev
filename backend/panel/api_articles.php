<?php
include 'db.php';

header('Content-Type: application/json');

// ดึงบทความทั้งหมด
$result = $conn->query("SELECT id, title, thumbnail, article_date FROM articles ORDER BY article_date DESC");

$articles = [];
while ($row = $result->fetch_assoc()) {
    $articles[] = $row;
}

echo json_encode($articles);
