<?php
include 'db.php';

// ฟังก์ชันรองรับ PHP < 8
function startsWith($haystack, $needle) {
    return substr($haystack, 0, strlen($needle)) === $needle;
}

// เพิ่มข้อความใหม่
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_text'])) {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $conn->query("INSERT INTO hero_texts (title, subtitle) VALUES ('$title', '$subtitle')");
}

// อัปโหลดภาพ background
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_bg'])) {
    $targetDir = "uploads/";
    $uploadPath = __DIR__ . "/" . $targetDir;

    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }

    $fileName = time() . "_" . basename($_FILES["image_file"]["name"]);
    $targetFilePath = $uploadPath . $fileName;
    $dbPath = "panel/uploads/" . $fileName; // เก็บใน DB

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $targetFilePath)) {
            $conn->query("INSERT INTO hero_backgrounds (image_url) VALUES ('$dbPath')");
        } else {
            echo "❌ ไม่สามารถอัปโหลดไฟล์ได้";
        }
    } else {
        echo "❌ รองรับเฉพาะไฟล์ .jpg, .jpeg, .png, .gif เท่านั้น";
    }
}

// ลบข้อความ
if (isset($_GET['delete_text'])) {
    $id = $_GET['delete_text'];
    $conn->query("DELETE FROM hero_texts WHERE id=$id");
}

// ลบภาพ + ลบไฟล์จริง
if (isset($_GET['delete_bg'])) {
    $id = $_GET['delete_bg'];
    $result = $conn->query("SELECT image_url FROM hero_backgrounds WHERE id=$id");
    if ($row = $result->fetch_assoc()) {
        $filePath = __DIR__ . "/" . $row['image_url'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
    $conn->query("DELETE FROM hero_backgrounds WHERE id=$id");
}

// ดึงข้อมูล
$texts = $conn->query("SELECT * FROM hero_texts");
$backgrounds = $conn->query("SELECT * FROM hero_backgrounds");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin - Hero Section</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f4; }
        h2 { color: #333; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; background: white; }
        table, th, td { border: 1px solid #aaa; }
        th, td { padding: 8px; text-align: left; }
        form { margin-bottom: 30px; background: white; padding: 20px; border-radius: 10px; }
        input[type="text"], input[type="file"] { width: 100%; padding: 8px; margin: 5px 0; }
        input[type="submit"] { padding: 10px 15px; background: green; color: white; border: none; cursor: pointer; }
        .delete-btn { color: red; text-decoration: none; font-weight: bold; }
        img { border-radius: 4px; }
    </style>
</head>
<body>

    <h2>🎯 เพิ่มข้อความ Hero</h2>
    <form method="POST">
        <label>Title </label>
        <input type="text" name="title" required>
        <label>Subtitle:</label>
        <input type="text" name="subtitle" required>
        <input type="submit" name="add_text" value="เพิ่มข้อความ">
    </form>

    <h3>📋 ข้อความทั้งหมด</h3>
    <table>
        <tr><th>ID</th><th>Title</th><th>Subtitle</th><th>Action</th></tr>
        <?php while ($row = $texts->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['subtitle']) ?></td>
                <td><a class="delete-btn" href="?delete_text=<?= $row['id'] ?>" onclick="return confirm('ลบแน่ใจหรือไม่?')">ลบ</a></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>🖼 อัปโหลด Background Image จากเครื่อง</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>เลือกไฟล์ภาพ (JPG, PNG, GIF):</label>
        <input type="file" name="image_file" accept="image/*" required>
        <input type="submit" name="upload_bg" value="เพิ่มภาพ">
    </form>

    <h3>📸 Background Images ทั้งหมด</h3>
    <table>
        <tr><th>ID</th><th>Image Path</th><th>Preview</th><th>Action</th></tr>
        <?php while ($row = $backgrounds->fetch_assoc()): ?>
            <?php
                $image_url = $row['image_url'];

                if (startsWith($image_url, '/')) {
                    $preview_path = $image_url;
                } elseif (startsWith($image_url, 'panel/')) {
                    $preview_path = '/HOMESPECTOR/backend/' . $image_url;
                } else {
                    $preview_path = '/HOMESPECTOR/backend/panel/' . $image_url;
                }
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $image_url ?></td>
                <td><img src="<?= $preview_path ?>" width="120"></td>
                <td><a class="delete-btn" href="?delete_bg=<?= $row['id'] ?>" onclick="return confirm('ลบภาพนี้แน่ใจหรือไม่?')">ลบ</a></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
