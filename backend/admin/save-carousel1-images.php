<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Directory for saving images
    $uploadDir = 'uploads/carousel/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $carouselImages = [];

    // Process uploaded images
    foreach ($_FILES as $key => $file) {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $fileName = basename($file['name']);
            $filePath = $uploadDir . $fileName;
            move_uploaded_file($file['tmp_name'], $filePath);

            $carouselImages[] = $filePath;
        }
    }

    // Save updated carousel data to JSON file
    $dataFile = 'carousel-data.json';
    file_put_contents($dataFile, json_encode($carouselImages, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo json_encode(['status' => 'success', 'message' => 'Carousel images updated successfully!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
