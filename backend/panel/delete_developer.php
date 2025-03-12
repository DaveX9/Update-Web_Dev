<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $query = "DELETE FROM developers1 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "✅ Developer Deleted!";
    } else {
        echo "❌ Error deleting developer.";
    }
}
?>
