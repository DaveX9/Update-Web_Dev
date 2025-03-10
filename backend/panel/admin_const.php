<?php
session_start();


$conn = new mysqli("localhost", "root", "", "homespector");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch services content
$sql_services = "SELECT * FROM hconstruction WHERE section = 'services'";
$result_services = $conn->query($sql_services);
$row_services = $result_services->fetch_assoc();

// Fetch all carousel items
$sql_carousel = "SELECT * FROM hconstruction WHERE section LIKE 'carousel%'";
$result_carousel = $conn->query($sql_carousel);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor/css/froala_editor.pkgd.min.css">
    <script src="https://cdn.jsdelivr.net/npm/froala-editor/js/froala_editor.pkgd.min.js"></script>
</head>
<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 20px;
}

/* Admin Panel Header */
h2 {
    text-align: center;
    color: #333;
}



/* Forms Styling */
form {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    width: 80%;
    max-width: 800px;
    height: 1400px;
}

/* Form Buttons */
button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
}

button:hover {
    background-color: #0056b3;
}

/* Froala Editor Styling */
.froala-editor {
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    form {
        width: 95%;
    }

    button {
        width: 100%;
    }
}

</style>
<body>

    <form action="update_hcons.php" method="POST">
        <h2>Edit Services Section</h2>
        <input type="hidden" name="section" value="services">
        <textarea id="froala-services" name="content"><?php echo htmlspecialchars($row_services['content']); ?></textarea>
        <br>
        <button type="submit">Update Services</button>
    </form>

    <?php while ($row = $result_carousel->fetch_assoc()): ?>
        <form action="update_hcons.php" method="POST">
            <h2>Edit Carousel Items</h2>
            <input type="hidden" name="section" value="<?php echo $row['section']; ?>">
            <textarea class="froala-carousel" name="content"><?php echo htmlspecialchars($row['content']); ?></textarea>
            <br>
            <button type="submit">Update <?php echo ucfirst($row['section']); ?></button>
        </form>
    <?php endwhile; ?>

    <script>
        new FroalaEditor('#froala-services', { height: 1150 });
        document.querySelectorAll('.froala-carousel').forEach((el) => {
            new FroalaEditor(el, { height: 1150 });
        });
    </script>
</body>
</html>
