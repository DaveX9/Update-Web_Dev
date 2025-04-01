<?php
include 'db.php';

$id = $_POST['id'] ?? null;
$title = $_POST['title'];
$category_id = $_POST['category_id'];
$short_description = $_POST['short_description'];
$full_content = $_POST['full_content'];
$article_date = $_POST['article_date'];
$thumbnail = null;

if (!empty($_FILES['thumbnail']['name'])) {
    $fileName = time() . '_' . basename($_FILES["thumbnail"]["name"]);
    $targetFile = "uploads/" . $fileName;
    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile);
    $thumbnail = $targetFile;
}

if ($id) {
    // อัปเดต
    $sql = "UPDATE articles SET 
            title=?, category_id=?, short_description=?, full_content=?, article_date=?";
    $params = [$title, $category_id, $short_description, $full_content, $article_date];

    if ($thumbnail) {
        $sql .= ", thumbnail=?";
        $params[] = $thumbnail;
    }

    $sql .= " WHERE id=?";
    $params[] = $id;

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat('s', count($params) - 1) . 'i', ...$params);
    $stmt->execute();
} else {
    // เพิ่มใหม่
    $stmt = $conn->prepare("INSERT INTO articles (title, category_id, short_description, full_content, thumbnail, article_date)
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissss", $title, $category_id, $short_description, $full_content, $thumbnail, $article_date);
    $stmt->execute();
}

header("Location: admin_article.php");
exit;
