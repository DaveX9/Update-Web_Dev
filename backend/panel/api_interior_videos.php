<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "homespector");
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

$videos = [];
// ✅ ใช้ ORDER BY id DESC เพื่อให้วิดีโอล่าสุดอยู่บนสุด
$result = $conn->query("SELECT youtube_link FROM interior_videos ORDER BY id DESC");

while ($row = $result->fetch_assoc()) {
    $videos[] = $row['youtube_link'];
}

echo json_encode($videos);
?>
