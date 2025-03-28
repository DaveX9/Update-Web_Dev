<?php
$conn = new mysqli("localhost", "root", "", "homespector");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$upload_dir = __DIR__ . "/../../img/after_review/";
$upload_path = "/HOMESPECTOR/img/after_review/";

// Fetch main review
$review = $conn->query("SELECT * FROM interior_review WHERE id = 1")->fetch_assoc();
$images = $conn->query("SELECT * FROM interior_images WHERE review_id = 1");
$videos = $conn->query("SELECT * FROM interior_videos ORDER BY sort_order ASC")->fetch_all(MYSQLI_ASSOC);

// Add/Edit logic
$editVideo = null;
if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $editVideo = $conn->query("SELECT * FROM interior_videos WHERE id = $editId")->fetch_assoc();
}

// Save review content
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_review'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $conn->query("UPDATE interior_review SET title='$title', description='$description' WHERE id=1");

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $key => $name) {
            $tmp = $_FILES['images']['tmp_name'][$key];
            $filename = basename($name);
            move_uploaded_file($tmp, $upload_dir . $filename);
            $alt = $conn->real_escape_string($_POST['alt_text'][$key]);
            $conn->query("INSERT INTO interior_images (review_id, image_path, alt_text) VALUES (1, '$filename', '$alt')");
        }
    }
    header("Location: admin_interior.php");
    exit;
}

// Add new video
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_video'])) {
    $link = $conn->real_escape_string($_POST['youtube_link']);
    $conn->query("INSERT INTO interior_videos (youtube_link) VALUES ('$link')");
    header("Location: admin_interior.php");
    exit;
}

// Update video
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_video'])) {
    $id = (int)$_POST['video_id'];
    $link = $conn->real_escape_string($_POST['youtube_link']);
    $conn->query("UPDATE interior_videos SET youtube_link = '$link' WHERE id = $id");
    header("Location: admin_interior.php");
    exit;
}

// Delete video
if (isset($_GET['delete_video'])) {
    $id = (int)$_GET['delete_video'];
    $conn->query("DELETE FROM interior_videos WHERE id = $id");
    header("Location: admin_interior.php");
    exit;
}

// Delete image
if (isset($_GET['delete_image'])) {
    $img_id = (int) $_GET['delete_image'];
    $conn->query("DELETE FROM interior_images WHERE id = $img_id");
    header("Location: admin_interior.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Interior</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .image-row img { max-width: 100%; border-radius: 8px; }
        .iframe-wrap { aspect-ratio: 16/9; }
        .video-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .video-item {
            flex: 0 0 calc(33.333% - 20px);
            box-sizing: border-box;
        }
        .iframe-wrap {
            position: relative;
            width: 100%;
            padding-top: 56.25%;
        }
        .iframe-wrap iframe {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            border-radius: 10px;
            border: none;
        }
        @media (max-width: 992px) {
            .video-item { flex: 0 0 48%; }
        }
        @media (max-width: 576px) {
            .video-item { flex: 0 0 100%; }
        }
    </style>
</head>
<body class="container py-4">
    <h2 class="mb-4">🎨 Manage Interior Section</h2>
    <div class="mb-3 d-flex gap-2 flex-wrap">
        <a href="add_interior.php" class="btn btn-success">➕ Add Review</a>
        <!-- <a href="admin_manage_review.php" class="btn btn-outline-primary">📝 จัดการการแสดงผล</a>
        <a href="admin_manage_developer_review.php" class="btn btn-outline-primary">📝 จัดการ Developers</a> -->
    </div>

    <!-- 🎯 Review Title + Description -->
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="update_review" value="1">
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($review['title']) ?>">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($review['description']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">💾 Save Changes</button>
    </form>

    <hr>
    <h4 class="mt-4">🖼 Uploaded Images</h4>
    <div class="row image-row">
        <?php while ($img = $images->fetch_assoc()): ?>
            <div class="col-md-3 mb-4">
                <img src="<?= $upload_path . $img['image_path'] ?>" class="img-fluid">
                <p><?= htmlspecialchars($img['alt_text']) ?></p>
                <a href="?edit=<?= $video['id'] ?>" class="btn btn-sm btn-outline-primary">✏️ Edit</a>
                <a href="?delete_image=<?= $img['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
            </div>
        <?php endwhile; ?>
    </div>

    <hr>
    <h4 class="mt-4">🎥 Interior Videos</h4>

    <!-- 🎯 Add or Edit Video -->
    <form method="POST" class="mb-4 d-flex gap-2">
        <?php if ($editVideo): ?>
            <input type="hidden" name="update_video" value="1">
            <input type="hidden" name="video_id" value="<?= $editVideo['id'] ?>">
            <input type="text" name="youtube_link" class="form-control" value="<?= htmlspecialchars($editVideo['youtube_link']) ?>" required>
            <button type="submit" class="btn btn-warning">✏️ Update</button>
            <a href="admin_interior.php" class="btn btn-secondary">❌ Cancel</a>
        <?php else: ?>
            <input type="hidden" name="add_video" value="1">
            <input type="text" name="youtube_link" class="form-control" placeholder="YouTube Embed URL: https://www.youtube.com/embed/QSGShyc73lA?si=FpQQgpdySADUgRHl" required>
            <button type="submit" class="btn btn-success">➕ Add Video</button>
        <?php endif; ?>
    </form>

    <!-- 🎥 Video Grid -->
    <div class="video-grid">
        <?php foreach ($videos as $video): ?>
            <div class="video-item">
                <div class="iframe-wrap">
                    <iframe src="<?= htmlspecialchars($video['youtube_link']) ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="mt-2 d-flex justify-content-center gap-2">
                    <a href="?delete_video=<?= $video['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this video?')">🗑 Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
