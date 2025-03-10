<?php
include 'db.php';

// Fetch content from the database
$result = $conn->query("SELECT * FROM thome");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['section']] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    
    <!-- Include jQuery (Required for AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Froala Editor -->
    <script src="https://cdn.jsdelivr.net/npm/froala-editor/js/froala_editor.pkgd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor/css/froala_editor.pkgd.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        /* Page Title */
        h2 {
            margin-top: 20px;
            color: #333;
            font-size: 24px;
        }

        /* Form Container */
        form {
            width: 80%;
            max-width: 800px;
            background: white;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        /* Success Message */
        .success-message {
            display: none;
            color: green;
            margin-top: 10px;
            font-size: 16px;
            text-align: center;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
        }

        /* Submit Button */
        button {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            font-size: 16px;
            color: white;
            background-color: #28a745;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        button:hover {
            background-color: #218838;
        }
        /* Fix Froala Toolbar Layout */
        .fr-toolbar {
            display: flex !important;
            flex-wrap: wrap !important;
            justify-content: start !important;
            background: #f9f9f9 !important;
            border-radius: 8px 8px 0 0 !important;
            padding: 8px !important;
        }

        /* Ensure toolbar buttons stay aligned */
        .fr-toolbar .fr-btn-grp {
            display: flex !important;
            flex-wrap: nowrap !important;
        }

        /* Fix Editor Box */
        .fr-box {
            border: 1px solid #ddd !important;
            border-radius: 8px !important;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1) !important;
            background: #fff !important;
            padding: 10px;
        }

        /* Editor Wrapper */
        .fr-wrapper {
            border-radius: 0 0 8px 8px !important;
            padding: 10px !important;
            min-height: 250px;
            overflow-y: auto;
        }

        /* Make editor text clear and readable */
        .fr-element {
            font-size: 16px !important;
            color: #333 !important;
            padding: 10px !important;
            line-height: 1.6 !important;
            border-radius: 5px !important;
        }

    </style>
</head>
<body>

    <h2>Admin Panel - Edit Content</h2>

    <!-- Success message -->
    <p class="success-message" id="successMessage">✅ Content updated successfully!</p>

    <form id="updateForm">
        <h3>Services Section</h3>
        <textarea name="services_content"><?= htmlspecialchars($data['services']['content'] ?? '') ?></textarea>

        <h3>Pricing Section</h3>
        <textarea name="pricing_content"><?= htmlspecialchars($data['pricing']['content'] ?? '') ?></textarea>

        <h3>Reports Section</h3>
        <textarea name="reports_content"><?= htmlspecialchars($data['reports']['content'] ?? '') ?></textarea>

        <button type="submit">Save Changes</button>
    </form>

    <script>
        $(document).ready(function() {
            // Initialize Froala Editor
            new FroalaEditor('textarea', {
                imageUploadURL: 'upload_service1_img.php'
            });

            // AJAX form submission
            $("#updateForm").submit(function(e) {
                e.preventDefault(); // Prevent page reload

                $.ajax({
                    url: "update_service1.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response); // Debugging
                        if (response.trim() === "success") {
                            $("#successMessage").fadeIn().delay(3000).fadeOut();
                        } else {
                            alert("Error: " + response); // Show error if update fails
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
