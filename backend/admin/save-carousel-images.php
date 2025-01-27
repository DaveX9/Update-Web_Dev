<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Directory to save uploaded images
    $uploadDir = 'uploads/carousel/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }

    $carouselData = []; // Array to store carousel data

    // Loop through POST data to process each slide
    foreach ($_POST as $key => $value) {
        if (preg_match('/carousel_image_(\d+)/', $key, $matches)) {
            $index = $matches[1];
            $carouselData[$index]['image'] = $value; // Default value, overwritten if file is uploaded
        }

        if (preg_match('/carousel_title_(\d+)/', $key, $matches)) {
            $index = $matches[1];
            $carouselData[$index]['title'] = $value;
        }

        if (preg_match('/carousel_description_(\d+)/', $key, $matches)) {
            $index = $matches[1];
            $carouselData[$index]['description'] = $value;
        }
    }

    // Process uploaded files
    foreach ($_FILES as $key => $file) {
        if (preg_match('/carousel_image_(\d+)/', $key, $matches)) {
            $index = $matches[1];
            if ($file['error'] === UPLOAD_ERR_OK) {
                $fileName = basename($file['name']);
                $filePath = $uploadDir . $fileName;
                move_uploaded_file($file['tmp_name'], $filePath);
                $carouselData[$index]['image'] = $filePath;
            }
        }
    }

    // Save the carousel data to a JSON file
    $dataFile = 'carousel-data.json';
    file_put_contents($dataFile, json_encode(array_values($carouselData), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo json_encode(['status' => 'success', 'message' => 'Carousel data saved successfully!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
