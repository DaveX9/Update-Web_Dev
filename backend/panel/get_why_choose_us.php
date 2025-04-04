<?php
header('Content-Type: application/json');
include 'db.php';

$result = $conn->query("SELECT content FROM why_choose_us LIMIT 1");
$row = $result->fetch_assoc();

echo json_encode([
    "content" => $row['content'] ?? ""
]);
