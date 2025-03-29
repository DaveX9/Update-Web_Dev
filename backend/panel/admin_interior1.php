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
    9 => 'admin_after_interior9.php'
];

// ✅ Fetch Reviews
$query = "SELECT hr.*, d.name_en AS developer_name FROM interior_reviews1 hr 
            JOIN interior_developer1 d ON hr.developer_id = d.id 
            ORDER BY hr.sort_order ASC";
$result = $conn->query($query);
if (!$result) {
    die("SQL Error: " . $conn->error);
}
$reviews = $result->fetch_all(MYSQLI_ASSOC);

// ✅ Fetch Developer List
$devQuery = "SELECT name_en FROM interior_developer1 ORDER BY id ASC";
$devResult = $conn->query($devQuery);
$developers = $devResult->fetch_all(MYSQLI_ASSOC);
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
    </style>
</head>
<body>
<div class="container mt-4">
    <h2>📌 Manage Interior Reviews</h2>

    <!-- Top Buttons -->
    <div class="mb-3 d-flex gap-2 flex-wrap">
        <a href="add_interior1.php" class="btn btn-success">➕ Add Review</a>
        <a href="admin_manage_review.php" class="btn btn-outline-primary">📝 จัดการการแสดงผล</a>
        <a href="admin_manage_developer_review.php" class="btn btn-outline-primary">📝 จัดการประเภท Style</a>
    </div>

    <!-- Developer Styles List -->
    <div class="developer-list">
        <?php foreach ($developers as $dev): ?>
            <div class="developer-item"><?= htmlspecialchars($dev['name_en']) ?></div>
        <?php endforeach; ?>
    </div>

    <!-- Review Cards -->
    <div class="row">
        <?php foreach ($reviews as $r): ?>
            <?php
                // ✅ ลิงก์หน้า "View" ใช้ after_review_interior10.php เสมอ
                $viewLink = 'after_review_interior10.php?id=' . $r['id'];

                // ✅ ลิงก์หน้า "Edit" ใช้เฉพาะ admin_after_interiorX.php ถ้ามี
                $editLink = isset($customEditLinks[$r['id']])
                    ? $customEditLinks[$r['id']] . '?id=' . $r['id']
                    : 'add_interior1.php?id=' . $r['id'];
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
                        <button class="btn btn-danger delete-interior" data-id="<?= $r['id'] ?>">Delete</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Script -->
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
