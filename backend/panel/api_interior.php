<?php
header('Content-Type: application/json');

// Connect DB
$conn = new mysqli("localhost", "root", "", "homespector");
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

// Thumbnail path prefix
$thumbnailPathPrefix = '/HOMESPECTOR/backend/panel/uploads/';

// Query เฉพาะรีวิวใหม่ที่เพิ่มจาก add_interior1 (id >= 10)
$query = "
    SELECT hr.*, d.name_en AS developer_name 
    FROM interior_reviews1 hr 
    JOIN interior_developer1 d ON hr.developer_id = d.id 
    WHERE hr.id >= 10
    ORDER BY hr.created_at DESC
";

$result = $conn->query($query);
$reviews = [];

while ($row = $result->fetch_assoc()) {
    // Clean path thumbnail
    $filename = str_replace('uploads/', '', trim($row['thumbnail']));
    $thumbnail = $thumbnailPathPrefix . $filename;

    $id = (int)$row['id'];

    $reviews[] = [
        "id" => $id,
        "headline" => $row['headline'],
        "thumbnail" => $thumbnail,
        "developer_name" => $row['developer_name'],
        "category" => $row['developer_name'], // ใช้เป็น category filter ได้
        "url" => "/HOMESPECTOR/homepage/after_review_interior10.php?id=$id"
    ];
}

// Return JSON
echo json_encode($reviews);
?>
