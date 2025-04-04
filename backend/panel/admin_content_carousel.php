<?php
// db connection
$conn = new mysqli("localhost", "username", "password", "homespector");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// DELETE
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $conn->query("DELETE FROM carousel_items WHERE id = $delete_id");
    $conn->query("DELETE FROM carousel_thumbnails WHERE carousel_item_id = $delete_id");
    header("Location: admin_content_carousel.php");
    exit;
}

// EDIT
$edit_mode = false;
$edit_data = [];
if (isset($_GET['edit'])) {
    $edit_mode = true;
    $edit_id = intval($_GET['edit']);
    $result = $conn->query("SELECT c.*, t.thumbnail_url FROM carousel_items c LEFT JOIN carousel_thumbnails t ON c.id = t.carousel_item_id WHERE c.id = $edit_id");
    $edit_data = $result->fetch_assoc();
}

// SUBMIT
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $episodes = $_POST['episodes'];
    $description = $_POST['description'];
    $link_url = $_POST['link_url'];
    $sort_order = $_POST['sort_order'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    $target_dir = "uploads/";
    $image_url = $_POST['existing_image'] ?? "";
    $thumb_url = $_POST['existing_thumb'] ?? "";

    if ($_FILES['image_url']['tmp_name']) {
        $image_url = '/HOMESPECTOR/backend/panel/' . $target_dir . basename($_FILES["image_url"]["name"]);
        move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_dir . basename($_FILES["image_url"]["name"]));
    }

    if ($_FILES['thumbnail_url']['tmp_name']) {
        $thumb_url = '/HOMESPECTOR/backend/panel/' . $target_dir . basename($_FILES["thumbnail_url"]["name"]);
        move_uploaded_file($_FILES["thumbnail_url"]["tmp_name"], $target_dir . basename($_FILES["thumbnail_url"]["name"]));
    }

    if (isset($_POST['edit_id'])) {
        $edit_id = intval($_POST['edit_id']);
        $stmt = $conn->prepare("UPDATE carousel_items SET title=?, episodes=?, description=?, image_url=?, link_url=?, sort_order=?, is_active=? WHERE id=?");
        $stmt->bind_param("ssssssii", $title, $episodes, $description, $image_url, $link_url, $sort_order, $is_active, $edit_id);
        $stmt->execute();
        $stmt->close();

        $stmt2 = $conn->prepare("UPDATE carousel_thumbnails SET thumbnail_url=? WHERE carousel_item_id=?");
        $stmt2->bind_param("si", $thumb_url, $edit_id);
        $stmt2->execute();
        $stmt2->close();

        echo "<p style='color:orange'>✅ Carousel item updated successfully!</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO carousel_items (title, episodes, description, image_url, link_url, sort_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $title, $episodes, $description, $image_url, $link_url, $sort_order, $is_active);
        $stmt->execute();
        $carousel_id = $stmt->insert_id;
        $stmt->close();

        $stmt2 = $conn->prepare("INSERT INTO carousel_thumbnails (carousel_item_id, thumbnail_url) VALUES (?, ?)");
        $stmt2->bind_param("is", $carousel_id, $thumb_url);
        $stmt2->execute();
        $stmt2->close();

        echo "<p style='color:green'>✅ Carousel item added successfully!</p>";
    }

    echo "<meta http-equiv='refresh' content='1;url=admin_content_carousel.php'>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Carousel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f7f7f7;

        }
        h2 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin-bottom: 40px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], input[type="file"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        .carousel-item-preview {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .carousel-item-preview img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 10px;
            border-radius: 8px;
        }
        .carousel-meta {
            margin-top: 10px;
            font-size: 0.95rem;
            color: #555;
        }
        .btn-actions a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
        }
        .btn-actions a:hover {
            text-decoration: underline;
        }

    /* .carousel-item-preview */
        .carousel-item-preview {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-width: 1050px;
        }

        .carousel-item-preview strong {
            font-size: 18px;
            color: #333;
        }

        .carousel-item-preview img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .carousel-meta {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }

        .carousel-meta a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-actions {
            margin-top: 10px;
        }

        .btn-actions a {
            display: inline-block;
            margin-right: 10px;
            color: #fff;
            background-color: #007bff;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-actions a:hover {
            background-color: #0056b3;
        }

        /* Responsive styles */
        @media screen and (min-width: 768px) {
        .carousel-item-preview {
            flex-direction: row;
            align-items: flex-start;
        }

        .carousel-item-preview img {
            max-width: 200px;
        }

        .carousel-item-preview > div {
            flex: 1;
            margin-left: 20px;
        }
        }

        @media screen and (max-width: 767px) {
        .btn-actions a {
            display: block;
            margin-bottom: 8px;
            width: 100%;
            text-align: center;
        }

        .carousel-meta {
            font-size: 13px;
        }
        }

    </style>
</head>
<body>

<h2><?= $edit_mode ? '✏️ Edit Carousel Item' : '🛠 Add New Carousel Item' ?></h2>
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="edit_id" value="<?= $edit_data['id'] ?? '' ?>">
    <label>Title:</label>
    <input type="text" name="title" value="<?= $edit_data['title'] ?? '' ?>" required>

    <label>Episodes:</label>
    <input type="text" name="episodes" value="<?= $edit_data['episodes'] ?? '' ?>">

    <label>Description:</label>
    <textarea name="description" rows="4"><?= $edit_data['description'] ?? '' ?></textarea>

    <label>Link URL:</label>
    <input type="text" name="link_url" value="<?= $edit_data['link_url'] ?? '' ?>">

    <label>Main Image:</label>
    <?php if (!empty($edit_data['image_url'])): ?>
        <img src="<?= $edit_data['image_url'] ?>" width="100"><br>
        <input type="hidden" name="existing_image" value="<?= $edit_data['image_url'] ?>">
    <?php endif; ?>
    <input type="file" name="image_url" <?= $edit_mode ? '' : 'required' ?>>

    <label>Thumbnail Image:</label>
    <?php if (!empty($edit_data['thumbnail_url'])): ?>
        <img src="<?= $edit_data['thumbnail_url'] ?>" width="100"><br>
        <input type="hidden" name="existing_thumb" value="<?= $edit_data['thumbnail_url'] ?>">
    <?php endif; ?>
    <input type="file" name="thumbnail_url" <?= $edit_mode ? '' : 'required' ?>>

    <label>Sort Order:</label>
    <input type="number" name="sort_order" value="<?= $edit_data['sort_order'] ?? 1 ?>">

    <label>Active:</label>
    <input type="checkbox" name="is_active" <?= (!isset($edit_data['is_active']) || $edit_data['is_active']) ? 'checked' : '' ?>>

    <br><br>
    <input type="submit" value="<?= $edit_mode ? 'Update Carousel' : 'Save Carousel' ?>">
</form>

<hr>

<h2>📋 Carousel Items List</h2>
<?php
$result = $conn->query("SELECT c.*, t.thumbnail_url FROM carousel_items c LEFT JOIN carousel_thumbnails t ON c.id = t.carousel_item_id ORDER BY c.sort_order ASC");

while ($row = $result->fetch_assoc()) {
    echo "<div class='carousel-item-preview'>";
    echo "<strong>{$row['title']}</strong> ({$row['episodes']})<br>";
    echo "<img src='{$row['image_url']}' alt='Main Image'>";
    echo "<img src='{$row['thumbnail_url']}' alt='Thumbnail' width='100'>";
    echo "<div class='carousel-meta'>";
    echo "<a href='{$row['link_url']}' target='_blank'>🔗 View Link</a><br>";
    echo "Sort Order: {$row['sort_order']} | Active: " . ($row['is_active'] ? "✅ Yes" : "❌ No") . "<br>";
    echo "<div class='btn-actions'>";
    echo "<a href='?edit={$row['id']}'>✏️ Edit</a>";
    echo "<a href='?delete={$row['id']}' onclick=\"return confirm('Are you sure?')\">🗑️ Delete</a>";
    echo "</div>";
    echo "</div></div>";
}
$conn->close();
?>

</body>
</html>
