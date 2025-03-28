<?php
include 'db.php';

$id          = $_POST['id'] ?? null;
$title       = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';

// --- INSERT ---
if (!$id) {
    $stmt = $conn->prepare("INSERT INTO interior_review (title, description) VALUES (?, ?)");
    if (!$stmt) die("Prepare failed: " . $conn->error);

    $stmt->bind_param("ss", $title, $description);
} else {
    $stmt = $conn->prepare("UPDATE interior_review SET title = ?, description = ? WHERE id = ?");
    if (!$stmt) die("Prepare failed: " . $conn->error);

    $stmt->bind_param("ssi", $title, $description, $id);
}

// --- Execute and Redirect ---
if ($stmt->execute()) {
    header("Location: admin_interior.php");
    exit;
} else {
    die("Query failed: " . $stmt->error);
}
?>
