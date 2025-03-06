<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    
    // จัดการอัปโหลดรูปภาพ
    $image = "";
    if ($_FILES['image']['name']) {
        $target_dir = "uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    // หา position สูงสุด
    $result = $conn->query("SELECT MAX(position) AS max_pos FROM promotions");
    $row = $result->fetch_assoc();
    $new_position = $row['max_pos'] + 1;

    $sql = "INSERT INTO promotions (title, description, image, link, position) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $description, $image, $link, $new_position);
    
    if ($stmt->execute()) {
        header("Location: admin_promotion.php");
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มโปรโมชั่น</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.14/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.14/js/froala_editor.pkgd.min.js"></script>
    
    <style>
        /* ตั้งค่าพื้นฐานของหน้า */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #555;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        .btn-submit {
            display: block;
            width: 100%;
            background-color: #2d68c4;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }

        .btn-submit:hover {
            background-color: #1d4c8c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>เพิ่มโปรโมชั่น</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>ชื่อโปรโมชั่น</label>
            <input type="text" name="title" required>

            <label>รายละเอียด</label>
            <textarea name="description" id="froala-editor"></textarea>

            <label>อัปโหลดรูป</label>
            <input type="file" name="image">

            <label>ลิงก์ไปยังหน้าโปรโมชั่น</label>
            <input type="text" name="link">

            <button type="submit" class="btn-submit">บันทึก</button>
        </form>
    </div>

    <script>
        new FroalaEditor('#froala-editor');
    </script>
</body>
</html>
