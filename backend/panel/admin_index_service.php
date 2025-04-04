<?php
include 'db.php';

function startsWith($haystack, $needle) {
    return substr($haystack, 0, strlen($needle)) === $needle;
}

// เพิ่ม background
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_bg'])) {
    $fileName = time() . "_" . basename($_FILES["bg_file"]["name"]);
    $targetDir = "uploads/";
    $uploadPath = __DIR__ . "/" . $targetDir;

    if (!file_exists($uploadPath)) mkdir($uploadPath, 0755, true);

    $targetFilePath = $uploadPath . $fileName;
    $dbPath = "panel/uploads/" . $fileName;

    if (move_uploaded_file($_FILES["bg_file"]["tmp_name"], $targetFilePath)) {
        $conn->query("INSERT INTO index_service_hero (image_url) VALUES ('$dbPath')");
    }
}

// ลบภาพ
if (isset($_GET['delete_bg'])) {
    $id = $_GET['delete_bg'];
    $res = $conn->query("SELECT image_url FROM index_service_hero WHERE id=$id");
    if ($row = $res->fetch_assoc()) {
        $path = __DIR__ . "/" . $row['image_url'];
        if (file_exists($path)) unlink($path);
    }
    $conn->query("DELETE FROM index_service_hero WHERE id=$id");
}

// ดึงภาพทั้งหมด
$backgrounds = $conn->query("SELECT * FROM index_service_hero");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin - Service Background</title>
    <style>
        body { font-family: sans-serif; padding: 20px; max-width: 900px; margin: auto; background: #f4f4f4; }
        table { border-collapse: collapse; width: 100%; background: white; }
        th, td { border: 1px solid #aaa; padding: 8px; }
        img { width: 120px; border-radius: 4px; }
        input[type="submit"] { background: green; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        .delete-btn { color: red; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <h2>🖼 เพิ่มภาพพื้นหลัง Services</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="bg_file" accept="image/*" required>
        <input type="submit" name="upload_bg" value="เพิ่มภาพ">
    </form>

    <h3>📸 ภาพพื้นหลังทั้งหมด</h3>
    <table>
        <tr><th>ID</th><th>Image</th><th>Preview</th><th>Action</th></tr>
        <?php while ($row = $backgrounds->fetch_assoc()): ?>
            <?php $src = startsWith($row['image_url'], '/') ? $row['image_url'] : '/HOMESPECTOR/backend/' . $row['image_url']; ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['image_url'] ?></td>
                <td><img src="<?= $src ?>"></td>
                <td><a class="delete-btn" href="?delete_bg=<?= $row['id'] ?>" onclick="return confirm('ลบภาพนี้แน่ใจหรือไม่?')">ลบ</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
