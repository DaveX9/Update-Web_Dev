<?php
$conn = new mysqli("localhost", "root", "", "homespector");
$id = $_GET['id'] ?? 0;

// ลบ
$conn->query("DELETE FROM article_carousel WHERE id = $id");

header("Location: admin_article_carousel.php");
exit;
