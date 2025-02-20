<?php
session_start();

// Database Connection using PDO
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $heading = $_POST['heading'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $pdo->prepare("INSERT INTO service_carousel (image_url, heading) VALUES (?, ?)");
        $stmt->execute([$target_file, $heading]);
        echo "Image uploaded successfully.";
    } else {
        echo "Error uploading image.";
    }
}
?>
