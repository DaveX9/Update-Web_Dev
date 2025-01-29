<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';

    // Create Upload Directory if Not Exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    function uploadImage($file, $uploadDir) {
        if (!empty($file['name'])) {
            $fileName = time() . "_" . basename($file['name']);
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                return $filePath;
            }
        }
        return '';
    }

    // Article Data
    $articleData = [
        'title' => $_POST['article_title'] ?? 'Default Title',
        'short_detail' => $_POST['article_short_detail'] ?? '',
        'detail' => $_POST['article_detail'] ?? '',
        'thumbnail' => !empty($_FILES['article_thumbnail']['name']) ? uploadImage($_FILES['article_thumbnail'], $uploadDir) : '',
    ];

    // Carousel Data
    $carousel = [];

    if (isset($_POST['carousel_titles'])) {
        foreach ($_POST['carousel_titles'] as $index => $title) {
            $imagePath = '';

            if (!empty($_FILES['carousel_images']['name'][$index])) {
                $imagePath = uploadImage([
                    'name' => $_FILES['carousel_images']['name'][$index],
                    'tmp_name' => $_FILES['carousel_images']['tmp_name'][$index]
                ], $uploadDir);
            }

            $carousel[] = [
                'title' => $title,
                'image' => $imagePath ?: 'default.jpg',
            ];
        }
    }

    // Save Data
    file_put_contents('article_data.json', json_encode($articleData, JSON_PRETTY_PRINT));
    file_put_contents('articles_carousel.json', json_encode(['carousel' => $carousel], JSON_PRETTY_PRINT));

    echo json_encode(['success' => true, 'message' => 'Article & Carousel updated successfully!', 'data' => ['article' => $articleData, 'carousel' => $carousel]]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid request.']);
exit;
?>
