<?php
include 'db.php';

$id = $_GET['id'] ?? null;
$article = null;

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $article = $stmt->get_result()->fetch_assoc();
}

// ✅ ดึงหมวดหมู่
$categories = $conn->query("SELECT * FROM article_categories ORDER BY position ASC")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? 'Edit' : 'Add' ?> Article</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2><?= $id ? 'Edit' : 'Add' ?> Article</h2>
    <form action="save_article.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $article['id'] ?? '' ?>">

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($article['title'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control" required>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= ($article['category_id'] ?? '') == $cat['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name_en']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
            <?php if (!empty($article['thumbnail'])): ?>
                <img src="<?= htmlspecialchars($article['thumbnail']) ?>" style="width: 120px; margin-top: 10px;">
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label>Short Description</label>
            <textarea name="short_description" class="form-control"><?= htmlspecialchars($article['short_description'] ?? '') ?></textarea>
        </div>

        <div class="mb-3">
            <label>Full Content</label>
            <textarea id="editor" name="full_content"><?= htmlspecialchars_decode($article['full_content'] ?? '') ?></textarea>
        </div>

        <div class="mb-3">
            <label>Article Date</label>
            <input type="date" name="article_date" class="form-control" value="<?= $article['article_date'] ?? date('Y-m-d') ?>" required>
        </div>

        <button type="submit" class="btn btn-success w-100"><?= $id ? 'Update' : 'Save' ?> Article</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/js/froala_editor.pkgd.min.js"></script>
<script>
    new FroalaEditor('#editor', {
        height: 300,
        imageUploadURL: 'upload_review-image.php',
        imageUploadParams: {
            id: 'article_image'
        },
        imageUploadMethod: 'POST'
    });
</script>
</body>
</html>
