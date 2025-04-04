<?php
header('Content-Type: application/json');
include 'db.php';

$texts = [];
$backgrounds = [];

// ดึงข้อความทั้งหมด
$textQuery = $conn->query("SELECT * FROM hero_texts ORDER BY id ASC");
while ($row = $textQuery->fetch_assoc()) {
    $texts[] = [
        "title" => $row['title'],
        "subtitle" => $row['subtitle']
    ];
}

// ดึงภาพทั้งหมด
$bgQuery = $conn->query("SELECT image_url FROM hero_backgrounds ORDER BY id ASC");
while ($row = $bgQuery->fetch_assoc()) {
    $image_url = $row['image_url'];

    if (strpos($image_url, '/') === 0) {
        // เริ่มต้นด้วย / → ใช้ตรงๆ
        $full_url = $image_url;
    } elseif (strpos($image_url, 'panel/') === 0) {
        // เริ่มด้วย panel/ → เติม backend
        $full_url = "/HOMESPECTOR/backend/" . $image_url;
    } elseif (strpos($image_url, 'uploads/') === 0) {
        // เริ่มด้วย uploads/ → เติม backend/panel
        $full_url = "/HOMESPECTOR/backend/panel/" . $image_url;
    } else {
        // ไม่ขึ้นต้นอะไรเลย → สมมุติว่าอยู่ใน uploads/
        $full_url = "/HOMESPECTOR/backend/panel/uploads/" . $image_url;
    }

    $backgrounds[] = $full_url;
}

echo json_encode([
    "texts" => $texts,
    "backgrounds" => $backgrounds
]);
