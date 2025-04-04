<?php
header("Content-Type: application/json");

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "username", "password", "homespector");
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

// ดึงข้อมูลจาก carousel_items + thumbnails
$sql = "SELECT c.*, t.thumbnail_url 
        FROM carousel_items c 
        LEFT JOIN carousel_thumbnails t ON c.id = t.carousel_item_id 
        WHERE c.is_active = 1 
        ORDER BY c.sort_order ASC";

$result = $conn->query($sql);
$carousel = [];

while ($row = $result->fetch_assoc()) {
    // ปรับ path ให้ถูกต้อง (prefix path เต็ม)
    if (!empty($row['image_url']) && !str_starts_with($row['image_url'], '/')) {
        $row['image_url'] = '/HOMESPECTOR/backend/panel/' . $row['image_url'];
    }

    if (!empty($row['thumbnail_url']) && !str_starts_with($row['thumbnail_url'], '/')) {
        $row['thumbnail_url'] = '/HOMESPECTOR/backend/panel/' . $row['thumbnail_url'];
    }

    $carousel[] = $row;
}

echo json_encode($carousel);
$conn->close();
