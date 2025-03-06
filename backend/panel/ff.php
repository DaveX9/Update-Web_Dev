<?php
include 'db.php';

// Fetch promotions from database
$promo_query = "SELECT * FROM promo3 WHERE type='promotion' ORDER BY id ASC";
$promo_result = $conn->query($promo_query);

// Fetch services from database
$service_query = "SELECT * FROM promo3 WHERE type='service' ORDER BY id ASC";
$service_result = $conn->query($service_query);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>โปรโมชั่น & สิทธิพิเศษ</title>
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/allpromo.css">
</head>
<body>

    <!-- Promotion Section -->
    <section class="promotion-container">
        <div class="card-row">
            <?php while ($row = $promo_result->fetch_assoc()): ?>
                <div class="card">
                    <img src="<?= htmlspecialchars($row['image']) ?>" alt="Promotion Image">
                </div>
            <?php endwhile; ?>
        </div>
        <!-- Modal for Fullscreen Image -->
        <div id="imageModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="fullImage">
        </div>

        <!-- Services Section -->
        <section class="service-container">
            <h2>สำหรับลูกค้า ต.ตรวจบ้าน รับเลย!</h2>
            <div class="service-list">
                <?php while ($row = $service_result->fetch_assoc()): ?>
                    <div class="service-item">
                        <img src="<?= htmlspecialchars($row['image']) ?>" alt="Service Image">
                        <div class="service-text">
                            <h3><?= htmlspecialchars($row['title']) ?></h3>
                            <p><?= htmlspecialchars($row['description']) ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </section>





<script src="/HOMESPECTOR/JS/promo_img_zoom.js"></script>

</body>
</html>
