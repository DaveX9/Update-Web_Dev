<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=homespector", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ✅ Fetch Services Section
$stmt = $pdo->query("SELECT * FROM services_section LIMIT 1");
$service = $stmt->fetch(PDO::FETCH_ASSOC);

// ✅ Handle Service Section Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["content"])) {
    $content = $_POST["content"];
    $phone = $_POST["phone"];

    $updateStmt = $pdo->prepare("UPDATE services_section SET content=?, phone=? WHERE id=1");
    $updateStmt->execute([$content, $phone]);

    $_SESSION['success'] = "Services section updated successfully!";
    header("Location: admin_services.php");
    exit();
}

// ✅ Handle Carousel Image Upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $stmt = $pdo->prepare("INSERT INTO service_carousel (heading, image) VALUES (?, ?)");
        $stmt->execute(["ราคาค่าบริการตรวจบ้านทาวน์โฮม", $fileName]);
        $_SESSION['success'] = "Image uploaded successfully!";
    } else {
        $_SESSION['error'] = "Failed to upload image.";
    }

    header("Location: admin_services.php");
    exit();
}

// ✅ Handle Carousel Image Deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM service_carousel WHERE id = ?");
    $stmt->execute([$id]);
    $_SESSION['success'] = "Image deleted successfully!";
    header("Location: admin_services.php");
    exit();
}

// ✅ Fetch Carousel Images
$stmt = $pdo->query("SELECT * FROM service_carousel");
$carousel_images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Services & Carousel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.17/css/froala_editor.pkgd.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.17/js/froala_editor.pkgd.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; text-align: center; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { margin-bottom: 20px; }
        form { text-align: left; }
        label { font-weight: bold; margin-top: 10px; display: block; }
        input, button { width: 100%; padding: 10px; margin: 10px 0; }
        button { background: #28a745; color: white; border: none; cursor: pointer; }
        .success { color: green; }
        .error { color: red; }
        .gallery { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-top: 20px; }
        .gallery img { width: 150px; border-radius: 10px; }
        .delete-btn { color: red; text-decoration: none; display: block; margin-top: 5px; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Manage Services & Carousel</h2>

        <?php if (isset($_SESSION['success'])): ?>
            <p class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <!-- ✅ Edit Service Section -->
        <form action="" method="post">
            <h3>Edit Service Section</h3>
            <label>Service Content:</label>
            <textarea id="froala-editor" name="content"><?php echo htmlspecialchars($service['content']); ?></textarea>
            
            <label>Phone Number:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($service['phone']); ?>" required>

            <button type="submit">Save Changes</button>
        </form>

        <!-- ✅ Upload Carousel Image -->
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Upload Carousel Image</h3>
            <input type="file" name="image" required>
            <button type="submit">Upload Image</button>
        </form>

        <!-- ✅ Display Carousel Images -->
        <div class="gallery">
            <?php foreach ($carousel_images as $image): ?>
                <div>
                    <img src="uploads/<?php echo htmlspecialchars($image['image']); ?>" alt="Carousel Image">
                    <a href="?delete=<?php echo $image['id']; ?>" class="delete-btn">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        new FroalaEditor('#froala-editor');
    </script>

</body>
</html>
