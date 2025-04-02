<?php
include 'db.php';

$id = $_POST['id'] ?? null;
$title = $_POST['title'];
$category_id = $_POST['category_id'];
$short_description = $_POST['short_description'];
$full_content = $_POST['full_content'];
$article_date = $_POST['article_date'];
$tags = $_POST['tags'] ?? ''; // ✅ ADD THIS
$thumbnail = null;

// ✅ Handle thumbnail upload
if (!empty($_FILES['thumbnail']['name'])) {
    $fileName = time() . '_' . basename($_FILES["thumbnail"]["name"]);
    $targetFile = "uploads/" . $fileName;
    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile);
    $thumbnail = $targetFile;
}

if ($id) {
    // ✅ UPDATE
    $sql = "UPDATE articles SET 
            title=?, category_id=?, short_description=?, full_content=?, article_date=?, tags=?";
    $params = [$title, $category_id, $short_description, $full_content, $article_date, $tags];

    if ($thumbnail) {
        $sql .= ", thumbnail=?";
        $params[] = $thumbnail;
    }

    $sql .= " WHERE id=?";
    $params[] = $id;

    $types = str_repeat('s', count($params) - 1) . 'i';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();

} else {
    // ✅ INSERT
    $stmt = $conn->prepare("INSERT INTO articles 
        (title, category_id, short_description, full_content, thumbnail, article_date, tags) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssss", $title, $category_id, $short_description, $full_content, $thumbnail, $article_date, $tags);
    $stmt->execute();
}

header("Location: admin_article.php");
exit;