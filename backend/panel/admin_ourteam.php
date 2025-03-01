<?php
session_start();
include '../header.php';

// Database Connection
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch latest content
$stmt = $pdo->prepare("SELECT content, youtube_video FROM ourteam WHERE section_name = 'ourteam'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$content = $row['content'];
$youtube_video = $row['youtube_video'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Our Team</title>

    <!-- jQuery & Froala Editor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/js/froala_editor.pkgd.min.js"></script>

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .admin-container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .save-btn {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 20px auto;
            padding: 12px;
            background: linear-gradient(90deg, #3b82f6, #9333ea);
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .save-btn:hover {
            background: linear-gradient(90deg, #2563eb, #7e22ce);
            transform: scale(1.05);
        }
        .success-message {
            text-align: center;
            color: green;
            font-weight: bold;
            display: none;
        }
    </style>
</head>
<body>

<div class="admin-container">
    <h2 style="text-align: center;">Manage "Our Team"</h2>

    <form id="edit-form">
        <textarea id="froala-editor" name="content"><?php echo htmlspecialchars($content); ?></textarea>
        <button type="submit" class="save-btn">Save Changes</button>
    </form>

    <div id="success-message" class="success-message">Content updated successfully!</div>
</div>

<script>
    // Initialize Froala Editor
    $(document).ready(function() {
        var editor = new FroalaEditor('#froala-editor', {
            heightMin: 400,
            heightMax: 800
        });

        // Initialize AOS Animations
        AOS.init();

        // Handle Content Update
        $("#edit-form").on("submit", function(event) {
            event.preventDefault();
            var content = editor.html.get();
            var formData = { content: content };

            $.ajax({
                url: "update_ourteam.php",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        $("#success-message").fadeIn().delay(2000).fadeOut();
                        AOS.refresh(); // Refresh AOS animations
                    } else {
                        alert("Failed to update content!");
                    }
                }
            });
        });

    });
</script>

</body>
</html>
