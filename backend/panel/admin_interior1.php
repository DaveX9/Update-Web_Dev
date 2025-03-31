<?php
include 'db.php';

// ✅ Mapping หน้าแก้ไขเฉพาะ ID
$customEditLinks = [
    1 => 'admin_after_interior1.php',
    2 => 'admin_after_interior2.php',
    3 => 'admin_after_interior3.php',
    4 => 'admin_after_interior4.php',
    5 => 'admin_after_interior5.php',
    6 => 'admin_after_interior6.php',
    7 => 'admin_after_interior7.php',
    8 => 'admin_after_interior8.php',
    9 => 'admin_after_interior9.php',
];

// ✅ Fetch Reviews
$query = "SELECT hr.*, d.name_en AS developer_name 
            FROM interior_reviews1 hr 
            JOIN interior_developer1 d ON hr.developer_id = d.id 
            ORDER BY hr.created_at DESC";
$result = $conn->query($query);
$reviews = $result->fetch_all(MYSQLI_ASSOC);

// ✅ Fetch Developer List
$devQuery = "SELECT name_en FROM interior_developer1 ORDER BY id ASC";
$devResult = $conn->query($devQuery);
$developers = $devResult->fetch_all(MYSQLI_ASSOC);

// ✅ Fetch Videos
$videos = $conn->query("SELECT * FROM interior_videos ORDER BY sort_order ASC")->fetch_all(MYSQLI_ASSOC);

// ✅ Edit Video
$editVideo = null;
if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $editVideo = $conn->query("SELECT * FROM interior_videos WHERE id = $editId")->fetch_assoc();
}

// ✅ Add new video
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_video'])) {
    $link = $conn->real_escape_string($_POST['youtube_link']);
    $conn->query("INSERT INTO interior_videos (youtube_link) VALUES ('$link')");
    header("Location: admin_interior1.php");
    exit;
}

// ✅ Update video
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_video'])) {
    $id = (int)$_POST['video_id'];
    $link = $conn->real_escape_string($_POST['youtube_link']);
    $conn->query("UPDATE interior_videos SET youtube_link = '$link' WHERE id = $id");
    header("Location: admin_interior1.php");
    exit;
}

// ✅ Delete video
if (isset($_GET['delete_video'])) {
    $id = (int)$_GET['delete_video'];
    $conn->query("DELETE FROM interior_videos WHERE id = $id");
    header("Location: admin_interior1.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Interior Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card-img-top { height: 200px; object-fit: cover; }
        .developer-list {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .developer-item {
            background: #f1f1f1;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 14px;
        }
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .iframe-wrap {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }
        .iframe-wrap iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2>📌 Manage Interior Reviews</h2>

    <div class="mb-3 d-flex gap-2 flex-wrap">
        <a href="add_interior1.php" class="btn btn-success">➕ Add Review</a>
    </div>

    <div class="developer-list">
        <?php foreach ($developers as $dev): ?>
            <div class="developer-item"><?= htmlspecialchars($dev['name_en']) ?></div>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <?php foreach ($reviews as $r): ?>
            <?php
                $id = $r['id'];
                $viewLink = "after_review_interior10.php?id=$id";
                $editLink = isset($customEditLinks[$id])
                    ? $customEditLinks[$id] . "?id=$id"
                    : "add_interior1.php?id=$id";
            ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="/HOMESPECTOR/homepage/<?= htmlspecialchars($viewLink) ?>">
                        <img src="<?= htmlspecialchars($r['thumbnail']) ?>" class="card-img-top" alt="Thumbnail">
                    </a>
                    <div class="card-body">
                        <h5><?= htmlspecialchars($r['headline']) ?></h5>
                        <p>Style: <?= htmlspecialchars($r['developer_name']) ?></p>
                        <a href="<?= htmlspecialchars($editLink) ?>" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger delete-interior" data-id="<?= $id ?>">Delete</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h4 class="mt-4">🎥 Interior Videos</h4>

    <form method="POST" class="mb-4 d-flex gap-2">
        <?php if ($editVideo): ?>
            <input type="hidden" name="update_video" value="1">
            <input type="hidden" name="video_id" value="<?= $editVideo['id'] ?>">
            <input type="text" name="youtube_link" class="form-control" value="<?= htmlspecialchars($editVideo['youtube_link']) ?>" required>
            <button type="submit" class="btn btn-warning">✏️ Update</button>
            <a href="admin_interior1.php" class="btn btn-secondary">❌ Cancel</a>
        <?php else: ?>
            <input type="hidden" name="add_video" value="1">
            <input type="text" name="youtube_link" class="form-control" placeholder="YouTube Embed URL" required>
            <button type="submit" class="btn btn-success">➕ Add Video</button>
        <?php endif; ?>
    </form>

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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('.delete-interior').click(function () {
    if (confirm("Delete this review?")) {
        $.post("delete_interior.php", { id: $(this).data("id") }, function () {
            location.reload();
        });
    }
});
</script>
</body>
</html>