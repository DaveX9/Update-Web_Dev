<?php
// Database Connection
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch single job details
if (isset($_GET['job_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM job_listings WHERE id = ?");
    $stmt->execute([$_GET['job_id']]);
    $job = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    die("Invalid job ID!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($job['title']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center"><?php echo htmlspecialchars($job['title']); ?></h2>
    <p><strong>Company:</strong> <?php echo htmlspecialchars($job['company_name']); ?></p>
    <p><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></p>
    <p><strong>Type:</strong> <?php echo htmlspecialchars($job['job_type']); ?></p>
    <p><strong>Salary:</strong> <?php echo htmlspecialchars($job['salary']); ?></p>
    <div><?php echo htmlspecialchars_decode($job['description']); ?></div>
    <a href="apply.php?job_id=<?php echo $job['id']; ?>" class="btn btn-success">Apply Now</a>
</div>

</body>
</html>
