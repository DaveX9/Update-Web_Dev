<?php
include 'db.php';

// ✅ จัดเรียงใหม่
if (isset($_POST['move'])) {
    $id = (int) $_POST['id'];
    $direction = $_POST['move'];

    $current = $conn->query("SELECT id, sort_order FROM home_reviews WHERE id = $id")->fetch_assoc();
    if (!$current) exit('Invalid ID');

    $operator = $direction === 'up' ? '<' : '>';
    $order = $direction === 'up' ? 'DESC' : 'ASC';

    $neighbor = $conn->query("SELECT id, sort_order FROM home_reviews WHERE sort_order $operator {$current['sort_order']} ORDER BY sort_order $order LIMIT 1")->fetch_assoc();

    if ($neighbor) {
        $conn->query("UPDATE home_reviews SET sort_order = {$neighbor['sort_order']} WHERE id = {$current['id']}");
        $conn->query("UPDATE home_reviews SET sort_order = {$current['sort_order']} WHERE id = {$neighbor['id']}");
    }
    exit;
}

// ✅ ลบรายการ
if (isset($_POST['delete_id'])) {
    $id = (int) $_POST['delete_id'];
    $conn->query("DELETE FROM home_reviews WHERE id = $id");
    exit;
}

$query = "SELECT * FROM home_reviews ORDER BY sort_order ASC";
$result = $conn->query($query);
$reviews = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reorder Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .btn-blue {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .btn-blue:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="container mt-4">
    <h2 class="mb-4">📝 จัดการการแสดงผล</h2>

    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Headline</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($reviews as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['headline']) ?></td>
                <td class="text-center">
                    <button class="btn btn-outline-secondary btn-sm move-btn" data-id="<?= $r['id'] ?>" data-dir="up">⬆️</button>
                    <button class="btn btn-outline-secondary btn-sm move-btn" data-id="<?= $r['id'] ?>" data-dir="down">⬇️</button>
                    <button class="btn btn-blue btn-sm delete-btn" data-id="<?= $r['id'] ?>">🗑️</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('.move-btn').click(function() {
    const id = $(this).data('id');
    const dir = $(this).data('dir');

    $.post('admin_manage_review.php', { id, move: dir }, function() {
        location.reload();
    });
});

$('.delete-btn').click(function() {
    if (confirm('ต้องการลบรีวิวนี้หรือไม่?')) {
        const id = $(this).data('id');
        $.post('admin_manage_review.php', { delete_id: id }, function() {
            location.reload();
        });
    }
});
</script>
</body>
</html>
