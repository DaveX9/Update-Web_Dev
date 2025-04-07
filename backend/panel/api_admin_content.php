<?php
$pdo = new PDO("mysql:host=localhost;dbname=homespector;charset=utf8", "username", "password");

// ดึงหมวดหมู่ทั้งหมด
$categories = $pdo->query("SELECT id, name FROM content_categories ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

// ดึงเฉพาะ content ที่มาจาก admin และ id >= 16
$stmt = $pdo->prepare("SELECT c.*, cat.name AS category_name 
    FROM content_items c 
    LEFT JOIN content_categories cat ON c.category_id = cat.id 
    WHERE c.source = 'admin_content_manager' AND c.id >= 16 
    ORDER BY c.created_at DESC");
$stmt->execute();
$contents = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ส่งออกเป็น JSON
header('Content-Type: application/json');
echo json_encode([
    "categories" => $categories,
    "contents" => $contents
]);
?>
