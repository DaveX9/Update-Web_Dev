<?php
header('Content-Type: application/json');

// Define file paths
$episodes_file = 'episodes_data.json';
$carousel_file = 'carousel_data.json';

// Ensure request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $episodes_data = [];
    $carousel_data = [];

    // Ensure uploads directory exists
    $upload_dir = __DIR__ . "/admin/uploads/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // ✅ Handle Episodes Data
    if (isset($_POST['episode_titles'])) {
        foreach ($_POST['episode_titles'] as $index => $title) {
            $imagePath = '';

            // Handle Image Upload
            if (!empty($_FILES['episode_images']['tmp_name'][$index])) {
                $imagePath = '/admin/uploads/' . basename($_FILES['episode_images']['name'][$index]);
                move_uploaded_file($_FILES['episode_images']['tmp_name'][$index], $upload_dir . basename($_FILES['episode_images']['name'][$index]));
            }

            $episodes_data[] = [
                'title' => htmlspecialchars($title),
                'image' => $imagePath,
            ];
        }
    }

    // ✅ Handle Carousel Data
    if (isset($_POST['carousel_titles'])) {
        foreach ($_POST['carousel_titles'] as $index => $title) {
            $imagePath = '';

            // Handle Image Upload
            if (!empty($_FILES['carousel_images']['tmp_name'][$index])) {
                $imagePath = '/admin/uploads/' . basename($_FILES['carousel_images']['name'][$index]);
                move_uploaded_file($_FILES['carousel_images']['tmp_name'][$index], $upload_dir . basename($_FILES['carousel_images']['name'][$index]));
            }

            $carousel_data[] = [
                'title' => htmlspecialchars($title),
                'description' => htmlspecialchars($_POST['carousel_descriptions'][$index]),
                'image' => $imagePath,
            ];
        }
    }

    // ✅ Save Data to JSON Files
    file_put_contents($episodes_file, json_encode($episodes_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    file_put_contents($carousel_file, json_encode($carousel_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo json_encode(["success" => true]);
    exit;
}

// ❌ If No Data Found
echo json_encode(["success" => false, "error" => "No data received"]);
exit;
