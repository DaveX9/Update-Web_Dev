<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save Header Data
    $promotionTitle = $_POST['promotion_title'];
    $promotionSubtitle = $_POST['promotion_subtitle'];

    // Save Promotion Cards Data
    $promotionTitles = $_POST['promotion_titles'];

    $uploadedImages = [];
    if (isset($_FILES['promotion_images'])) {
        foreach ($_FILES['promotion_images']['tmp_name'] as $index => $tmpName) {
            if ($_FILES['promotion_images']['error'][$index] === UPLOAD_ERR_OK) {
                $filePath = 'uploads/' . basename($_FILES['promotion_images']['name'][$index]);
                move_uploaded_file($tmpName, $filePath);
                $uploadedImages[] = $filePath;
            }
        }
    }

    // Simulate saving to database (replace this with actual DB saving logic)
    $response = [
        'title' => $promotionTitle,
        'subtitle' => $promotionSubtitle,
        'promotions' => array_map(function ($title, $image) {
            return ['title' => $title, 'image' => $image];
        }, $promotionTitles, $uploadedImages),
    ];

    echo json_encode(['message' => 'Promotions saved successfully!', 'data' => $response]);
    exit;
}
?>
