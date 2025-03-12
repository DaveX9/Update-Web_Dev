<?php
session_start();

$conn = new mysqli("localhost", "root", "", "homespector");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $section = $_POST['section'];
    $content = $_POST['content'];

    // Secure input
    $content = $conn->real_escape_string($content);

    // Update database
    $sql = "UPDATE hbulter SET content='$content' WHERE section='$section'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Content updated successfully!'); window.location='admin_hbulter.php';</script>";
    } else {
        echo "Error updating content: " . $conn->error;
    }
}

$conn->close();
?>
