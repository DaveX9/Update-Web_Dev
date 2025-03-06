<?php
// include 'db.php'; 

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $title = $_POST['title'];
//     $description = $_POST['description'];
//     $link = $_POST['link'];


//     $image = "";
//     if (!empty($_FILES['image']['name'])) {
//         $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/HOMESPECTOR/backend/panel/uploads/";
//         $image_name = basename($_FILES["image"]["name"]);
//         $image_path = "/HOMESPECTOR/backend/panel/uploads/" . $image_name;

//         if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $image_name)) {
//             $image = $image_path;
//         } else {
//             die("File upload failed!");
//         }
//     }


//     $result = $conn->query("SELECT MAX(position) AS max_pos FROM promotions");
//     $row = $result->fetch_assoc();
//     $new_position = $row['max_pos'] + 1;


//     $sql = "INSERT INTO promotions (title, description, image, link, position) VALUES (?, ?, ?, ?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ssssi", $title, $description, $image, $link, $new_position);
    
//     if ($stmt->execute()) {
//         header("Location: admin_promotion.php");
//         exit();
//     } else {
//         echo "Insert failed!";
//     }
// }
?>

<!--
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
</html> -->


<?php
include 'db.php';

// Fetch promotions
$result = $conn->query("SELECT * FROM promotions ORDER BY position ASC");

// Initialize empty variables to avoid warnings
$title = $description = $link = "";

// Insert new promotion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if keys exist before accessing them to prevent warnings
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $link = isset($_POST['link']) ? $_POST['link'] : '';

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

    // Get the highest position
    $result_pos = $conn->query("SELECT MAX(position) AS max_pos FROM promotions");
    $row = $result_pos->fetch_assoc();
    $new_position = ($row['max_pos'] ?? 0) + 1;

    // Insert into database
    $sql = "INSERT INTO promotions (title, description, image, link, position) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $description, $image, $link, $new_position);
    
    if ($stmt->execute()) {
        header("Location: add_promotion.php");
        exit();
    } else {
        echo "Insert failed!";
    }
}
?>


<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Manage Promotions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor/css/froala_editor.pkgd.min.css">
</head>
<style>
    /* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #f6d365, #fda085);
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

/* Main Container */
.container {
    background: #ffffff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 750px;
    text-align: center;
    animation: fadeIn 0.5s ease-in-out;
}

/* Headings */
h2, h3 {
    color: #444;
    font-weight: 600;
    margin-bottom: 15px;
}

/* Forms */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Labels */
label {
    font-weight: bold;
    color: #555;
    text-align: left;
    display: block;
    margin-bottom: 5px;
}

/* Input Fields & Textarea */
input[type="text"], textarea, input[type="file"] {
    width: 100%;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    transition: all 0.3s ease-in-out;
    outline: none;
}

input:focus, textarea:focus {
    border-color: #ff6f61;
    box-shadow: 0 0 8px rgba(255, 111, 97, 0.3);
}

/* Buttons */
.btn-submit, .btn-edit, .btn-delete {
    display: inline-block;
    padding: 12px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    text-decoration: none;
}

/* Add Button */
.btn-submit {
    background: linear-gradient(135deg, #ff758c, #ff7eb3);
    color: white;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #ff6f61, #ff477e);
}

/* Edit Button */
.btn-edit {
    background: linear-gradient(135deg, #42a5f5, #478ed1);
    color: white;
}

.btn-edit:hover {
    background: linear-gradient(135deg, #1e88e5, #1565c0);
}

/* Delete Button */
.btn-delete {
    background: linear-gradient(135deg, #ff5e62, #ff9966);
    color: white;
}

.btn-delete:hover {
    background: linear-gradient(135deg, #ff3b4a, #ff704d);
}

/* Promotion Table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 15px;
    border-bottom: 1px solid #eee;
    text-align: center;
}

th {
    background: linear-gradient(135deg, #42a5f5, #5c6bc0);
    color: white;
}

tr:hover {
    background: #f1f1f1;
}

/* Promotion Image */
.promo-img {
    max-width: 100px;
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.promo-img:hover {
    transform: scale(1.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 90%;
    }

    .promo-img {
        width: 80%;
    }
}

/* Fade In Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>
<body>

    <div class="container">
        <h2>Manage Promotions</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Title</label>
            <input type="text" name="title" required>

            <label>Description</label>
            <textarea name="description" id="froala-editor"></textarea>

            <label>Upload Image</label>
            <input type="file" name="image">

            <label>Link to Promotion</label>
            <input type="text" name="link">

            <button type="submit" class="btn-submit">Add Promotion</button>
        </form>

        <h3>Existing Promotions</h3>
        <table border="1">
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td>
                        <a href="view_promotion.php?id=<?= $row['id'] ?>">
                            <img src="<?= htmlspecialchars($row['image']) ?>" width="100">
                        </a>
                    </td>
                    <td>
                        <a href="update_promotion.php?id=<?= $row['id'] ?>">Edit</a>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.14/js/froala_editor.pkgd.min.js"></script>
    <script>
        new FroalaEditor('#froala-editor');
    </script>

</body>
</html>
