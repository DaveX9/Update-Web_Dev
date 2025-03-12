<?php
include 'db.php';

// Fetch reviews with developer name
$query = "SELECT hr.*, d.name_en AS developer_name FROM home_reviews hr 
          JOIN developers1 d ON hr.developer_id = d.id 
          ORDER BY hr.created_at DESC";

$result = $conn->query($query);

// Debugging: Check if the query failed
if (!$result) {
    die("Query Failed: " . $conn->error);
}

$reviews = [];
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <h2>📌 Manage Reviews</h2>
    <div class="row">
        <?php foreach ($reviews as $review): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $review['thumbnail']; ?>" class="card-img-top thumbnail-click" data-id="<?php echo $review['id']; ?>" alt="Thumbnail">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($review['headline']); ?></h5>
                        <p class="card-text">Developer: <?php echo isset($review['developer_name']) ? htmlspecialchars($review['developer_name']) : 'Unknown'; ?></p>
                        <a href="edit_review.php?id=<?php echo $review['id']; ?>" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
$(document).ready(function () {
    $(".thumbnail-click").click(function () {
        var reviewId = $(this).data("id");
        window.location.href = "edit_review.php?id=" + reviewId;
    });
});
</script>

</body>
</html>
