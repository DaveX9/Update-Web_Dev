<?php 
include 'db.php';
$id = $_GET['id'] ?? null;
$review = null;

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM home_reviews WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $review = $stmt->get_result()->fetch_assoc();
}

// Developer list
$developers = $conn->query("SELECT * FROM review_developer ORDER BY position ASC")->fetch_all(MYSQLI_ASSOC);

// Thumbnail path helper
function getThumbnailPath($thumb) {
    if (!str_contains($thumb, '/')) {
        return '/HOMESPECTOR/backend/panel/uploads/' . $thumb;
    }
    return $thumb;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $id ? 'Edit' : 'Add'; ?> Review</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2><?php echo $id ? 'Edit' : 'Add'; ?> Review</h2>

    <form action="save_review.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $review['id'] ?? ''; ?>">

        <div class="mb-3">
            <label>Developer</label>
            <select name="developer_id" class="form-control" required>
                <?php foreach ($developers as $dev): ?>
                    <option value="<?= $dev['id']; ?>" <?= (($review['developer_id'] ?? '') == $dev['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($dev['name_en']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
            <?php if (!empty($review['thumbnail'])): ?>
                <img src="<?= getThumbnailPath($review['thumbnail']); ?>" style="width: 100px; margin-top: 10px;">
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label>Headline</label>
            <input type="text" name="headline" class="form-control" value="<?= htmlspecialchars($review['headline'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label>Short Detail</label>
            <textarea name="short_detail" class="form-control"><?= htmlspecialchars($review['short_detail'] ?? '') ?></textarea>
        </div>
        <div class="mb-3">
            <label>Review Detail</label>
            <textarea id="editor" name="review_detail"><?= htmlspecialchars_decode($review['review_detail'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="btn btn-success w-100"><?= $id ? 'Update' : 'Save'; ?> Review</button>
    </form>
</div>

<!-- Froala Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/js/froala_editor.pkgd.min.js"></script>
<script>
    new FroalaEditor('#editor', {
        height: 300,
        imageUploadURL: 'upload_review-image.php',
        imageUploadParams: {
            id: 'review_image'
        },
        // imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif', 'webp'],
        imageUploadMethod: 'POST'
    });
</script>
</body>
</html>
