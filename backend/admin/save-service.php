<?php
include 'config.php'; // Database connection

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $company_name = $_POST['company_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $contact_admin = $_POST['contact_admin'] ?? '';
    $contact_thep = $_POST['contact_thep'] ?? '';
    $contact_mes = $_POST['contact_mes'] ?? '';
    $address = $_POST['address'] ?? '';
    $facebook_link = $_POST['facebook_link'] ?? '';
    $instagram_link = $_POST['instagram_link'] ?? '';
    $line_link = $_POST['line_link'] ?? '';

    // Update Contact Information in DB
    $sql = "UPDATE contact_info SET 
        company_name=?, description=?, contact_admin=?, contact_thep=?, contact_mes=?, 
        address=?, facebook_link=?, instagram_link=?, line_link=? 
        WHERE id=1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $company_name, $description, $contact_admin, $contact_thep, $contact_mes, $address, $facebook_link, $instagram_link, $line_link);

    if ($stmt->execute()) {
        $response = ['status' => 'success', 'message' => 'Contact information updated successfully.'];
    } else {
        $response = ['status' => 'error', 'message' => 'Failed to update contact information.'];
    }

    // Handle Carousel Image Upload
    if (!empty($_FILES['carousel_images']['name'][0])) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

        foreach ($_FILES['carousel_images']['tmp_name'] as $index => $tmpName) {
            $fileName = basename($_FILES['carousel_images']['name'][$index]);
            $filePath = $upload_dir . $fileName;

            if (move_uploaded_file($tmpName, $filePath)) {
                $sql = "INSERT INTO carousel_images (image_path) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $filePath);
                $stmt->execute();
            }
        }
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
