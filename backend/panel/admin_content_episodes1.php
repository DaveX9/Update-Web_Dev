<?php
$pdo = new PDO("mysql:host=localhost;dbname=homespector;charset=utf8", "username", "password");

// === UPDATE MAIN CONTENT ===
if (isset($_POST['update_main'])) {
    $title = $_POST['main_title'];
    $desc = $_POST['main_description'];

    if (!empty($_FILES['main_thumbnail']['name'])) {
        $filename = basename($_FILES["main_thumbnail"]["name"]);
        $target_dir = "/HOMESPECTOR/img/";
        $target_file = $_SERVER['DOCUMENT_ROOT'] . $target_dir . $filename;
        move_uploaded_file($_FILES["main_thumbnail"]["tmp_name"], $target_file);
        $thumb_url = $target_dir . $filename;

        $pdo->prepare("UPDATE carousel_main_content1 SET title=?, description=?, thumbnail_url=? WHERE id=1")
            ->execute([$title, $desc, $thumb_url]);
    } else {
        $pdo->prepare("UPDATE carousel_main_content1 SET title=?, description=? WHERE id=1")
            ->execute([$title, $desc]);
    }

    header("Location: admin_content_episodes1.php");
    exit;
}

// === ADD NEW EPISODE ===
if (isset($_POST['add_episode'])) {
    $title = $_POST['episode_title'];
    $desc = $_POST['episode_description'];
    $youtube_url = $_POST['youtube_url'];

    $stmt = $pdo->prepare("INSERT INTO carousel_episodes1 (youtube_url, title, description) VALUES (?, ?, ?)");
    $stmt->execute([$youtube_url, $title, $desc]);

    header("Location: admin_content_episodes1.php");
    exit;
}

// === UPDATE EPISODE ===
if (isset($_POST['edit_episode'])) {
    $id = $_POST['episode_id'];
    $title = $_POST['edit_title'];
    $desc = $_POST['edit_description'];
    $youtube_url = $_POST['edit_youtube_url'];

    $pdo->prepare("UPDATE carousel_episodes1 SET title=?, description=?, youtube_url=? WHERE id=?")
        ->execute([$title, $desc, $youtube_url, $id]);

    header("Location: admin_content_episodes1.php");
    exit;
}

// === DELETE EPISODE ===
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $pdo->prepare("DELETE FROM carousel_episodes1 WHERE id = ?")->execute([$id]);
    header("Location: admin_content_episodes1.php");
    exit;
}

// === FETCH DATA ===
$main = $pdo->query("SELECT * FROM carousel_main_content1 WHERE id = 1")->fetch();
$episodes = $pdo->query("SELECT * FROM carousel_episodes1 ORDER BY created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin: Manage Episodes1</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 30px;
            background: #f1f4f8;
            color: #34495e;
        }

        h1, h2 {
            color: #2c3e50;
        }

        form {
            margin-bottom: 40px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: 600;
            color: #2c3e50;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #dcdfe3;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            background-color: #ffffff;
            transition: border 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            padding: 12px 25px;
            background: linear-gradient(to right, #58d68d, #2ecc71);
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #27ae60, #239b56);
        }

        .section {
            border: none;
            background: #ffffff;
            padding: 25px;
            margin-bottom: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .section h2 {
            margin-bottom: 15px;
            border-left: 6px solid #2ecc71;
            padding-left: 10px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 6px;
        }

        .episode-box {
            background: #eafaf1;
            border-left: 6px solid #58d68d;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        }

        .episode-box strong {
            font-size: 18px;
            color: #117a65;
        }

        .episode-box iframe {
            width: 50%;
            height: 400px;
            border-radius: 8px;
            margin-top: 10px;
            border: 1px solid #d5dbdb;
        }

        .delete-btn, .edit-btn {
            font-weight: bold;
            text-decoration: none;
            margin-right: 10px;
        }

        .delete-btn {
            color: #e74c3c;
        }

        .edit-btn {
            color: #2980b9;
        }

        .delete-btn:hover, .edit-btn:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            body {
                margin: 15px;
            }

            .section {
                padding: 20px;
            }

            input, textarea, button {
                font-size: 16px;
            }

            h1 {
                font-size: 24px;
            }

            h2 {
                font-size: 20px;
            }

            .episode-box iframe {
                width: 100%;
                height: 300px;
            }
        }

        @media (max-width: 480px) {
            .episode-box {
                padding: 15px;
            }

            button {
                width: 100%;
                margin-top: 12px;
            }
        }
    </style>
</head>
<body>

    <h1>🎬 Admin: Manage Episodes 1</h1>

    <div class="section">
    <h2>📝 Edit Main Content</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="update_main" value="1">
        <label>Main Title</label>
        <input type="text" name="main_title" value="<?= htmlspecialchars($main['title']) ?>" required>

        <label>Main Description</label>
        <textarea name="main_description"><?= htmlspecialchars($main['description']) ?></textarea>

        <label>Main Thumbnail</label>
        <input type="file" name="main_thumbnail" accept="image/*">

        <?php if ($main['thumbnail_url']): ?>
        <img src="<?= $main['thumbnail_url'] ?>" style="max-width:200px;margin-top:10px;">
        <?php endif; ?>

        <button type="submit">💾 Update Main</button>
    </form>
    </div>

    <div class="section">
    <h2>➕ Add New Episode</h2>
    <form method="post">
        <input type="hidden" name="add_episode" value="1">
        <label>Episode Title</label>
        <input type="text" name="episode_title" required>
        <label>Episode Description</label>
        <textarea name="episode_description"></textarea>
        <label>YouTube Embed URL</label>
        <input type="text" name="youtube_url" required>
        <button type="submit">💾 Add Episode</button>
    </form>
    </div>

    <div class="section">
    <h2>📺 All Episodes</h2>
    <?php foreach ($episodes as $ep): ?>
        <div class="episode-box">
        <strong><?= htmlspecialchars($ep['title']) ?></strong>
        <p><?= htmlspecialchars($ep['description']) ?></p>
        <iframe src="<?= htmlspecialchars($ep['youtube_url']) ?>" allowfullscreen></iframe>
        <p>
            <a href="?edit=<?= $ep['id'] ?>" class="edit-btn">🖊️ Edit</a>
            <a href="?delete=<?= $ep['id'] ?>" class="delete-btn" onclick="return confirm('Delete this episode?');">🗑️ Delete</a>
        </p>

        <?php if (isset($_GET['edit']) && $_GET['edit'] == $ep['id']): ?>
            <form method="post" style="margin-top:20px;">
            <input type="hidden" name="edit_episode" value="1">
            <input type="hidden" name="episode_id" value="<?= $ep['id'] ?>">

            <label>Title</label>
            <input type="text" name="edit_title" value="<?= htmlspecialchars($ep['title']) ?>" required>

            <label>Description</label>
            <textarea name="edit_description"><?= htmlspecialchars($ep['description']) ?></textarea>

            <label>YouTube Embed URL</label>
            <input type="text" name="edit_youtube_url" value="<?= htmlspecialchars($ep['youtube_url']) ?>" required>

            <button type="submit">💾 Save Changes</button>
            </form>
        <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>

</body>
</html>
