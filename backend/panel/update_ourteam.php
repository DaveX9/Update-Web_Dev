<?php
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        $stmt = $pdo->prepare("UPDATE ourteam SET content = :content WHERE section_name = 'ourteam'");
        $stmt->execute(['content' => $content]);
        echo json_encode(["status" => "success"]);
    }

    if (isset($_POST['youtube_video'])) {
        $youtube_video = $_POST['youtube_video'];
        $stmt = $pdo->prepare("UPDATE ourteam SET youtube_video = :youtube_video WHERE section_name = 'ourteam'");
        $stmt->execute(['youtube_video' => $youtube_video]);
        echo json_encode(["status" => "success"]);
    }
}
?>
