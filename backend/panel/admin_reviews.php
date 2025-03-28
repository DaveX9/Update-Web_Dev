<?php
include 'db.php';

// ✅ Mapping หน้าแก้ไขเฉพาะ
$customEditLinks = [
    1 => 'admin_after_review1.php',
    2 => 'admin_after_review2.php',
    3 => 'admin_after_review3.php',
    4 => 'admin_after_review4.php',
    5 => 'admin_after_review5.php',
    6 => 'admin_after_review6.php',
    7 => 'admin_after_review7.php',
    8 => 'admin_after_review8.php',
    9 => 'admin_after_review9.php'
];

// ✅ Fetch Reviews
$query = "SELECT hr.*, d.name_en AS developer_name FROM home_reviews hr 
            JOIN review_developer d ON hr.developer_id = d.id 
            ORDER BY hr.sort_order ASC";
$result = $conn->query($query);
$reviews = $result->fetch_all(MYSQLI_ASSOC);

// ✅ Fetch Developers
$devQuery = "SELECT name_en FROM review_developer ORDER BY id ASC";
$devResult = $conn->query($devQuery);
$developers = $devResult->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Reviews</title>
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
    <h2>📌 Manage Reviews</h2>

    <div class="mb-3 d-flex gap-2 flex-wrap">
        <a href="add_review.php" class="btn btn-success">➕ Add Review</a>
        <a href="admin_manage_review.php" class="btn btn-outline-primary">📝 จัดการการแสดงผล</a>
        <a href="admin_manage_developer_review.php" class="btn btn-outline-primary">📝 จัดการ Developers</a>
    </div>

    <!-- ✅ Developer Names Horizontal List -->
    <div class="developer-list">
        <?php foreach ($developers as $dev): ?>
            <div class="developer-item"><?= htmlspecialchars($dev['name_en']) ?></div>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <?php foreach ($reviews as $r): ?>
            <?php
                $viewLink = isset($customEditLinks[$r['id']])
                    ? $customEditLinks[$r['id']] . '?id=' . $r['id']
                    : 'after_review_home10.php?id=' . $r['id'];

                $editLink = isset($customEditLinks[$r['id']])
                    ? $customEditLinks[$r['id']] . '?id=' . $r['id']
                    : 'add_review.php?id=' . $r['id'];
            ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="/HOMESPECTOR/homepage/<?php echo $viewLink; ?>">
                        <img src="<?php echo $r['thumbnail']; ?>" class="card-img-top" alt="Thumbnail">
                    </a>
                    <div class="card-body">
                        <h5><?php echo $r['headline']; ?></h5>
                        <p>Developer: <?php echo $r['developer_name']; ?></p>
                        <a href="<?php echo $editLink; ?>" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger delete-review" data-id="<?php echo $r['id']; ?>">Delete</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('.delete-review').click(function () {
    if (confirm("Delete this review?")) {
        $.post("delete_review.php", { id: $(this).data("id") }, function () {
            location.reload();
        });
    }
});
</script>
</body>
</html>
