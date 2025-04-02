<?php
header('Content-Type: application/json');
include 'db.php';

if (!$conn) {
    echo json_encode(["error" => "DB connection failed"]);
    exit;
}

// ดึงบทความบทความที่เพิ่มจาก add_article พร้อเบียบ category ด้วย LEFT JOIN
$sql = "
    SELECT a.id, a.title, a.short_description, a.thumbnail, a.article_date, c.name_en AS category
    FROM articles a
    LEFT JOIN article_categories c ON a.category_id = c.id
    WHERE a.id >= 11
    ORDER BY a.article_date DESC
";

$result = $conn->query($sql);
$articles = [];

while ($row = $result->fetch_assoc()) {
    $row['thumbnail'] = '/HOMESPECTOR/backend/panel/' . ltrim($row['thumbnail'], '/');
    $articles[] = $row;
}

echo json_encode($articles);
