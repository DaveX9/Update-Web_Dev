<?php
include 'db.php';

// Get updated content
$content = $_POST['content'];

// Update database
$sql = "UPDATE newapp_content SET content = ? WHERE id = 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $content);

if ($stmt->execute()) {
    echo "Content updated successfully! <a href='admin_newapp.php'>Back</a>";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
