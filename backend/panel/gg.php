<?php
include 'db.php';

// Fetch promotions from the database
$sql = "SELECT * FROM promotions ORDER BY position ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>โปรโมชั่น</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/promotion.css"> <!-- Add your custom CSS file -->
</head>
<body>

    <section class="promotion-header" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
        <h1>สิทธิพิเศษ</h1>
        <h4>สิทธิพิเศษสำหรับลูกค้าที่ตรวจบ้าน/คอนโด กับเรา</h4>
        
        <section class="promotion" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">
            <div class="promotion-grid">
                <?php while ($row = $result->fetch_assoc()): ?>
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
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </section>

</body>
</html>
