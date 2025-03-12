<?php
include 'db.php';

// Ensure an ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: No review ID provided.");
}

$id = $_GET['id'];

// Fetch the review data
$stmt = $conn->prepare("SELECT * FROM home_reviews WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$review = $result->fetch_assoc();

// Fetch all developers
$devQuery = "SELECT * FROM developers1 ORDER BY position ASC";
$devResult = $conn->query($devQuery);
$developers = [];
while ($dev = $devResult->fetch_assoc()) {
    $developers[] = $dev;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/css/froala_editor.pkgd.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/js/froala_editor.pkgd.min.js"></script>
</head>
<style>
    /* Global Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

/* Container */
.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

/* Page Title */
h2 {
    color: #002d5b;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

/* Review Cards */
.card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    background: #fff;
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-body {
    padding: 15px;
    text-align: center;
}

.card-title {
    font-size: 18px;
    font-weight: bold;
    color: #002d5b;
}

.card-text {
    font-size: 14px;
    color: #555;
    margin-bottom: 10px;
}

/* Edit Button */
.btn-primary {
    background-color: #002d5b;
    border: none;
    padding: 8px 15px;
    font-size: 14px;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-primary:hover {
    background-color: #004080;
}

/* Responsive Grid */
@media (max-width: 992px) {
    .col-md-4 {
        width: 50%;
    }
}

@media (max-width: 768px) {
    .col-md-4 {
        width: 100%;
    }
}

</style>
<body>

<div class="container mt-4">
    <h2>📝 Edit Review</h2>
    <form action="update_review.php" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<?php echo $review['id']; ?>">

        <label>เลือก Developer:</label>
        <select name="developer_id">
            <?php foreach ($developers as $dev): ?>
                <option value="<?php echo $dev['id']; ?>" 
                    <?php echo ($review['developer_id'] == $dev['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($dev['name_en']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>ภาพ Thumbnail:</label>
        <input type="file" name="thumbnail" accept="image/*">
        <?php if (!empty($review['thumbnail'])): ?>
            <br><img src="<?php echo $review['thumbnail']; ?>" alt="Thumbnail" width="100">
        <?php endif; ?>

        <label>Headline:</label>
        <input type="text" name="headline" value="<?php echo htmlspecialchars($review['headline']); ?>" required>

        <label>Short detail:</label>
        <textarea name="short_detail"><?php echo htmlspecialchars($review['short_detail']); ?></textarea>

        <label>Review Detail:</label>
        <textarea id="editor" name="review_detail"><?php echo htmlspecialchars_decode($review['review_detail']); ?></textarea>

        <button type="submit">📝 Update Review</button>
    </form>
</div>

<script>
$(function() {
    new FroalaEditor('#editor', {
        heightMin: 300,
        heightMax: 600,
        toolbarButtons: ['bold', 'italic', 'underline', '|', 'insertImage', 'html']
    });
});
</script>

</body>
</html>
