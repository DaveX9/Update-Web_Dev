<?php
if ($_FILES['file']['name']) {
    $filename = time() . '_' . basename($_FILES['file']['name']);

    // Path ไปยังโฟลเดอร์อัปโหลดจริง
    $uploadDir = __DIR__ . '/uploads/';
    $filepath = $uploadDir . $filename;

    // สร้างโฟลเดอร์หากยังไม่มี
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // ย้ายไฟล์จาก tmp ไปยัง uploads/
    if (move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) {
        // ส่ง path กลับให้ Froala ใช้แสดงภาพ
        echo json_encode([
            'link' => '/HOMESPECTOR/backend/panel/uploads/' . $filename
        ]);
    } else {
        echo json_encode(['error' => 'File upload failed']);
    }
}
?>
