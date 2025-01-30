<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    function uploadImage($file, $uploadDir) {
        if (!empty($file['name'])) {
            $filePath = $uploadDir . time() . "_" . basename($file['name']);
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                return $filePath;
            }
        }
        return '';
    }

    // Save Contact Information
    $contactInfo = [
        'phone' => $_POST['contact_phone'] ?? '',
        'line' => $_POST['contact_line'] ?? ''
    ];
    file_put_contents('contact_data.json', json_encode($contactInfo, JSON_PRETTY_PRINT));

    // Save Review Page Heading & Description
    $reviewPage = [
        'heading' => $_POST['review_heading'] ?? '',
        'description' => $_POST['review_description'] ?? ''
    ];
    file_put_contents('review_page.json', json_encode($reviewPage, JSON_PRETTY_PRINT));

    // Save Reviews
    $reviews = [];
    foreach ($_POST['review_titles'] as $index => $title) {
        $imagePath = '';
        if (!empty($_FILES['review_images']['name'][$index])) {
            $imagePath = uploadImage([
                'name' => $_FILES['review_images']['name'][$index],
                'tmp_name' => $_FILES['review_images']['tmp_name'][$index]
            ], $uploadDir);
        }

        $reviews[] = [
            'title' => $title,
            'category' => $_POST['review_categories'][$index],
            'image' => $imagePath ?: 'default.jpg',
        ];
    }

    file_put_contents('reviews_data.json', json_encode(['reviews' => $reviews], JSON_PRETTY_PRINT));

    echo json_encode([
        'success' => true,
        'message' => 'All content updated successfully!',
        'data' => [
            'contact' => $contactInfo,
            'review_page' => $reviewPage,
            'reviews' => $reviews
        ]
    ]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid request.']);
exit;
?>
