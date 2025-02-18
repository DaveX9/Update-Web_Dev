<?php
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!isset($_GET['id'])) {
    die("Job ID not specified.");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM job_listings WHERE id = ?");
$stmt->execute([$id]);

echo "<script>alert('Job deleted successfully!'); window.location.href = 'manage_jobs.php';</script>";
?>
