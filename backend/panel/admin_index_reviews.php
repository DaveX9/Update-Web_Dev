<?php
include 'db.php';

// ดึงข้อความ title/subtitle
$textRow = $conn->query("SELECT * FROM index_review_texts LIMIT 1")->fetch_assoc();

// บันทึกข้อความ
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_text'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $subtitle = $conn->real_escape_string($_POST['subtitle']); // Froala HTML-safe

    if ($textRow) {
        $conn->query("UPDATE index_review_texts SET title='$title', subtitle='$subtitle' WHERE id=1");
    } else {
        $conn->query("INSERT INTO index_review_texts (title, subtitle) VALUES ('$title', '$subtitle')");
    }

    header("Location: admin_index_reviews.php?updated=1");
    exit;
}

// อัปเดต stat box
if (isset($_POST['update_stat'])) {
    $id = (int)$_POST['id'];
    $value = (int)$_POST['final_value'];
    $duration = (int)$_POST['duration'];
    $conn->query("UPDATE index_review_stats SET final_value=$value, animation_duration=$duration WHERE id=$id");
    header("Location: admin_index_reviews.php?updated_stat=1");
    exit;
}

$stats = $conn->query("SELECT * FROM index_review_stats ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin - Reviews Section</title>
    <!-- Froala CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@4.1.4/css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@4.1.4/css/froala_style.min.css">
    <style>
        body { font-family: sans-serif; max-width: 900px; margin: auto; padding: 20px; background: #f9f9f9; }
        form, table { background: white; padding: 20px; margin-bottom: 30px; border-radius: 10px; }
        input, textarea { padding: 6px; font-size: 15px; }
        input[type="submit"] { background: green; color: white; border: none; padding: 6px 12px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: left; }
        .delete-btn { color: red; text-decoration: none; font-weight: bold; }
        h2 { margin-top: 0; }
    </style>
</head>
<body>

<h2>📝 แก้ไขหัวข้อ & ข้อความรีวิว</h2>
<form method="POST">
    <label>ข้อความ (Subtitle):</label>
    <textarea name="subtitle" id="subtitle-editor"><?= htmlspecialchars_decode($textRow['subtitle'] ?? '') ?></textarea>

    <br>
    <input type="submit" name="save_text" value="บันทึกข้อความ">
</form>

<!-- Froala JS -->
<script src="https://cdn.jsdelivr.net/npm/froala-editor@4.1.4/js/froala_editor.pkgd.min.js"></script>
<script>
    new FroalaEditor('#subtitle-editor', {
        height: 400,
        imageUploadURL: '/HOMESPECTOR/backend/panel/upload_review_image.php',
        toolbarSticky: true,
        toolbarButtons: [
            'bold', 'italic', 'underline', 'paragraphFormat', '|',
            'formatOL', 'formatUL', '|',
            'insertImage', 'insertLink', '|',
            'undo', 'redo', 'html'
        ]
    });
</script>

<h2>📋 Stat Boxes ทั้งหมด</h2>
<table>
    <tr>
        <th>Icon</th>
        <th>Label</th>
        <th>Value</th>
        <th>Duration (ms)</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $stats->fetch_assoc()): ?>
        <form method="POST">
        <tr>
            <td><img src="<?= htmlspecialchars($row['icon_url']) ?>" width="40"></td>
            <td><?= htmlspecialchars($row['label']) ?></td>
            <td>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="number" name="final_value" value="<?= $row['final_value'] ?>" style="width: 80px;">
            </td>
            <td>
                <input type="number" name="duration" value="<?= $row['animation_duration'] ?>" style="width: 100px;">
            </td>
            <td>
                <input type="submit" name="update_stat" value="บันทึก">
            </td>
        </tr>
        </form>
    <?php endwhile; ?>
</table>

</body>
</html>
