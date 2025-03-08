<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "homespector";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed."]));
}

// Set upload directory (ensure it matches your server structure)
$upload_folder = "/HOMESPECTOR/backend/panel/uploads/";
$target_dir = $_SERVER['DOCUMENT_ROOT'] . $upload_folder;

// Create folder if it doesn't exist
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Handle image upload request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file_name = basename($_FILES["file"]["name"]);
        $target_file = $target_dir . $file_name;
        $image_url = $upload_folder . $file_name; // Save relative path
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allowed file formats
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_types)) {
            echo json_encode(["error" => "Only JPG, JPEG, PNG, & GIF files are allowed."]);
            exit;
        }

        // Move uploaded file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo json_encode(["link" => $image_url]); // Froala needs a link response
            exit;
        } else {
            echo json_encode(["error" => "File upload failed."]);
            exit;
        }
    }

    // Update content in the database
    if (isset($_POST['section']) && isset($_POST['editorContent'])) {
        $section = $_POST['section'];
        $content = $_POST['editorContent'];

        $stmt = $conn->prepare("UPDATE services SET content = ? WHERE section = ?");
        $stmt->bind_param("ss", $content, $section);
        
        if ($stmt->execute()) {
            echo json_encode(["message" => "Content updated successfully."]);
        } else {
            echo json_encode(["error" => "Failed to update content."]);
        }
        exit;
    }
}

// If no valid request
echo json_encode(["error" => "Invalid request."]);
?>
