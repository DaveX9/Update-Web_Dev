<?php
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM promotions WHERE id = ?");
$stmt->execute([$id]);
$promo = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($promo['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($promo['title']) ?></h1>
    <img src="<?= $promo['image'] ?>" style="max-width: 400px;">
    <div><?= $promo['detail'] ?></div>
</body>
</html>
