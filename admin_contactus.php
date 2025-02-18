<?php
session_start();

// Database Connection
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch Current Contact Info
$stmt = $pdo->prepare("SELECT * FROM contact_info ORDER BY id DESC LIMIT 1");
$stmt->execute();
$contact = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE contact_info SET content=? WHERE id = ?");
    $stmt->execute([$_POST['content'], $contact['id']]);

    echo "<script>alert('Contact details updated successfully!'); window.location.href='admin_contactus.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Contact Us</title>
    
    <!-- Froala Editor CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/css/froala_editor.pkgd.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Froala Editor JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/js/froala_editor.pkgd.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Contact Us Page</h2>
    <form method="POST">
        <textarea id="froala-editor" name="content"><?php echo htmlspecialchars($contact['content']); ?></textarea>
        <br>
        <button type="submit">Save Changes</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        new FroalaEditor('#froala-editor', {
            toolbarButtons: [
                'bold', 'italic', 'underline', 'strikeThrough', '|',
                'fontFamily', 'fontSize', 'color', 'backgroundColor', '|',
                'align', 'formatOL', 'formatUL', 'indent', 'outdent', '|',
                'insertLink', 'insertImage', 'insertVideo', 'insertTable', '|',
                'undo', 'redo', 'clearFormatting', 'html', 'fullscreen', '|',
                'paragraphFormat', 'quote', 'insertHR', 'specialCharacters', '|',
                'insertFile', 'emoticons', 'print', 'help'
            ],
            heightMin: 300,
            heightMax: 600
        });
    });
</script>

</body>
</html>
