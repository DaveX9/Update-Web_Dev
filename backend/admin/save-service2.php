<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servicesData = [
        'service_title' => $_POST['service_title'],
        'service_description' => $_POST['service_description'],
        'service_features' => $_POST['service_features'], // New Features
    ];

    file_put_contents('services-data.json', json_encode($servicesData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    $uploadDir = 'uploads/';

    // Save banner
    if (!empty($_FILES['banner_image']['tmp_name'])) {
        move_uploaded_file($_FILES['banner_image']['tmp_name'], $uploadDir . 'banner.jpg');
    }

    // Save carousel
    foreach ($_FILES['carousel_images']['tmp_name'] as $key => $tmpName) {
        if (!empty($tmpName)) {
            $fileName = 'carousel_' . ($key + 1) . '.jpg';
            move_uploaded_file($tmpName, $uploadDir . $fileName);
        }
    }

    echo json_encode(['message' => 'Content saved successfully!']);
}
?>
