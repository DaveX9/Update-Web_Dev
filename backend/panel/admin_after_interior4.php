<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "homespector");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Review ID
$id = 1;

// Paths
$upload_dir = __DIR__ . "/../../img/after_review/";
$upload_path = "/HomeSpector/img/after_review/";

// ✅ JSON API
if (isset($_GET['fetch']) && $_GET['fetch'] === 'json') {
    header('Content-Type: application/json');

    // JSON API response section
    $review = $conn->query("SELECT * FROM after_interior_developer4 WHERE id = $id")->fetch_assoc();
    $review['banner_image'] = $upload_path . $review['banner_image'];
    $review['description'] = htmlspecialchars_decode($review['description']); // <-- Keep <br> tags


    $images_result = $conn->query("SELECT * FROM after_interior_images4 WHERE review_id = $id");
    $images = [];
    while ($row = $images_result->fetch_assoc()) {
        $row['image_path'] = $upload_path . $row['image_path'];
        $images[] = $row;
    }

    echo json_encode([
        "review" => $review,
        "images" => $images
    ]);
    exit;
}

// Fetch data
$review = $conn->query("SELECT * FROM after_interior_developer4 WHERE id = $id")->fetch_assoc();
$images = $conn->query("SELECT * FROM after_interior_images4 WHERE review_id = $id");

// ✅ Update review
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_review'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);

    if (!empty($_FILES['banner_image']['name'])) {
        $banner = basename($_FILES['banner_image']['name']);
        move_uploaded_file($_FILES['banner_image']['tmp_name'], $upload_dir . $banner);
        $conn->query("UPDATE after_interior_developer4 SET title='$title', description='$description', banner_image='$banner' WHERE id=$id");
    } else {
        $conn->query("UPDATE after_interior_developer4 SET title='$title', description='$description' WHERE id=$id");
    }

    header("Location: admin_after_interior4.php");
    exit;
}

// ✅ Add image
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_image'])) {
    $alt = $conn->real_escape_string($_POST['alt_text']);
    if (!empty($_FILES['image']['name'])) {
        $img = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $img);
        $conn->query("INSERT INTO after_interior_images4 (review_id, image_path, alt_text) VALUES ($id, '$img', '$alt')");
    }

    header("Location: admin_after_interior4.php");
    exit;
}

// ✅ Delete image
if (isset($_GET['delete_image'])) {
    $img_id = intval($_GET['delete_image']);
    $conn->query("DELETE FROM after_interior_images4 WHERE id = $img_id");
    header("Location: admin_after_interior4.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.14/css/froala_editor.pkgd.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h2>Edit Review: <?= htmlspecialchars($review['title']) ?></h2>

    <!-- Review Form -->
    <form method="post" enctype="multipart/form-data" class="mb-5">
        <input type="hidden" name="update_review" value="1">

        <div class="mb-3">
            <label>Project Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($review['title']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" id="froala"><?= htmlspecialchars($review['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Banner Image</label>
            <input type="file" name="banner_image" class="form-control">
            <p>Current: <?= $review['banner_image'] ?></p>
            <img src="<?= $upload_path . $review['banner_image'] ?>" style="max-width: 300px;">
        </div>

        <button type="submit" class="btn btn-primary">Update Review</button>
    </form>

    <!-- Add Image -->
    <h4>Add Related Image</h4>
    <form method="post" enctype="multipart/form-data" class="mb-4">
        <input type="hidden" name="add_image" value="1">
        <div class="mb-2">
            <input type="file" name="image" required>
        </div>
        <div class="mb-2">
            <input type="text" name="alt_text" class="form-control" placeholder="Alt text" required>
        </div>
        <button class="btn btn-success">Upload Image</button>
    </form>

    <!-- Image List -->
    <h4>Uploaded Images</h4>
    <div class="row">
        <?php while($img = $images->fetch_assoc()): ?>
        <div class="col-md-3 mb-3">
            <img src="<?= $upload_path . $img['image_path'] ?>" class="img-fluid mb-1">
            <p><?= htmlspecialchars($img['alt_text']) ?></p>
            <a href="?delete_image=<?= $img['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this image?')">Delete</a>
        </div>
        <?php endwhile; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.0.14/js/froala_editor.pkgd.min.js"></script>
    <script>
        new FroalaEditor('#froala');
    </script>
</body>
</html>
