<?php
header("Content-Type: application/json");

// Define the JSON file location
$featured_file = 'featured_data.json';

// Load existing data
$featured_data = file_exists($featured_file) ? json_decode(file_get_contents($featured_file), true) : [];

// Get form data
$featured_title = isset($_POST['featured_title']) ? trim($_POST['featured_title']) : $featured_data['title'] ?? "รีวิวตรวจบ้านดารา เซเลบ อินฟลู";
$featured_description = isset($_POST['featured_description']) ? trim($_POST['featured_description']) : $featured_data['description'] ?? "รีวิวการตรวจบ้านเดี่ยว พระเอกดัง!! 'ตงตง เดอะสตาร์'";

// Handle image upload
if (!empty($_FILES['featured_image']['name'])) {
    $upload_dir = 'uploads/'; // Ensure this folder exists and is writable
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create the uploads folder if it doesn't exist
    }

    $file_name = basename($_FILES['featured_image']['name']);
    $file_path = $upload_dir . time() . "_" . $file_name; // Rename to avoid conflicts

    // Validate and move the uploaded file
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($_FILES['featured_image']['type'], $allowed_types)) {
        if (move_uploaded_file($_FILES['featured_image']['tmp_name'], $file_path)) {
            $featured_data['image'] = $file_path;
        } else {
            echo json_encode(["success" => false, "error" => "Image upload failed."]);
            exit;
        }
    } else {
        echo json_encode(["success" => false, "error" => "Invalid image format. Only JPG, PNG, GIF allowed."]);
        exit;
    }
}

// Save updated data
$featured_data['title'] = $featured_title;
$featured_data['description'] = $featured_description;

// Write data back to JSON file
if (file_put_contents($featured_file, json_encode($featured_data, JSON_PRETTY_PRINT))) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "Failed to save data."]);
}
?>
