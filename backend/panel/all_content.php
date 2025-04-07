<?php
$pdo = new PDO("mysql:host=localhost;dbname=homespector;charset=utf8", "username", "password");

// === HANDLE DELETE ===
if (isset($_GET['delete_content'])) {
    $pdo->prepare("DELETE FROM content_items WHERE id = ?")->execute([$_GET['delete_content']]);
    header("Location: all_content.php"); // ✅ เปลี่ยนตรงนี้
    exit;
}

// ✅ Mapping content ID to specific admin edit pages
$customEditLinks = [
    1 => 'admin_content_episodes.php',
    2 => 'admin_content_episodes1.php',
    3 => 'admin_content_episodes2.php',
    4 => 'admin_content_episodes3.php',
    5 => 'admin_content_episodes4.php',
    6 => 'admin_content_episodes5.php',
];

// 🔍 FETCH content from admin_content_manager
$contents = $pdo->query("SELECT c.*, cat.name AS category_name FROM content_items c 
                        LEFT JOIN content_categories cat ON c.category_id = cat.id 
                        WHERE c.source = 'admin_content_manager'
                        ORDER BY c.created_at DESC")->fetchAll();

// 🔍 FETCH categories
$categories = $pdo->query("SELECT * FROM content_categories ORDER BY name")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Admin Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f9fc;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn-add {
            background-color: #2ecc71;
            color: white;
            padding: 10px 18px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-add:hover {
            background-color: #27ae60;
        }
        .category-filter {
            display: flex;
            gap: 10px;
        }
        .category-filter button {
            padding: 6px 12px;
            border: none;
            background-color: #ddd;
            border-radius: 6px;
            cursor: pointer;
        }
        .category-filter button.active {
            background-color: #3498db;
            color: white;
        }
        .content-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            text-decoration: none;
        }
        .card {
            width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s;
            text-decoration: none;
            color: inherit;
            padding: 10px;
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card .card-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 10px;
        }
        .card p {
            font-size: 14px;
            color: #333;
            margin: 0;
            flex: 1;
            text-align: left;
        }
        .card .icon.play-icon {
            font-size: 16px;
            color: #333;
            cursor: pointer;
            flex-shrink: 0;
            margin-left: 10px;
            transition: transform 0.3s ease, color 0.3s ease;
        }
        .card:hover .icon.play-icon {
            transform: scale(1.2);
            color: #007bff;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
        .btn {
            padding: 6px 12px;
            font-size: 0.9rem;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            text-align: center;
        }
        .btn-view { background-color: #3498db; }
        .btn-edit { background-color: #f39c12; }
        .btn-delete { background-color: #e74c3c; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body>

<h2>📦 All Content (Added from Admin)</h2>

<div class="top-bar">
    <a href="admin_content_manager.php" class="btn-add">➕ Add New Content</a>
    <div class="category-filter">
        <button class="filter-btn active" data-cat="all">All</button>
        <?php foreach ($categories as $cat): ?>
            <button class="filter-btn" data-cat="<?= htmlspecialchars($cat['name']) ?>">
                <?= htmlspecialchars($cat['name']) ?>
            </button>
        <?php endforeach; ?>
    </div>
</div>

<div class="content-cards" id="content-container">
    <?php foreach ($contents as $item): ?>
        <?php
        $contentId = $item['id'];
        $editLink = $customEditLinks[$contentId] ?? 'admin_content_manager.php';
        ?>
        <div class="card" data-category="<?= htmlspecialchars($item['category_name']) ?>">
            <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="Content Image">
            <div class="card-content">
                <p><?= htmlspecialchars($item['title']) ?></p>
            </div>
            <small>Category: <?= htmlspecialchars($item['category_name']) ?></small>
            <div class="actions">
                <a class="btn btn-view" href="<?= htmlspecialchars($item['link_url']) ?>" target="_blank">🔗 View</a>
                <a class="btn btn-edit" href="<?= $editLink ?>?edit_content=<?= $item['id'] ?>">✏️ Edit</a>
                <a class="btn btn-delete" href="all_content.php?delete_content=<?= $item['id'] ?>" onclick="return confirm('Delete this content?')">🗑️ Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    const buttons = document.querySelectorAll(".filter-btn");
    const cards = document.querySelectorAll(".card");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const category = btn.dataset.cat;
            cards.forEach(card => {
                card.style.display = (category === "all" || card.dataset.category === category)
                    ? "block" : "none";
            });
        });
    });
</script>

</body>
</html>
