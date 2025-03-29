<?php
include 'db.php';

$query = "SELECT hr.*, d.name_en AS developer_name 
            FROM inetrior_reviews1 hr 
            JOIN review_developer d ON hr.developer_id = d.id 
            ORDER BY hr.sort_order ASC";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>After Review Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .review-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        }
        .review-cards .card {
        text-decoration: none;
        color: #000;
        transition: 0.3s;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        }
        .review-cards .card:hover {
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .review-cards img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        }
        .review-cards p {
        padding: 10px;
        font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h2 class="mb-4">🏡 รีวิวโครงการบ้าน</h2>
        <div class="review-cards">
            <?php while ($row = $result->fetch_assoc()): 
            $category = htmlspecialchars($row['developer_name']);
            $thumbnail = !empty($row['thumbnail']) ? $row['thumbnail'] : '/HOMESPECTOR/img/default.jpg';
            $link = "/HOMESPECTOR/Homepage/after_interior_home10.php?id=" . $row['id'];
            ?>
            <a href="<?php echo $link; ?>" class="card" data-category="<?php echo $category; ?>">
                <img src="<?php echo $thumbnail; ?>" alt="Review Image">
                <p><?php echo htmlspecialchars($row['headline']); ?></p>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>