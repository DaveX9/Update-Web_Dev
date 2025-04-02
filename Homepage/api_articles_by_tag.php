<?php
include __DIR__ . '/db.php';

$tag = $_GET['tag'] ?? '';
if (!$tag) {
    echo "<p style='color:red;'>❌ ไม่พบ tag ที่ระบุ</p>";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM articles WHERE FIND_IN_SET(?, tags) ORDER BY article_date DESC");
$stmt->bind_param("s", $tag);
$stmt->execute();
$results = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>บทความแท็ก: <?= htmlspecialchars($tag) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    body {
        padding: 30px;
        background: #f8f9fa;
    }

    h2 {
        margin-bottom: 30px;
        text-align: center;
        font-weight: bold;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
    }

    .card-text {
        font-size: 14px;
        color: #666;
    }

    .btn-primary {
        background-color: #0056b3;
        border: none;
    }

    .btn-primary:hover {
        background-color: #003d80;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>📌 บทความที่มีแท็ก: <?= htmlspecialchars($tag) ?></h2>

        <?php if ($results->num_rows > 0): ?>
        <div class="row">
            <?php while ($a = $results->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="/HOMESPECTOR/backend/panel/<?= htmlspecialchars($a['thumbnail']) ?>" class="card-img-top"
                        alt="Thumbnail">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($a['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($a['short_description']) ?></p>
                        <a href="/HOMESPECTOR/Homepage/articles_view11.php?id=<?= $a['id'] ?>"
                            class="btn btn-primary w-100">อ่านเพิ่มเติม</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
        <p class="text-danger text-center mt-4">❗ ไม่พบบทความที่มีแท็กนี้</p>
        <?php endif; ?>
    </div>
</body>

</html>