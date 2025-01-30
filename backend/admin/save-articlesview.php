<?php
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define the upload directory
    $uploadDir = 'uploads/';

    // Create the upload directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    /**
     * Upload an image file to the server.
     *
     * @param array $file The file data from $_FILES.
     * @param string $uploadDir The directory to save the file.
     * @return string The file path if successful, otherwise an empty string.
     */
    function uploadImage($file, $uploadDir) {
        if (!empty($file['name'])) {
            // Generate a unique file name
            $fileName = time() . "_" . basename($file['name']);
            $filePath = $uploadDir . $fileName;

            // Move the uploaded file to the upload directory
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                return $filePath;
            }
        }
        return '';
    }

    // Process Article Data
    $articleData = [
        'title' => $_POST['article_title'] ?? 'Default Title',
        'short_detail' => $_POST['article_short_detail'] ?? '',
        'detail' => $_POST['article_detail'] ?? '',
        'thumbnail' => !empty($_FILES['article_thumbnail']['name']) ? uploadImage($_FILES['article_thumbnail'], $uploadDir) : '',
    ];

    // Process Carousel Data
    $carousel = [];

    if (isset($_POST['carousel_titles'])) {
        foreach ($_POST['carousel_titles'] as $index => $title) {
            $imagePath = '';

            // Check if an image was uploaded for this carousel item
            if (!empty($_FILES['carousel_images']['name'][$index])) {
                $imagePath = uploadImage([
                    'name' => $_FILES['carousel_images']['name'][$index],
                    'tmp_name' => $_FILES['carousel_images']['tmp_name'][$index]
                ], $uploadDir);
            }

            // Add the carousel item to the array
            $carousel[] = [
                'title' => $title,
                'image' => $imagePath ?: 'default.jpg', // Use a default image if no image was uploaded
            ];
        }
    }

    // Save Article Data to JSON File
    file_put_contents('article_data.json', json_encode($articleData, JSON_PRETTY_PRINT));

    // Save Carousel Data to JSON File
    file_put_contents('articles_carousel.json', json_encode(['carousel' => $carousel], JSON_PRETTY_PRINT));

    // Return a success response
    echo json_encode([
        'success' => true,
        'message' => 'Article & Carousel updated successfully!',
        'data' => [
            'article' => $articleData,
            'carousel' => $carousel,
        ],
    ]);
    exit;
}

// Return an error response if the request method is not POST
echo json_encode([
    'success' => false,
    'message' => 'Invalid request.',
]);
exit;
?>