<?php
header('Content-Type: application/json'); // Set response header as JSON
include 'db.php';

// Check if connection is set
if (!isset($conn)) {
    echo json_encode(["error" => "Database connection is not available."]);
    exit;
}

// Fetch the latest reviews
$query = "SELECT id, headline, short_detail, thumbnail, review_detail FROM home_reviews ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($query);

if (!$result) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit;
}

// Fetch data as an array
$reviews = [];
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

// Return JSON response
echo json_encode($reviews);
?>
