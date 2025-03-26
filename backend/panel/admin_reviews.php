<?php
include 'db.php';
$query = "SELECT hr.*, d.name_en AS developer_name FROM home_reviews hr 
            JOIN review_developer d ON hr.developer_id = d.id 
            ORDER BY hr.created_at DESC";
$result = $conn->query($query);
$reviews = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card-img-top { height: 200px; object-fit: cover; }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2>📌 Manage Reviews</h2>
    <a href="add_review.php" class="btn btn-success mb-3">➕ Add Review</a>
    <div class="row">
        <?php foreach ($reviews as $r): ?>
            <div class="col-md-4">
                <div class="card">
                    <a href="/HOMESPECTOR/homepage/after_review_home10.php?id=<?php echo $r['id']; ?>">
                        <img src="<?php echo $r['thumbnail']; ?>" class="card-img-top" alt="Thumbnail">
                    </a>
                    <div class="card-body">
                        <h5><?php echo $r['headline']; ?></h5>
                        <p>Developer: <?php echo $r['developer_name']; ?></p>
                        <a href="add_review.php?id=<?php echo $r['id']; ?>" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger delete-review" data-id="<?php echo $r['id']; ?>">Delete</button>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('.delete-review').click(function () {
    if (confirm("Delete this review?")) {
        $.post("delete_review.php", { id: $(this).data("id") }, function () {
            location.reload();
        });
    }
});
</script>
</body>
</html>
