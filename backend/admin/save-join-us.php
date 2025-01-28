<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ['success' => false];

    // Save Text Fields
    $joinTitle = $_POST['join_title'] ?? '';
    $joinDescription = $_POST['join_description'] ?? '';
    $joinButton = $_POST['join_button'] ?? '';

    // Save Image (if uploaded)
    $imagePath = null;
    if (isset($_FILES['join_image']) && $_FILES['join_image']['error'] === UPLOAD_ERR_OK) {
        $uploadsDir = 'uploads/';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }
        $imagePath = $uploadsDir . basename($_FILES['join_image']['name']);
        move_uploaded_file($_FILES['join_image']['tmp_name'], $imagePath);
    }

    // Example: Save to Database or File (implement your logic here)
    // Simulating save operation
    $response['success'] = true;
    if ($imagePath) {
        $response['image_url'] = $imagePath;
    }

    echo json_encode($response);
    exit;
}
?>
