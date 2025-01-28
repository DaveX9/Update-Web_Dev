<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save contact information
    $contactData = [
        'company_name' => $_POST['company_name'],
        'description' => $_POST['description'],
        'contact_admin' => $_POST['contact_admin'],
        'contact_thep' => $_POST['contact_thep'],
        'contact_mes' => $_POST['contact_mes'],
        'address' => $_POST['address'],
        'facebook_link' => $_POST['facebook_link'],
        'instagram_link' => $_POST['instagram_link'],
        'line_link' => $_POST['line_link'],
    ];

    file_put_contents('contact-data.json', json_encode($contactData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Save carousel images
    $uploadDir = 'uploads/carousel/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($_FILES['carousel_images']['tmp_name'] as $key => $tmpName) {
        if (!empty($tmpName)) {
            $fileName = basename($_FILES['carousel_images']['name'][$key]);
            move_uploaded_file($tmpName, $uploadDir . $fileName);
        }
    }

    echo json_encode(['message' => 'Content saved successfully!']);
} else {
    echo json_encode(['message' => 'Invalid request method!']);
}
?>
