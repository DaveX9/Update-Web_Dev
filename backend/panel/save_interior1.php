<?php
include 'db.php';

// Handle file upload
function uploadImage($fileInput) {
    if (!empty($_FILES[$fileInput]['name'])) {
        $uploadDir = __DIR__ . "/uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = time() . "_" . basename($_FILES[$fileInput]["name"]);
        $targetFile = $uploadDir . $filename;

        if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $targetFile)) {
            // Return relative path for DB (so image shows correctly)
            return "uploads/" . $filename;
        }
    }
    return null;
}

$id             = $_POST['id'] ?? null;
$developer_id   = $_POST['developer_id'] ?? null;
$headline       = $_POST['headline'] ?? '';
$short_detail   = $_POST['short_detail'] ?? '';
$review_detail  = $_POST['review_detail'] ?? '';

$thumbnailPath = uploadImage('thumbnail');

// --- INSERT ---
if (!$id) {
    $stmt = $conn->prepare("INSERT INTO interior_reviews1 (developer_id, thumbnail, headline, short_detail, review_detail) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) die("Prepare failed: " . $conn->error);

    $stmt->bind_param("issss", $developer_id, $thumbnailPath, $headline, $short_detail, $review_detail);
} else {
    // Use old thumbnail if no new one
    if (!$thumbnailPath) {
        $result = $conn->query("SELECT thumbnail FROM interior_reviews1 WHERE id = $id");
        $row = $result->fetch_assoc();
        $thumbnailPath = $row['thumbnail'];
    }

    $stmt = $conn->prepare("UPDATE interior_reviews1 SET developer_id = ?, thumbnail = ?, headline = ?, short_detail = ?, review_detail = ? WHERE id = ?");
    if (!$stmt) die("Prepare failed: " . $conn->error);

    $stmt->bind_param("issssi", $developer_id, $thumbnailPath, $headline, $short_detail, $review_detail, $id);
}

// --- Execute and Redirect ---
if ($stmt->execute()) {
    header("Location: admin_interior1.php");
    exit;
} else {
    die("Query failed: " . $stmt->error);
}
?>
