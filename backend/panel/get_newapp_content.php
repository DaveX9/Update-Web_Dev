<?php
include 'db.php';

$result = $conn->query("SELECT content FROM newapp_content WHERE id = 1");
$row = $result->fetch_assoc();

echo json_encode([
    "content" => $row['content'] ?? ""
]);
?>
