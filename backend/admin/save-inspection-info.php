<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Directory to save uploaded images
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Handle Image Upload
    $imagePath = null;
    if (isset($_FILES['inspection_image']) && $_FILES['inspection_image']['error'] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES['inspection_image']['name']);
        $imagePath = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES['inspection_image']['tmp_name'], $imagePath)) {
            echo 'Error saving uploaded image.';
            exit;
        }
    }

    // Get other form data
    $title = $_POST['inspection_title'] ?? 'No Title';
    $description = $_POST['inspection_description'] ?? 'No Description';
    $buttonText = $_POST['button_text'] ?? 'See Details';

    // Save data to a JSON file (or database if required)
    $data = [
        'title' => $title,
        'description' => $description,
        'button_text' => $buttonText,
        'image' => $imagePath ?? '/HOMESPECTOR/img/how.png', // Fallback to default image
    ];

    file_put_contents('inspection-info.json', json_encode($data, JSON_PRETTY_PRINT));
    echo 'Inspection Info saved successfully!';
}
?>
