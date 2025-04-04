<?php
include 'db.php';

header('Content-Type: application/json');

$result = $conn->query("SELECT * FROM faqs ORDER BY id DESC");

if (!$result) {
    echo json_encode(['error' => $conn->error]);
    http_response_code(500);
    exit;
}

$faqs = [];
while ($row = $result->fetch_assoc()) {
    $faqs[] = $row;
}

echo json_encode($faqs);
?>
