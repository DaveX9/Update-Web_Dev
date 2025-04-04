<?php
include 'db.php';

// Fetch review texts
$text = $conn->query("SELECT * FROM index_review_texts LIMIT 1")->fetch_assoc();

// Fetch stats
$stats = [];
$result = $conn->query("SELECT * FROM index_review_stats");
while ($row = $result->fetch_assoc()) {
    $stats[] = $row;
}

// Return as JSON
echo json_encode([
    'text' => $text,
    'stats' => $stats
]);
?>
