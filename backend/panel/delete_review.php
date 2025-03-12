<?php
include 'db.php';

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: No review ID provided.");
}

$id = $_GET['id'];

// Prepare and execute DELETE statement using MySQLi
$stmt = $conn->prepare("DELETE FROM home_reviews WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Redirect back to the review list
    header("Location: display_reviews.php");
    exit();
} else {
    echo "Error deleting review: " . $stmt->error;
}

// Close statement
$stmt->close();
?>
