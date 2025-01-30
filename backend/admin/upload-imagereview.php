<?php
header('Content-Type: application/json');

$uploadDir = 'uploads/';

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExtensions)) {
        echo json_encode(['error' => 'Invalid file type. Only JPG, PNG, and GIF are allowed.']);
        exit;
    }

    $newFileName = time() . '_' . basename($file['name']);
    $filePath = $uploadDir . $newFileName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        echo json_encode(['link' => $filePath]); // Froala requires this JSON format
        exit;
    } else {
        echo json_encode(['error' => 'Failed to upload file.']);
        exit;
    }
}

echo json_encode(['error' => 'No file uploaded.']);
exit;
?>
