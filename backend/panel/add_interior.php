<?php
include 'db.php';
$id = $_GET['id'] ?? null;
$review = null;

// ดึงข้อมูล review ถ้ามี id
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM interior_review WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $review = $stmt->get_result()->fetch_assoc();
}

// ดึง developer จาก interior_developer
$devResult = $conn->query("SELECT * FROM interior_developer ORDER BY id ASC");

if (!$devResult) {
    die("Developer Query Failed: " . $conn->error); // 🔍 บอกว่า query error อะไร
}

$developers = $devResult->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? 'Edit' : 'Add'; ?> Interior Review</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/css/froala_editor.pkgd.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4"><?= $id ? 'Edit' : 'Add'; ?> Review</h2>

    <form action="save_interior.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $review['id'] ?? ''; ?>">

        <!-- Developer Dropdown -->
        <div class="mb-3">
            <label>Developer</label>
            <select name="developer_id" class="form-control" required> 
                <?php foreach ($developers as $dev): ?>
                    <option value="<?= $dev['id']; ?>" <?= ($review['developer_id'] ?? '') == $dev['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($dev['name_th']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
            <?php if (!empty($review['thumbnail'])): ?>
                <img src="/HOMESPECTOR/img/after_review/<?= $review['thumbnail']; ?>" style="width: 100px; margin-top: 10px;">
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label>Headline</label>
            <input type="text" name="headline" class="form-control" value="<?= htmlspecialchars($review['headline'] ?? '') ?>">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/js/froala_editor.pkgd.min.js"></script>
<script>
    new FroalaEditor('#editor', {
        imageUploadURL: 'upload_review-image.php',
        imageUploadParams: { id: 'interior_review' }
    });
</script>
</body>
</html>
