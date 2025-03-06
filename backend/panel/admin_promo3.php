<?php
include 'db.php';

// Fetch promotions
$result = $conn->query("SELECT * FROM promo3 ORDER BY id ASC");

// Insert new promotion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image upload
    $image = "";
    if (!empty($_FILES['image']['name'])) {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/HOMESPECTOR/backend/panel/uploads/";
        $image_name = basename($_FILES["image"]["name"]);
        $image_path = "/HOMESPECTOR/backend/panel/uploads/" . $image_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $image_name)) {
            $image = $image_path;
        } else {
            die("File upload failed!");
        }
    }

    // Insert into database
    $sql = "INSERT INTO promo3 (title, description, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $description, $image);
    
    if ($stmt->execute()) {
        header("Location: admin_promo3.php");
        exit();
    } else {
        echo "Insert failed!";
    }
}

// Delete promotion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Ensure the ID exists before deleting
    $delete_query = "DELETE FROM promo3 WHERE id=?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: admin_promo3.php");
        exit();
    } else {
        echo "Delete failed!";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Manage Promotions</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: auto;
}

h2, h3 {
    text-align: center;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

button {
    background-color: #2d68c4;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    margin-top: 15px;
}

button:hover {
    background-color: #1d4c8c;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

th {
    background-color: #2d68c4;
    color: white;
}

tr:hover {
    background-color: #f1f1f1;
}

img {
    max-width: 100%;
    border-radius: 5px;
}

</style>
<body>

    <div class="container">
        <h2>Manage Promotions</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <label>Title</label>
            <input type="text" name="title" required>

            <label>Description</label>
            <textarea name="description" required></textarea>

            <label>Upload Image</label>
            <input type="file" name="image" required>

            <button type="submit" name="add">Add Promotion</button>
        </form>

        <h3>Existing Promotions</h3>
        <table border="1">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['description']) ?></td>
                    <td><img src="<?= $row['image'] ?>" width="50"></td>
                    <td>
                        <a href="update_promo2.php?id=<?= $row['id'] ?>">Edit</a>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>
