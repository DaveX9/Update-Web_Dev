    <?php
    // DB connection
    $conn = new mysqli("localhost", "root", "", "homespector");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Load article by ID
    $article_id = $_GET['id'] ?? 1;
    $stmt = $conn->prepare("SELECT * FROM article_view1 WHERE id = ?");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    ?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>📝 แก้ไขบทความ </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Froala Editor CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.15/css/froala_editor.pkgd.min.css">
    <style>
        body {
        font-family: 'Prompt', sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
        }
        .editor-container {
        background: #fff;
        max-width: 1000px;
        margin: auto;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .btn-save {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        margin-top: 20px;
        border-radius: 8px;
        cursor: pointer;
        }

    </style>
    </head>
    <body>

    <div class="editor-container">
    <h2>📝 แก้ไขบทความ: <?= htmlspecialchars($article['title']) ?></h2>
    
    <form method="post" action="save_article_view1.php">
        <input type="hidden" name="id" value="<?= $article['id'] ?>">
        <textarea id="froala-editor" name="content"><?= htmlspecialchars($article['content']) ?></textarea>
        <button type="submit" class="btn-save">💾 บันทึก</button>
    </form>
    </div>

    <!-- Froala Editor JS -->
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.0.15/js/froala_editor.pkgd.min.js"></script>
    <script>
    new FroalaEditor('#froala-editor', {
        height: 900,
        language: 'th',
        imageUploadURL: 'upload_image.php' // ถ้ามีระบบอัปโหลด
    });
    </script>

</body>
</html>
