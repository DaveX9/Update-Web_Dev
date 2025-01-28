<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // Ensure uploads folder exists
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    // Save Contact Information
    $contactPhone = $_POST['contact_phone'] ?? '';
    $contactLine = $_POST['contact_line'] ?? '';

    // Save Promotions
    $promotionTitles = $_POST['promotion_titles'] ?? [];

    $uploadedImages = [];
    if (isset($_FILES['promotion_images'])) {
        foreach ($_FILES['promotion_images']['tmp_name'] as $index => $tmpName) {
            if (!empty($tmpName) && $_FILES['promotion_images']['error'][$index] === UPLOAD_ERR_OK) {
                $filePath = 'uploads/' . uniqid() . '_' . basename($_FILES['promotion_images']['name'][$index]);
                if (move_uploaded_file($tmpName, $filePath)) {
                    $uploadedImages[$index] = $filePath;
                }
            }
        }
    }

    // Ensure every promotion title has a corresponding image (or null)
    $promotions = [];
    foreach ($promotionTitles as $index => $title) {
        $promotions[] = [
            'title' => $title,
            'image' => $uploadedImages[$index] ?? null // Assign null if no image uploaded
        ];
    }

    // Save Description
    $description = $_POST['description'] ?? '';

    // Simulate saving to database (replace with real DB saving logic)
    $response = [
        'contact' => ['phone' => $contactPhone, 'line' => $contactLine],
        'promotions' => $promotions,
        'description' => $description,
    ];

    echo json_encode(['message' => 'Promotions saved successfully!', 'data' => $response]);
    exit;
}
?>
