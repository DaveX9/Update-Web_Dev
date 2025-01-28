<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save Services Data
    $serviceTitle = $_POST['service_title'];
    $serviceDescription = $_POST['service_description'];
    $contactAdmin = $_POST['contact_admin'];
    $contactThep = $_POST['contact_thep'];
    $contactMes = $_POST['contact_mes'];
    $address = $_POST['address'];
    $facebookLink = $_POST['facebook_link'];
    $instagramLink = $_POST['instagram_link'];
    $lineLink = $_POST['line_link'];

    // Save Banner
    if (isset($_FILES['banner_image']) && $_FILES['banner_image']['error'] === UPLOAD_ERR_OK) {
        $bannerPath = 'uploads/' . basename($_FILES['banner_image']['name']);
        move_uploaded_file($_FILES['banner_image']['tmp_name'], $bannerPath);
    }

    // Save Carousel Images
    if (isset($_FILES['carousel_images'])) {
        foreach ($_FILES['carousel_images']['tmp_name'] as $index => $tmpName) {
            if ($_FILES['carousel_images']['error'][$index] === UPLOAD_ERR_OK) {
                $filePath = 'uploads/' . basename($_FILES['carousel_images']['name'][$index]);
                move_uploaded_file($tmpName, $filePath);
            }
        }
    }

    // Respond with success message
    echo json_encode(['message' => 'Content saved successfully!']);
    exit;
}
?>
