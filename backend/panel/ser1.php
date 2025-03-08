<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $section = $_POST['section'];
    $column = $_POST['column'];
    $content = $_POST['content'];

    $query = "UPDATE thome SET $column=? WHERE section=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $content, $section);
    $stmt->execute();

    echo "Updated Successfully!";
    exit;
}

function fetchData($conn, $section) {
    $query = "SELECT * FROM thome WHERE section=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $section);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

$hero = fetchData($conn, "hero");
$services = fetchData($conn, "services");
$pricing = fetchData($conn, "pricing");
$reports = fetchData($conn, "reports");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel - Edit Content</title>
    
    <!-- Bootstrap for Styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- jQuery (Load Before Froala) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Froala Editor CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/css/froala_editor.pkgd.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/js/froala_editor.pkgd.min.js"></script>

    <style>
        body { background-color: #f8f9fa; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 20px; }
        button { background: #28a745; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; margin-top: 10px; }
        button:hover { background: #218838; }
    </style>
</head>
<body>

<div class="container">
    <h2>Admin Panel - Edit Website Content</h2>

    <!-- Hero Section -->
    <h3>Hero Section</h3>
    <form class="updateForm" data-section="hero" data-column="title">
        <label>Hero Title:</label>
        <textarea class="froala" name="content"><?= $hero['title']; ?></textarea>
        <button type="submit">Save</button>
    </form>

    <form class="updateForm" data-section="hero" data-column="image_url">
        <label>Background Image URL:</label>
        <input type="text" name="content" value="<?= $hero['image_url']; ?>" required>
        <button type="submit">Save</button>
    </form>

    <!-- Services Section -->
    <h3>Services Section</h3>
    <form class="updateForm" data-section="services" data-column="title">
        <label>Heading:</label>
        <textarea class="froala" name="content"><?= $services['title']; ?></textarea>
        <button type="submit">Save</button>
    </form>

    <form class="updateForm" data-section="services" data-column="description">
        <label>Description:</label>
        <textarea class="froala" name="content"><?= $services['description']; ?></textarea>
        <button type="submit">Save</button>
    </form>

    <!-- Pricing Section -->
    <h3>Pricing Section</h3>
    <form class="updateForm" data-section="pricing" data-column="title">
        <label>Pricing Heading:</label>
        <textarea class="froala" name="content"><?= $pricing['title']; ?></textarea>
        <button type="submit">Save</button>
    </form>

    <!-- Reports Section -->
    <h3>Reports Section</h3>
    <form class="updateForm" data-section="reports" data-column="title">
        <label>Reports Heading:</label>
        <textarea class="froala" name="content"><?= $reports['title']; ?></textarea>
        <button type="submit">Save</button>
    </form>
</div>

<script>
$(document).ready(function () {
    // Ensure Froala Editor is loaded before applying it
    if (typeof $.fn.froalaEditor !== "undefined") {
        $('.froala').froalaEditor({
            height: 200,
            imageUploadURL: 'upload_image.php',
            fileUploadURL: 'upload_pdf.php',
            imageUploadParams: { id: 'my_editor' },
            fileUploadParams: { id: 'my_editor' }
        });
    } else {
        console.error("Froala Editor failed to load. Check script paths.");
    }

    // AJAX Update Functionality
    $('.updateForm').submit(function (e) {
        e.preventDefault();
        let section = $(this).data('section');
        let column = $(this).data('column');
        let content = $(this).find('.froala, input').val();

        $.post('ser1.php', { section: section, column: column, content: content }, function (response) {
            alert(response);
        });
    });
});
</script>

</body>
</html>
