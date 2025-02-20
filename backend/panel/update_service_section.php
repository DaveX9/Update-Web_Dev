<?php
session_start();

// Database Connection using PDO
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $phone_numbers = $_POST['phone_numbers'];
    $address = $_POST['address'];

    $stmt = $pdo->prepare("UPDATE service_section SET title=?, description=?, phone_numbers=?, address=? WHERE id=1");
    $stmt->execute([$title, $description, $phone_numbers, $address]);

    echo "Updated successfully.";
}
?>
