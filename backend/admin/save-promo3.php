<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // Create uploads directory if it doesn't exist
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $contactPhone = $_POST['contact_phone'] ?? '';
    $contactLine = $_POST['contact_line'] ?? '';
    $promotionTitles = $_POST['promotion_titles'] ?? [];
    $description = $_POST['description'] ?? '';

    // Collect Data
    $data = [
        'contact' => ['phone' => $contactPhone, 'line' => $contactLine],
        'promotions' => [],
        'description' => $description,
    ];

    foreach ($promotionTitles as $index => $title) {
        $data['promotions'][] = ['title' => $title, 'image' => null];
    }

    // Save Data to a File
    file_put_contents('saved_promotions.json', json_encode($data, JSON_PRETTY_PRINT));

    echo json_encode(['message' => 'Promotions saved successfully!', 'data' => $data]);
    exit;
}
?>
