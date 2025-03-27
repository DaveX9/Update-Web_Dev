<?php
include 'db.php';

// Insert new review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $name_en = $_POST['name_en'];
    $position = $_POST['position'];

    // Upload thumbnail
    $thumbnail = "";
    if (!empty($_FILES['thumbnail']['name'])) {
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/HOMESPECTOR/backend/panel/uploads/";
        $thumb_name = basename($_FILES["thumbnail"]["name"]);
        $thumb_path = "/HOMESPECTOR/backend/panel/uploads/" . $thumb_name;

        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $upload_dir . $thumb_name)) {
            $thumbnail = $thumb_path;
        } else {
            die("Thumbnail upload failed!");
        }
    }

    // Insert to DB
    $stmt = $conn->prepare("INSERT INTO after_review_developer1 (name_en, position, thumbnail) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name_en, $position, $thumbnail);
    $stmt->execute();
    $stmt->close();

    header("Location: admin_after_review1.php");
    exit;
}

// Fetch existing reviews
$reviews = $conn->query("SELECT * FROM after_review_developer1 ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Review Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <h2>Add New Review</h2>

    <form method="post" enctype="multipart/form-data" class="mb-5">
        <input type="hidden" name="add" value="1">

        <div class="mb-3">
            <label>Project Name</label>
            <input type="text" name="name_en" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="position" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Thumbnail Image</label>
            <input type="file" name="thumbnail" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add Review</button>
    </form>

    <h3>Existing Reviews</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thumbnail</th>
                <th>Project</th>
                <th>Description</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $reviews->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><img src="<?= $row['thumbnail'] ?>" style="width:100px;"></td>
                <td><?= htmlspecialchars($row['name_en']) ?></td>
                <td><?= htmlspecialchars($row['position']) ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
