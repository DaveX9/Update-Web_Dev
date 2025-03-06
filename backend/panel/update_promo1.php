<?php
include 'db.php';

// Get promo details
$id = $_GET['id'];
$query = "SELECT * FROM promo1 WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$promo = $result->fetch_assoc();

// Update promo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    // Handle image update
    $image = $promo['image'];
    if ($_FILES['image']['name']) {
        $target_dir = "uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    $update_query = "UPDATE promo1 SET title=?, description=?, image=? WHERE id=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssi", $title, $description, $image, $id);

    if ($stmt->execute()) {
        header("Location: admin_promo1.php");
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Update Promotion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

/* Container */
.container {
    max-width: 500px;
    background: white;
    padding: 20px;
    margin: auto;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Heading */
h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Labels */
label {
    display: block;
    font-weight: bold;
    margin: 10px 0 5px;
}

/* Input Fields */
input[type="text"], 
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 15px;
}

/* File Upload */
input[type="file"] {
    display: block;
    margin-bottom: 15px;
}

/* Image Preview */
img {
    display: block;
    max-width: 100%;
    border-radius: 8px;
    margin-top: 10px;
}

/* Submit Button */
button {
    width: 100%;
    background-color: #2d68c4;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 15px;
    transition: background 0.3s ease-in-out;
}

button:hover {
    background-color: #1d4c8c;
}

/* Responsive Design */
@media (max-width: 600px) {
    .container {
        width: 90%;
    }
}

</style>
<body>

<div class="container">
    <h2>Edit Promotion</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($promo['title']) ?>" required>

        <label>Description</label>
        <textarea name="description" required><?= htmlspecialchars($promo['description']) ?></textarea>

        <label>Upload New Image</label>
        <input type="file" name="image">
        <input type="hidden" name="existing_image" value="<?= $promo['image'] ?>">

        <img src="<?= $promo['image'] ?>" width="100" style="margin-top:10px;">

        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>
