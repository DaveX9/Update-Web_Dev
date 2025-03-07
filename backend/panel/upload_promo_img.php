<?php
include 'db.php'; // Connect to database

// Set the upload directory
$upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/HOMESPECTOR/backend/panel/uploads/";

// Check if the directory exists; if not, create it
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Allowed image file types
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

// Validate if an image is uploaded
if ($_FILES) {
    $file = $_FILES['file'];
    $file_name = basename($file['name']);
    $file_path = $upload_dir . $file_name;
    $web_path = "/HOMESPECTOR/backend/panel/uploads/" . $file_name;

    // Check file type
    if (!in_array($file['type'], $allowed_types)) {
        echo json_encode(['error' => 'Invalid file type. Only JPG, PNG, and GIF allowed.']);
        exit;
    }

    // Check file size (max 2MB)
    if ($file['size'] > 2 * 1024 * 1024) {
        echo json_encode(['error' => 'File is too large. Maximum size is 2MB.']);
        exit;
    }

    // Move the uploaded file
    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        echo json_encode(['link' => $web_path]); // Return the URL for Froala Editor
    } else {
        echo json_encode(['error' => 'File upload failed!']);
    }
} else {
    echo json_encode(['error' => 'No file uploaded.']);
}
?>
