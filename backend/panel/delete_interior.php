<?php
include 'db.php';

$id = $_POST['id'] ?? null;

if ($id) {
    $stmt = $conn->prepare("DELETE FROM interior_reviews1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Deleted successfully";
}
?>
