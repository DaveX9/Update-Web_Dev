<?php
include 'db.php';

// เพิ่ม developer ใหม่
if (isset($_POST['add'])) {
    $conn->query("INSERT INTO review_developer (name_en, position) VALUES ('', 9999)");
    header("Location: admin_manage_developer_review.php");
    exit;
}

// ลบ developer
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM review_developer WHERE id = $id");
    header("Location: admin_manage_developer_review.php");
    exit;
}

// สลับตำแหน่ง
if (isset($_POST['move'])) {
    $id = (int)$_POST['id'];
    $direction = $_POST['move'];

    $current = $conn->query("SELECT id, position FROM review_developer WHERE id = $id")->fetch_assoc();
    if (!$current) exit;

    $operator = $direction === 'up' ? '<' : '>';
    $order = $direction === 'up' ? 'DESC' : 'ASC';

    $neighbor = $conn->query("SELECT id, position FROM review_developer WHERE position $operator {$current['position']} ORDER BY position $order LIMIT 1")->fetch_assoc();

    if ($neighbor) {
        $conn->query("UPDATE review_developer SET position = {$neighbor['position']} WHERE id = {$current['id']}");
        $conn->query("UPDATE review_developer SET position = {$current['position']} WHERE id = {$neighbor['id']}");
    }

    header("Location: admin_manage_developer_review.php");
    exit;
}

// อัปเดตชื่อ
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    foreach ($_POST['name_th'] as $id => $name) {
        $name = $conn->real_escape_string($name);
        $conn->query("UPDATE review_developer SET name_en = '$name' WHERE id = $id");
    }
    header("Location: admin_manage_developer_review.php");
    exit;
}

$developers = $conn->query("SELECT * FROM review_developer ORDER BY position ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>จัดการ Developer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h3>📋 จัดการ Developer</h3>
    <form method="post" class="mb-3 d-flex gap-2">
        <button name="add" class="btn btn-primary">➕ เพิ่ม Developer</button>
    </form>

    <form method="post">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ชื่อโครงการ</th>
                    <th width="120">ตำแหน่ง</th>
                    <th width="80"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dev = $developers->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <input type="text" name="name_th[<?= $dev['id'] ?>]" value="<?= htmlspecialchars($dev['name_en']) ?>" class="form-control">
                        </td>
                        <td class="text-center">
                            <form method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?= $dev['id'] ?>">
                                <button name="move" value="up" class="btn btn-sm btn-outline-secondary">⬆️</button>
                                <button name="move" value="down" class="btn btn-sm btn-outline-secondary">⬇️</button>
                            </form>
                        </td>
                        <td class="text-center">
                            <a href="?delete=<?= $dev['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('ลบรายการนี้?')">🗑</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button name="save" class="btn btn-primary">💾 Save</button>
    </form>
</body>
</html>
