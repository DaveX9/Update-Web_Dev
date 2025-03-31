<?php
if ($_FILES['file']['name']) {
    $filename = time() . '_' . basename($_FILES['file']['name']);

    $uploadDir = __DIR__ . '/uploads/';
    $filepath = $uploadDir . $filename;

    // สร้างโฟลเดอร์ถ้ายังไม่มี
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) {
        echo json_encode([
            'link' => '/HOMESPECTOR/backend/panel/uploads/' . $filename
        ]);
    } else {
        echo json_encode(['error' => 'File upload failed']);
    }
}
?>
