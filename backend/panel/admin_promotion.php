<?php
include 'db.php';

// Mapping กำหนดหน้าแก้ไขเฉพาะโปรบางตัว
$customEditLinks = [
    1 => 'admin_promo1.php', // สำหรับโปรโมชัน ตกแต่งฟรี
    2 => 'admin_promo2.php', // สำหรับโปร ทำบุญบ้าน
    3 => 'admin_promo3.php'  // สำหรับโปร รับของสมนาคุณ
];


// Fetch promotions from the database
$sql = "SELECT * FROM promotions ORDER BY position ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.14/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .button-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #2d68c4;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 16px;
        }

        .btn:hover { background-color: #1d4c8c; }
        .btn i { font-size: 18px; }

        .promotion-header {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
            padding-bottom: 5px;
            background-image: url('/HOMESPECTOR/img/web-bg.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: var(--font-color);
            width: 100vw;
            min-height: 60vh;
        }

        .promotion {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            margin-top: 90px;
            padding-bottom: 60px;
        }

        .promotion-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .promotion-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .promotion-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .promotion-card a {
            text-decoration: none;
        }

        .promotion-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .promotion-info {
            padding: 15px;
            text-align: left;
        }

        .promotion-info h3 {
            font-size: 1.2em;
            margin: 5px 0;
            color: #333;
            font-weight: bold;
        }

        .promotion-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .promotion-details span {
            background-color: var(--font3-color);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8em;
        }

        .arrow {
            margin-left: 10px;
        }

        .admin-buttons .btn {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
        }

        .btn-edit {
            background-color: #2d68c4;
        }

        .btn-edit:hover {
            background-color: #1d4c8c;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <h2>จัดการโปรโมชั่น</h2>

    <div class="button-container">
        <button class="btn" onclick="window.location.href='add_promotion.php'">
            <i class="fa-solid fa-plus"></i> เพิ่มโปรโมชั่น
        </button>
        <button class="btn" onclick="window.location.href='manage_promotion.php'">
            <i class="fa-solid fa-list"></i> จัดการแสดงผล
        </button>
    </div>

    <section class="promotion-header">
        <h1>สิทธิพิเศษ</h1>
        <h4>สิทธิพิเศษสำหรับลูกค้าที่ตรวจบ้าน/คอนโด กับเรา</h4>
        
        <section class="promotion">
            <div class="promotion-grid">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <!-- Debug: ID = <?= $row['id'] ?> | Title = <?= htmlspecialchars($row['title']) ?> -->

                    <div class="promotion-card">
                        <a href="<?= $row['link'] ?>">
                            <img src="<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                            <div class="promotion-info">
                                <h3><?= htmlspecialchars($row['title']) ?></h3>
                                <div class="promotion-details">
                                    <span>อ่านต่อ</span>
                                    <span class="arrow"><i class="fa-solid fa-circle-right"></i></span>
                                </div>
                            </div>
                        </a>

                        <div class="admin-buttons" style="display:flex; justify-content: space-around; padding: 10px;">
                            <?php
                                $editLink = isset($customEditLinks[$row['id']])
                                            ? $customEditLinks[$row['id']]
                                            : 'add_promotion.php?id=' . $row['id'];
                            ?>
                            <a href="<?= $editLink ?>" class="btn btn-edit">แก้ไข</a>
                            <a href="delete_promotion.php?id=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('คุณแน่ใจว่าต้องการลบโปรโมชั่นนี้?');">ลบ</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </section>

</body>
</html>
