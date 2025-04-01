<?php
$conn = new mysqli("localhost", "root", "", "homespector");
$id = $_GET['id'] ?? 1;

// ดึงข้อมูลบทความ
$stmt = $conn->prepare("SELECT * FROM article_view6 WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$stmt->close();

// อัปเดตเมื่อ POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $caption = $_POST['caption_main'];
    $html = $_POST['article_html'];
    $tags = $_POST['tags'];

    $stmt = $conn->prepare("UPDATE article_view6 SET title=?, caption_main=?, article_html=?, tags=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $caption, $html, $tags, $id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('✅ บันทึกสำเร็จ!'); window.location.href='admin_article_view6.php?id=$id';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>📝 แก้ไขบทความ</title>
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.15/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.0.15/js/froala_editor.pkgd.min.js"></script>
    <style>
        body {
        font-family: 'Prompt', sans-serif;
        max-width: 1000px;
        margin: 30px auto;
        padding: 20px;
        background: #f9f9f9;
        }
        h2 {
        color: #333;
        }
        form {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
        border-radius: 6px;
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
    </style>
</head>
<body>

    <h2>📝 แก้ไขบทความ: <?= htmlspecialchars($article['title']) ?></h2>

    <form method="post">
        <label>หัวข้อบทความ</label>
        <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>

        <label>คำอธิบายใต้ภาพหลัก</label>
        <input type="text" name="caption_main" value="<?= htmlspecialchars($article['caption_main']) ?>">

        <label>แท็ก (คั่นด้วย , เช่น ตรวจบ้าน,งานระบบ)</label>
        <input type="text" name="tags" value="<?= htmlspecialchars($article['tags']) ?>">

        <label>เนื้อหาบทความ (HTML, รูปภาพ, วิดีโอ ฯลฯ)</label>
        <textarea id="froala" name="article_html"><?= htmlspecialchars($article['article_html']) ?></textarea>

        <button type="submit">💾 บันทึกการเปลี่ยนแปลง</button>
    </form>

    <script>
        new FroalaEditor('#froala', {
        height: 800,
        language: 'th',
        imageUploadURL: '/HOMESPECTOR/backend/panel/upload_image.php',
        videoResize: true,
        videoEditButtons: ['videoDisplay', 'videoAlign', 'videoRemove', 'videoSize'],
        videoInsertButtons: ['videoBack', '|', 'videoByURL', 'videoEmbed'],
        toolbarButtons: [
            'bold', 'italic', 'underline', '|',
            'formatOL', 'formatUL', '|',
            'insertLink', 'insertImage', 'insertVideo', '|',
            'html', 'undo', 'redo'
        ]
        });
    </script>

</body>
</html>
