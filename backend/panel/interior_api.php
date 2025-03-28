<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "homespector");
if ($conn->connect_error) die(json_encode(['error' => 'DB Connection Failed']));

$upload_path = "/HOMESPECTOR/img/after_review/";

// ✅ Fetch Interior Review
$review = $conn->query("SELECT * FROM interior_review WHERE id = 1")->fetch_assoc();

// ✅ Fetch Images
$images = [];
$image_result = $conn->query("SELECT * FROM interior_images WHERE review_id = 1");
if ($image_result) {
    while ($img = $image_result->fetch_assoc()) {
        $img['image_path'] = $upload_path . $img['image_path'];
        $images[] = $img;
    }
}

// ✅ Fetch Videos
$videos = [];
$video_result = $conn->query("SELECT * FROM interior_videos ORDER BY sort_order ASC");
if ($video_result) {
    $videos = $video_result->fetch_all(MYSQLI_ASSOC);
}

// ✅ Return JSON
echo json_encode([
    'review' => $review,
    'images' => $images,
    'videos' => $videos
]);
