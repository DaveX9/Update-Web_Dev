<?php
header('Content-Type: application/json');

$reviewsFile = 'reviews_data.json';

// Create file if not exists
if (!file_exists($reviewsFile)) {
    file_put_contents($reviewsFile, json_encode(["reviews" => []]));
}

// Load existing reviews
$reviewsData = json_decode(file_get_contents($reviewsFile), true);
$reviews = $reviewsData['reviews'];

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newReviews = [];

    // Handle uploaded images
    foreach ($_POST['review_titles'] as $index => $title) {
        $category = $_POST['review_categories'][$index];
        $imagePath = isset($reviews[$index]['image']) ? $reviews[$index]['image'] : ""; // Keep existing image

        // Handle file upload
        if (isset($_FILES['review_images']['name'][$index]) && $_FILES['review_images']['error'][$index] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/reviews/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Create directory if not exists
            }
            $imageName = time() . '_' . basename($_FILES['review_images']['name'][$index]);
            $imagePath = $uploadDir . $imageName;

            if (!move_uploaded_file($_FILES['review_images']['tmp_name'][$index], $imagePath)) {
                echo json_encode(["success" => false, "message" => "Error uploading image"]);
                exit;
            }
        }

        // Add review to list
        $newReviews[] = [
            "title" => htmlspecialchars($title),
            "category" => htmlspecialchars($category),
            "image" => $imagePath
        ];
    }

    // Save updated data
    file_put_contents($reviewsFile, json_encode(["reviews" => $newReviews], JSON_PRETTY_PRINT));

    echo json_encode(["success" => true, "message" => "Reviews saved successfully"]);
    exit;
}

echo json_encode(["success" => false, "message" => "Invalid request"]);
?>
