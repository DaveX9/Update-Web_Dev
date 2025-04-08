<?php
include 'db.php';

header('Content-Type: application/json');

// ดึงข้อมูลจาก DB
$result = $conn->query("SELECT * FROM line_section WHERE id = 1");
$row = $result->fetch_assoc();

echo json_encode([
    'phone_number' => $row['phone_number'],
    'line_id' => $row['line_id']
]);
?>
