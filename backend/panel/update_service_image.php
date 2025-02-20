<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["service_image"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["service_image"]["name"]);

    if (move_uploaded_file($_FILES["service_image"]["tmp_name"], $target_file)) {
        $stmt = $pdo->prepare("UPDATE service_section SET image_url=? WHERE id=1");
        $stmt->execute([$target_file]);
        echo "Image updated successfully.";
    } else {
        echo "Error uploading image.";
    }
}
?>
