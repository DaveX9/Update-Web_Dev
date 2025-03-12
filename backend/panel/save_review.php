<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $developer = $_POST['developer'];
    $headline = $_POST['headline'];
    $short_detail = $_POST['short_detail'];
    $review_detail = $_POST['review_detail'];

    // Define the uploads directory
    $uploadDir = __DIR__ . "/uploads/"; // Absolute path to uploads folder

    // Ensure the directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the uploads folder if it doesn't exist
    }

    $thumbnailPath = null;
    $facebookSharePath = null;

    // Handle Thumbnail Upload
    if (!empty($_FILES['thumbnail']['name'])) {
        $thumbnailName = basename($_FILES['thumbnail']['name']);
        $thumbnailPath = "uploads/" . $thumbnailName;
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadDir . $thumbnailName);
    }

    // Handle Facebook Share Image Upload
    if (!empty($_FILES['facebook_share']['name'])) {
        $facebookShareName = basename($_FILES['facebook_share']['name']);
        $facebookSharePath = "uploads/" . $facebookShareName;
        move_uploaded_file($_FILES['facebook_share']['tmp_name'], $uploadDir . $facebookShareName);
    }

    // Prepare the SQL statement using MySQLi
    $stmt = $conn->prepare("INSERT INTO home_reviews (developer, headline, short_detail, review_detail, thumbnail, facebook_share) 
                            VALUES (?, ?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("ssssss", $developer, $headline, $short_detail, $review_detail, $thumbnailPath, $facebookSharePath);

    // Execute the query
    if ($stmt->execute()) {
        echo "Review saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
