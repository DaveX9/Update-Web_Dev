<?php
$pdo = new PDO("mysql:host=localhost;dbname=homespector;charset=utf8", "username", "password");

// === HANDLE CATEGORY ADD ===
if (isset($_POST['add_category'])) {
    $name = $_POST['category_name'];
    $pdo->prepare("INSERT INTO content_categories (name) VALUES (?)")->execute([$name]);
    header("Location: admin_content_manager.php");
    exit;
}

// === HANDLE CATEGORY DELETE ===
if (isset($_GET['delete_category'])) {
    $pdo->prepare("DELETE FROM content_categories WHERE id = ?")->execute([$_GET['delete_category']]);
    header("Location: admin_content_manager.php");
    exit;
}

// === HANDLE CONTENT ADD or UPDATE ===
if (isset($_POST['save_content'])) {
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];

    $image_url = $_POST['existing_image'] ?? '';
    if (!empty($_FILES['image_url']['name'])) {
        $target_dir = "/HOMESPECTOR/img/";
        $filename = basename($_FILES["image_url"]["name"]);
        $target_file = $_SERVER['DOCUMENT_ROOT'] . $target_dir . $filename;
        move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file);
        $image_url = $target_dir . $filename;
    }

    if (!empty($_POST['content_id'])) {
        // Update
        $id = $_POST['content_id'];
        $pdo->prepare("UPDATE content_items SET title=?, image_url=?, category_id=? WHERE id=?")
            ->execute([$title, $image_url, $category_id, $id]);
    } else {
        // Insert
        $stmt = $pdo->prepare("INSERT INTO content_items (title, image_url, link_url, category_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $image_url, '', $category_id]);
        $inserted_id = $pdo->lastInsertId();
        $link = "/HOMESPECTOR/Homepage/carousel_content6.php?id=" . $inserted_id;
        $pdo->prepare("UPDATE content_items SET link_url = ? WHERE id = ?")->execute([$link, $inserted_id]);
    }

    header("Location: admin_content_manager.php");
    exit;
}

// === HANDLE RELATED VIDEO ADD ===
if (isset($_POST['add_related_video'])) {
    $content_id = $_POST['content_item_id'];
    $youtube_url = $_POST['youtube_url'];
    $title = $_POST['related_title'];
    $desc = $_POST['related_description'];

    $stmt = $pdo->prepare("INSERT INTO related_videos (content_item_id, youtube_url, title, description) VALUES (?, ?, ?, ?)");
    $stmt->execute([$content_id, $youtube_url, $title, $desc]);

    header("Location: admin_content_manager.php?edit_content=$content_id");
    exit;
}

// === DELETE CONTENT ===
if (isset($_GET['delete_content'])) {
    $pdo->prepare("DELETE FROM content_items WHERE id = ?")->execute([$_GET['delete_content']]);
    header("Location: admin_content_manager.php");
    exit;
}

// === FETCH DATA ===
$categories = $pdo->query("SELECT * FROM content_categories ORDER BY name")->fetchAll();
$contents = $pdo->query("SELECT c.*, cat.name AS category_name FROM content_items c LEFT JOIN content_categories cat ON c.category_id = cat.id ORDER BY c.created_at DESC")->fetchAll();

$edit_content = null;
if (isset($_GET['edit_content'])) {
    $stmt = $pdo->prepare("SELECT * FROM content_items WHERE id = ?");
    $stmt->execute([$_GET['edit_content']]);
    $edit_content = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Content Manager</title>
    <style>
        body {
            font-family: Arial;
            background: #f7f9fc;
            margin: 20px;
            max-width: 800px;
            justify-content: center;
            align-items: center;
        }
        h2, h3 {
            color: #2c3e50;
        }
        form, .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        input, select, textarea {
            width: 100%;
            margin: 8px 0 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background-color: #2ecc71;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #27ae60;
        }
        img.preview {
            max-width: 120px;
            margin-top: 10px;
        }
        .card {
            border-left: 5px solid #3498db;
        }
        .card h4 {
            margin-top: 0;
        }
        .card small {
            color: #555;
        }
        .delete-btn {
            color: #e74c3c;
            font-weight: bold;
            text-decoration: none;
        }
        .delete-btn:hover {
            text-decoration: underline;
        }
        .edit-btn {
            color: #2980b9;
            font-weight: bold;
            text-decoration: none;
            margin-right: 10px;
        }
        .edit-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>➕ Add New Category</h2>
<form method="post">
    <input type="text" name="category_name" placeholder="Category Name" required>
    <button type="submit" name="add_category">Add Category</button>
</form>

<h2><?= $edit_content ? '✏️ Edit Content' : '📝 Add New Content' ?></h2>
<form method="post" enctype="multipart/form-data">
    <?php if ($edit_content): ?>
        <input type="hidden" name="content_id" value="<?= $edit_content['id'] ?>">
    <?php endif; ?>
    <input type="text" name="title" placeholder="Title" value="<?= $edit_content['title'] ?? '' ?>" required>
    <select name="category_id" required>
        <option value="">-- Select Category --</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= isset($edit_content) && $edit_content['category_id'] == $cat['id'] ? 'selected' : '' ?>><?= htmlspecialchars($cat['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <label>Upload Image:</label>
    <?php if (!empty($edit_content['image_url'])): ?>
        <img src="<?= $edit_content['image_url'] ?>" class="preview" alt="">
        <input type="hidden" name="existing_image" value="<?= $edit_content['image_url'] ?>">
    <?php endif; ?>
    <input type="file" name="image_url" accept="image/*">
    <button type="submit" name="save_content">Save Content</button>
</form>

<?php if ($edit_content): ?>
    <h3>🎬 Add Related Video</h3>
    <form method="post">
        <input type="hidden" name="add_related_video" value="1">
        <input type="hidden" name="content_item_id" value="<?= $edit_content['id'] ?>">
        <input type="text" name="related_title" placeholder="Video Title" required>
        <textarea name="related_description" placeholder="Video Description"></textarea>
        <input type="text" name="youtube_url" placeholder="YouTube Embed URL (https://www.youtube.com/embed/...)" required>
        <button type="submit">Add Related Video</button>
    </form>
<?php endif; ?>

<h2>📋 All Content</h2>
<?php foreach ($contents as $item): ?>
    <div class="card">
        <h4><?= htmlspecialchars($item['title']) ?></h4>
        <small>Category: <?= htmlspecialchars($item['category_name']) ?></small><br>
        <img src="<?= $item['image_url'] ?>" class="preview" alt="">
        <br><a href="<?= $item['link_url'] ?? ('/HOMESPECTOR/Homepage/carousel_content6.php?id=' . $item['id']) ?>" target="_blank">🔗 Visit</a>
        <br>
        <a href="?edit_content=<?= $item['id'] ?>" class="edit-btn">✏️ Edit</a>
        <a href="?delete_content=<?= $item['id'] ?>" class="delete-btn" onclick="return confirm('Delete this content?')">🗑️ Delete</a>
        <?php
        $vids = $pdo->prepare("SELECT * FROM related_videos WHERE content_item_id = ?");
        $vids->execute([$item['id']]);
        $related = $vids->fetchAll();
        if ($related):
            echo "<h5>🎞 Related Videos:</h5>";
            foreach ($related as $vid) {
                echo "<div style='margin-bottom:20px'>";
                echo "<strong>" . htmlspecialchars($vid['title']) . "</strong><br>";
                echo "<iframe src='{$vid['youtube_url']}' width='100%' height='280' style='border-radius:8px; margin-top:10px;' allowfullscreen></iframe>";
                echo "<p>" . htmlspecialchars($vid['description']) . "</p>";
                echo "</div>";
            }
        endif;
        ?>
    </div>
<?php endforeach; ?>

<h2>🗂 All Categories</h2>
<ul>
    <?php foreach ($categories as $cat): ?>
        <li><?= htmlspecialchars($cat['name']) ?> - <a class="delete-btn" href="?delete_category=<?= $cat['id'] ?>" onclick="return confirm('Delete this category?')">🗑️ Delete</a></li>
    <?php endforeach; ?>
</ul>

</body>
</html>