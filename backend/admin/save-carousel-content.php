<?php
header('Content-Type: application/json');

$contentFile = 'content_data.json';
$uploadDir = 'uploads/content/';

// Ensure the upload directory exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Create file if it doesn't exist
if (!file_exists($contentFile)) {
    file_put_contents($contentFile, json_encode(["contact" => [], "content" => []], JSON_PRETTY_PRINT));
}

// Load existing content
$contentData = json_decode(file_get_contents($contentFile), true);
$contactInfo = isset($contentData['contact']) ? $contentData['contact'] : [];
$contents = isset($contentData['content']) ? $contentData['content'] : [];

// Process contact information
if (isset($_POST['contact_phone']) && isset($_POST['contact_line'])) {
    $contactInfo = [
        "phone" => htmlspecialchars($_POST['contact_phone']),
        "line" => htmlspecialchars($_POST['contact_line']),
    ];
}

// Process content
$newContents = [];
foreach ($_POST['content_titles'] as $index => $title) {
    $category = $_POST['content_categories'][$index];
    $imagePath = isset($contents[$index]['image']) ? $contents[$index]['image'] : ""; // Keep existing image

    // Handle file upload
    if (isset($_FILES['content_images']['name'][$index]) && $_FILES['content_images']['error'][$index] === UPLOAD_ERR_OK) {
        $imageName = time() . '_' . basename($_FILES['content_images']['name'][$index]);
        $imagePath = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES['content_images']['tmp_name'][$index], $imagePath)) {
            echo json_encode(["success" => false, "message" => "Error uploading image"]);
            exit;
        }
    }

    // Add new content entry
    $newContents[] = [
        "title" => htmlspecialchars($title),
        "category" => htmlspecialchars($category),
        "image" => $imagePath
    ];
}

// Save updated data
file_put_contents($contentFile, json_encode(["contact" => $contactInfo, "content" => $newContents], JSON_PRETTY_PRINT));

echo json_encode(["success" => true, "message" => "Content saved successfully"]);
exit;
?>
