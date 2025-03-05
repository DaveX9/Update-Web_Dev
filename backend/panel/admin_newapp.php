<?php
include 'db.php';

// Fetch current content from the database
$sql = "SELECT content FROM newapp_content WHERE id = 1";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Content</title>

    <!-- Froala Editor -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.14/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.14/js/froala_editor.pkgd.min.js"></script>

    <!-- Beautiful & Friendly CSS -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        
        /* Admin Container */
        .admin-container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        
        /* Header */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
        }

        /* Froala Editor */
        .editor-container {
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Floating Save Button */
        .save-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px 25px;
            background: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            text-align: center;
            border-radius: 50px;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .save-btn:hover {
            background: #218838;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
        }

        /* Card Wrapper */
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="admin-container">
        <h2>✏️ Edit Home Inspection App Page</h2>

        <div class="card">
            <form action="update-newapp.php" method="POST">
                <div class="editor-container">
                    <textarea id="froala-editor" name="content"><?= $data['content']; ?></textarea>
                </div>
                <button type="submit" class="save-btn">💾 Save Changes</button>
            </form>
        </div>
    </div>

    <script>
    new FroalaEditor('#froala-editor', {
        height: 700,
        imageUploadURL: 'upload-app-image.php',
        fileUploadURL: 'upload_file.php',
        toolbarButtons: ['bold', 'italic', 'underline', 'paragraphFormat', 'align', 'insertImage', 'insertLink', 'html'],
    });
    </script>

</body>
</html>
