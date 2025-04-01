<?php
include 'db.php';

// ✅ Handle Move
if (isset($_POST['move'])) {
    $id = (int) $_POST['id'];
    $direction = $_POST['move'];

    $current = $conn->query("SELECT id, sort_order FROM interior_videos WHERE id = $id")->fetch_assoc();
    if (!$current) exit('Invalid ID');

    $operator = $direction === 'up' ? '<' : '>';
    $order = $direction === 'up' ? 'DESC' : 'ASC';

    $neighbor = $conn->query("SELECT id, sort_order FROM interior_videos WHERE sort_order $operator {$current['sort_order']} ORDER BY sort_order $order LIMIT 1")->fetch_assoc();

    if ($neighbor) {
        $conn->query("UPDATE interior_videos SET sort_order = {$neighbor['sort_order']} WHERE id = {$current['id']}");
        $conn->query("UPDATE interior_videos SET sort_order = {$current['sort_order']} WHERE id = {$neighbor['id']}");
    }
    exit;
}

// ✅ Handle Delete
if (isset($_POST['delete_id'])) {
    $id = (int) $_POST['delete_id'];
    $conn->query("DELETE FROM interior_videos WHERE id = $id");
    exit;
}

// ✅ Load Data
$videos = $conn->query("SELECT * FROM interior_videos ORDER BY sort_order ASC")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Interior Videos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>🎥 จัดการวิดีโอตกแต่งภายใน</h2>

    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>YouTube Link</th>
                <th width="180">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($videos as $video): ?>
            <tr>
                <td><?= htmlspecialchars($video['youtube_link']) ?></td>
                <td class="text-center">
                    <button class="btn btn-outline-secondary btn-sm move-btn" data-id="<?= $video['id'] ?>" data-dir="up">⬆️</button>
                    <button class="btn btn-outline-secondary btn-sm move-btn" data-id="<?= $video['id'] ?>" data-dir="down">⬇️</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?= $video['id'] ?>">🗑️</button>
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
    $.post('admin_manage_videos.php', { id, move: dir }, function() {
        location.reload();
    });
});

$('.delete-btn').click(function() {
    if (confirm("ต้องการลบวิดีโอนี้หรือไม่?")) {
        const id = $(this).data('id');
        $.post('admin_manage_videos.php', { delete_id: id }, function() {
            location.reload();
        });
    }
});
</script>
</body>
</html>
