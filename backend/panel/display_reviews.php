<?php
// Include the database connection
include 'db.php';

// Check if $conn is set correctly
if (!isset($conn)) {
    die("Error: Database connection is not available.");
}

// Fetch reviews using MySQLi
$query = "SELECT * FROM home_reviews ORDER BY created_at DESC";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Fetch data as an associative array
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
    <title>Review List</title>
</head>
<body>

    <h2>All Reviews</h2>
    <?php foreach ($reviews as $review): ?>
        <div class="review-card">
            <h3><?php echo htmlspecialchars($review['headline']); ?></h3>
            <p><?php echo htmlspecialchars($review['short_detail']); ?></p>
            <?php if (!empty($review['thumbnail'])): ?>
                <img src="<?php echo htmlspecialchars($review['thumbnail']); ?>" alt="Thumbnail" width="200">
            <?php endif; ?>
            
            <div class="full-review">
                <?php echo htmlspecialchars_decode($review['review_detail']); ?>
            </div>

            <br>
            <a href="edit_review.php?id=<?php echo $review['id']; ?>">Edit</a> |
            <a href="delete_review.php?id=<?php echo $review['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </div>
    <?php endforeach; ?>

</body>
</html>
