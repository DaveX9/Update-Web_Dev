<?php
header('Content-Type: application/json');

$videoFile = 'video_content.json';
$uploadDir = 'uploads/videos/';

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$videoData = json_decode(file_get_contents($videoFile), true);
$videos = isset($videoData['videos']) ? $videoData['videos'] : [];

$featuredVideo = [
    "title" => $_POST['featured_title'],
    "description" => $_POST['featured_desc'],
    "youtube_url" => $_POST['featured_url']
];

$newVideos = [];
foreach ($_POST['video_titles'] as $index => $title) {
    $newVideos[] = [
        "title" => $title,
        "category" => $_POST['video_categories'][$index],
        "youtube_url" => $_POST['video_urls'][$index],
        "tags" => $_POST['video_tags'][$index],
        "image" => $_FILES['video_images']['name'][$index] ? $uploadDir . $_FILES['video_images']['name'][$index] : $videos[$index]['image']
    ];
}

file_put_contents($videoFile, json_encode(["featured" => $featuredVideo, "videos" => $newVideos], JSON_PRETTY_PRINT));

echo json_encode(["success" => true]);
exit;
?>
