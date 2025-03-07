<?php
include 'db.php';

// Validate `id` parameter
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid promotion ID");
}

$id = $_GET['id'];

// Fetch promotion details
$query = "SELECT * FROM promotions WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$promo = $result->fetch_assoc();

if (!$promo) {
    die("Promotion not found");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($promo['title']) ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h2><?= htmlspecialchars($promo['title']) ?></h2>
        <img src="<?= htmlspecialchars($promo['image']) ?>" width="100%">
        <p><?= htmlspecialchars($promo['description']) ?></p>
        <a href="<?= htmlspecialchars($promo['link']) ?>" target="_blank" class="btn-submit">Go to Promotion</a>
    </div>

</body>
</html>