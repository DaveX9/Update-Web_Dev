<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete image (optional)
    $stmt = $conn->prepare("SELECT image FROM promotions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . $row['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // delete file
        }
    }

    // Delete from database
    $del_stmt = $conn->prepare("DELETE FROM promotions WHERE id = ?");
    $del_stmt->bind_param("i", $id);
    $del_stmt->execute();
}

header("Location: admin_promotion.php");
exit();
?>
