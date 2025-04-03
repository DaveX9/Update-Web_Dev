<?php
$conn = new mysqli("localhost", "root", "", "homespector");
$id = $_GET['id'] ?? 4;

// ดึงข้อมูล
$stmt = $conn->prepare("SELECT * FROM article_view4 WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$stmt->close();

if (!$article) {
    echo "<h3 style='color:red;'>❌ ไม่พบข้อมูลบทความ ID: $id</h3>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $caption = $_POST['caption_main'];
    $main_image = $_POST['main_image'];
    $ebook_url = $_POST['ebook_url'];
    $tags = $_POST['tags'];
    $content = $_POST['content']; // ← รับค่าจาก Froala

    $stmt = $conn->prepare("UPDATE article_view4 SET title=?, caption_main=?, main_image=?, ebook_url=?, tags=?, content=? WHERE id=?");
    $stmt->bind_param("ssssssi", $title, $caption, $main_image, $ebook_url, $tags, $content, $id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('✅ บันทึกสำเร็จ!'); window.location.href='admin_article_view4.php?id=$id';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>📝 แก้ไขบทความ</title>
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.15/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            max-width: 800px;
            margin: 40px auto;
            background: #f9f9f9;
            padding: 20px;
        }
        form {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 20px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            margin-top: 25px;
            padding: 12px 24px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        img.preview {
            margin-top: 10px;
            max-height: 160px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <h2>📝 แก้ไขบทความ eBook: <?= htmlspecialchars($article['title']) ?></h2>

    <form method="post">
        <label>หัวข้อบทความ</label>
        <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>

        <label>คำอธิบายใต้ภาพ</label>
        <input type="text" name="caption_main" value="<?= htmlspecialchars($article['caption_main']) ?>">

        <label>URL รูปหลัก (main image)</label>
        <input type="text" name="main_image" value="<?= htmlspecialchars($article['main_image']) ?>">
        <?php if (!empty($article['main_image'])): ?>
            <img class="preview" src="<?= htmlspecialchars($article['main_image']) ?>" alt="preview">
        <?php endif; ?>

        <label>ลิงก์ eBook (Anyflip / PDF)</label>
        <input type="text" name="ebook_url" value="<?= htmlspecialchars($article['ebook_url']) ?>">

        <label>แท็ก</label>
        <input type="text" name="tags" value="<?= htmlspecialchars($article['tags']) ?>">

        <label>เนื้อหาบทความ (สามารถใส่รูป/คลิป)</label>
        <textarea id="froala-editor" name="content"><?= htmlspecialchars($article['content']) ?></textarea>

        <button type="submit">💾 บันทึกการเปลี่ยนแปลง</button>
    </form>

    <!-- Froala Editor -->
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.0.15/js/froala_editor.pkgd.min.js"></script>
    <script>
        new FroalaEditor('#froala-editor', {
            height: 400,
            language: 'th',
            imageUploadURL: 'upload_review-image.php', // <-- อัปโหลดรูป
            imageUploadParams: {
                id: 'froala-editor'
            },
            toolbarButtons: [
                ['bold', 'italic', 'underline', 'strikeThrough', '|',
                'fontSize', 'color', '|',
                'align', 'formatOL', 'formatUL', '|',
                'insertImage', 'insertLink', 'insertVideo', '|',
                'undo', 'redo']
            ],
        });
    </script>

</body>
</html>
