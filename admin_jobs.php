<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Insert Job Post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO job_listings (title, company_name, location, job_type, salary, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['title'], $_POST['company_name'], $_POST['location'], $_POST['job_type'], $_POST['salary'], $_POST['description']]);
    
    echo "<script>alert('Job Posted Successfully!'); window.location.href='admin_jobs.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Jobs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/js/froala_editor.pkgd.min.js"></script>
</head>
<style>
    .container {
        max-width: 900px;
        margin: 50px auto;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .success-message {
        display: none;
        margin-top: 10px;
        padding: 10px;
        background: #28a745;
        color: white;
        border-radius: 5px;
        text-align: center;
    }
    
</style>
<body>

<div class="container">
    <h2>Post a New Job</h2>
    <form method="POST">
        <label>Job Title:</label>
        <input type="text" name="title" class="form-control" required>

        <label>Location:</label>
        <input type="text" name="location" class="form-control" required>

        <label>Job Type:</label>
        <input type="text" name="job_type" class="form-control" required>

        <label>Job Function:</label>
        <input type="text" name="salary" class="form-control">

        <label>Salary:</label>
        <input type="text" name="salary" class="form-control">

        <label>Job Description:</label>
        <textarea id="froala-editor" name="description"></textarea>

        <br>
        <button type="submit" class="btn btn-success">Post Job</button>
    </form>

    <div id="success-message" class="success-message"> Job posted successfully!</div>
</div>

<script>
    $(document).ready(function() {
        new FroalaEditor('#froala-editor', { heightMin: 300, heightMax: 600 });
    });
</script>

</body>
</html>
