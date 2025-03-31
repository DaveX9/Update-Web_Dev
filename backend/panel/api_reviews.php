<?php
header('Content-Type: application/json');

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "homespector");
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

// Prefix สำหรับ path รูปภาพ
$thumbnailPathPrefix = '/HOMESPECTOR/backend/panel/uploads/';

// ✅ ดึงข้อมูลรีวิว และชื่อ Developer
$query = "SELECT hr.*, d.name_en AS developer_name 
            FROM home_reviews hr 
            JOIN review_developer d ON hr.developer_id = d.id 
            WHERE hr.id >= 10 
            ORDER BY hr.sort_order DESC"; // 🔁 เรียงจากล่าสุด

$result = $conn->query($query);
$reviews = [];

while ($row = $result->fetch_assoc()) {
    // เคลียร์ path รูป thumbnail
    $filename = str_replace('uploads/', '', trim($row['thumbnail']));
    $thumbnail = $thumbnailPathPrefix . $filename;

    $id = (int) $row['id'];
    $url = "/HOMESPECTOR/Homepage/after_review_home10.php?id={$id}";

    $reviews[] = [
        "id" => $id,
        "headline" => $row['headline'],
        "thumbnail" => $thumbnail,
        "developer_name" => $row['developer_name'],
        "category" => $row['developer_name'], // ✅ ใช้ชื่อ Developer เป็น Category
        "url" => $url
    ];
}

echo json_encode($reviews);
?>
