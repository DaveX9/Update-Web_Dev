<?php
include 'db.php';

// ✅ Mapping หน้าแก้ไขเฉพาะ ID
$customEditLinks = [
    1 => 'admin_article_view1.php',
    2 => 'admin_article_view2.php',
    3 => 'admin_article_view3.php',
    4 => 'admin_article_view4.php',
    5 => 'admin_article_view5.php',
    6 => 'admin_article_view6.php',
    7 => 'admin_article_view7.php',
    8 => 'admin_article_view8.php',
    9 => 'admin_article_view9.php',
    10 => 'admin_article_view10.php',
];

// ✅ ดึงรายการบทความ
$articles = $conn->query("SELECT a.*, c.name_en AS category 
                        FROM articles a 
                        LEFT JOIN article_categories c ON a.category_id = c.id 
                        ORDER BY a.article_date DESC")->fetch_all(MYSQLI_ASSOC);

// ✅ ลบบทความ
if (isset($_POST['delete_id'])) {
    $id = (int)$_POST['delete_id'];
    $conn->query("DELETE FROM articles WHERE id = $id");
    header("Location: admin_article.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .category-tag {
        background: #e2e2e2;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 13px;
    }

    .card-link {
        text-decoration: none;
        color: inherit;
    }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2>📰 Manage Articles</h2>
        <a href="add_article.php" class="btn btn-success mb-3">➕ Add Article</a>

        <div class="row">
            <?php foreach ($articles as $a): ?>
            <?php
                $id = $a['id'];
                $editLink = isset($customEditLinks[$id])
                    ? $customEditLinks[$id] . "?id=$id"
                    : "add_article.php?id=$id";
                $viewLink = "/HOMESPECTOR/Homepage/articles_view11.php?id=$id";
            ?>
            <div class="col-md-4">
                <a href="<?= $viewLink ?>" class="card-link">
                    <div class="card mb-4">
                        <img src="<?= htmlspecialchars($a['thumbnail']) ?>" class="card-img-top" alt="Thumbnail">
                        <div class="card-body">
                            <h5><?= htmlspecialchars($a['title']) ?></h5>
                            <p class="category-tag"><?= htmlspecialchars($a['category']) ?> |
                                <?= htmlspecialchars($a['article_date']) ?></p>
                        </div>
                    </div>
                </a>
                <div class="mb-4 d-flex gap-2">
                    <a href="<?= $editLink ?>" class="btn btn-primary">Edit</a>
                    <!-- <a href="<?= $viewLink ?>" class="btn btn-secondary">View</a> -->
                    <form method="POST" onsubmit="return confirm('Delete this article?')">
                        <input type="hidden" name="delete_id" value="<?= $id ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>