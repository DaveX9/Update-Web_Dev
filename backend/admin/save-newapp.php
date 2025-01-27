<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Directory for uploads
    $uploadDir = 'uploads/newapp/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $newAppData = [
        'header_title' => $_POST['header_title'] ?? '',
        'header_subtitle' => $_POST['header_subtitle'] ?? '',
        'header_description' => $_POST['header_description'] ?? '',
        'cta_text' => $_POST['cta_text'] ?? '',
        'images' => []
    ];

    // Process uploaded images
    foreach ($_FILES as $key => $file) {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $fileName = basename($file['name']);
            $filePath = $uploadDir . $fileName;
            move_uploaded_file($file['tmp_name'], $filePath);

            $newAppData['images'][] = $filePath;
        }
    }

    // Save updated data to a JSON file
    $dataFile = 'newapp-data.json';
    file_put_contents($dataFile, json_encode($newAppData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo json_encode(['status' => 'success', 'message' => 'New application section updated successfully!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
