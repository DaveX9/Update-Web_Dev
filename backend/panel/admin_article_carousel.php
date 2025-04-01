<?php
$conn = new mysqli("localhost", "root", "", "homespector");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $link_url = trim($_POST['link_url']);

    $image_path = '';

    $upload_folder = __DIR__ . "/uploads/carousel/";
    $web_path = "/HOMESPECTOR/backend/panel/uploads/carousel/";
    
    if (!is_dir($upload_folder)) {
        mkdir($upload_folder, 0777, true);
    }
    
    $filename = uniqid() . "_" . basename($_FILES["image"]["name"]);
    $target_file = $upload_folder . $filename;
    $image_path = $web_path . $filename;
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO article_carousel (title, image_url, link_url) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $image_path, $link_url);
        $stmt->execute();
        $stmt->close();
    }

    // 🔁 Redirect เพื่อป้องกัน POST ซ้ำ
    header("Location: admin_article_carousel.php");
    exit;
}

$result = $conn->query("SELECT * FROM article_carousel ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>จัดการ Carousel</title>
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            margin: 0;
            padding: 30px 10px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            }

            .main-container {
            max-width: 800px;
            width: 100%;
            }

            /* Title */
            h2 {
            color: #333;
            margin-bottom: 10px;
            }

            /* Form */
            form {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            }

            input[type="text"],
            input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 8px;
            }

            button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            margin-top: 15px;
            cursor: pointer;
            }

            /* Carousel Items */
            .carousel-item {
            background: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            flex-wrap: wrap;
            }

            .carousel-item img {
            height: 70px;
            border-radius: 10px;
            margin-right: 20px;
            }

            .carousel-item div {
            flex: 1;
            min-width: 200px;
            }

            .actions {
                text-align: right;
                margin-left: auto;
            }

            .actions a {
            color: red;
            text-decoration: none;
            font-weight: bold;
            }

            /* Responsive Layout */
            @media screen and (max-width: 600px) {
            .carousel-item {
                flex-direction: column;
                text-align: center;
            }
            .carousel-item img {
                margin: 10px auto;
            }
            .actions {
                margin-top: 10px;
                margin-left: 0;
            }
            }

    </style>

</head>
<body>

<body>
    <div class="main-container">
    <h2>📸 เพิ่ม Carousel ใหม่</h2>
    <form method="post" enctype="multipart/form-data">
        <label>ชื่อบทความ:</label>
        <input type="text" name="title" required>
        <label>ลิงก์:</label>
        <input type="text" name="link_url" required>
        <label>เลือกรูปภาพ:</label>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">➕ เพิ่ม</button>
    </form>

    <h2>📋 รายการ Carousel</h2>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="carousel-item">
            <img src="<?= $row['image_url'] ?>" alt="thumb">
            <div>
                <strong><?= htmlspecialchars($row['title']) ?></strong><br>
                <small><?= $row['link_url'] ?></small>
            </div>
            <div class="actions">
                <a href="delete_article_carousel.php?id=<?= $row['id'] ?>" onclick="return confirm('ลบรายการนี้?')">🗑️ ลบ</a>
            </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>


</body>
</html>
