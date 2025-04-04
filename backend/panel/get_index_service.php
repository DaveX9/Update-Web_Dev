<?php
include 'db.php';

$images = [];
$res = $conn->query("SELECT image_url FROM index_service_hero ORDER BY id ASC");

while ($row = $res->fetch_assoc()) {
    $img = $row['image_url'];
    $images[] = startsWith($img, '/') ? $img : "/HOMESPECTOR/backend/$img";
}

header('Content-Type: application/json');
echo json_encode($images);

function startsWith($haystack, $needle) {
    return substr($haystack, 0, strlen($needle)) === $needle;
}
?>
