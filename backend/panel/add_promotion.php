<?php
include 'db.php';

$editing = false;
$promoData = [
    'title' => '',
    'description' => '',
    'image' => '',
];

if (isset($_GET['id'])) {
    $editing = true;
    $id = intval($_GET['id']);
    
    $stmt = $conn->prepare("SELECT * FROM promotions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $promoData = $result->fetch_assoc();
    } else {
        echo "ไม่พบข้อมูลโปรโมชั่น";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'] ?? null;

    // Upload Image
    $image = $_POST['current_image'] ?? '';
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

    if ($id) {
        // Update
        $update = $conn->prepare("UPDATE promotions SET title = ?, description = ?, image = ? WHERE id = ?");
        $update->bind_param("sssi", $title, $description, $image, $id);
        $update->execute();
    } else {
        // Insert ใหม่
        $insert = $conn->prepare("INSERT INTO promotions (title, description, image, link) VALUES (?, ?, ?, '')");
        $insert->bind_param("sss", $title, $description, $image);
        if ($insert->execute()) {
            $last_id = $insert->insert_id;
            $link = "/HOMESPECTOR/Homepage/promo4.php?page=$last_id";
            $updateLink = $conn->prepare("UPDATE promotions SET link = ? WHERE id = ?");
            $updateLink->bind_param("si", $link, $last_id);
            $updateLink->execute();
        }
    }

    header("Location: admin_promotion.php");
    exit();
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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
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
            width: 95%;
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

        .promotion-details {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 750px;
        }

        .promotion-details h3 {
            text-align: center;
            color: #2d68c4;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>เพิ่มโปรโมชั่น</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php if ($editing): ?>
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="current_image" value="<?= htmlspecialchars($promoData['image']) ?>">
            <?php endif; ?>

            <label>ชื่อโปรโมชั่น</label>
            <input type="text" name="title" value="<?= htmlspecialchars($promoData['title']) ?>" required>

            <label>อัปโหลดรูป</label>
            <input type="file" name="image">
            <?php if ($editing && $promoData['image']): ?>
                <div>
                    <img src="<?= $promoData['image'] ?>" alt="" style="width: 200px; margin-top: 10px;">
                </div>
            <?php endif; ?>

            <div class="promotion-details">
                <h3>รายละเอียดโปรโมชั่น</h3>
                <label>รายละเอียด</label>
                <textarea name="description" id="froala-editor"><?= $promoData['description'] ?></textarea>
            </div>

            <button type="submit" class="btn-submit"><?= $editing ? 'อัปเดต' : 'บันทึก' ?></button>
        </form>
    </div>

    <script>
        new FroalaEditor('#froala-editor', {
            heightMin: 250,
            heightMax: 400,
            toolbarButtons: [
                'bold', 'italic', 'underline', 'strikeThrough', '|',
                'align', 'formatOL', 'formatUL', '|',
                'insertImage', 'insertLink', 'insertVideo', 'undo', 'redo'
            ],
            imageUploadURL: 'upload_promo_img.php',
            fileUploadURL: 'upload_file.php'
        });
    </script>

</body>
</html>
