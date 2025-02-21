<?php
session_start();
include '../header.php';

// Database Connection
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch Story Content
$stmt = $pdo->prepare("SELECT description FROM our_story WHERE type = 'story' LIMIT 1");
$stmt->execute();
$story_content = $stmt->fetchColumn();

// Fetch Vision Content
$stmt = $pdo->prepare("SELECT title, description FROM our_story WHERE type = 'vision' LIMIT 1");
$stmt->execute();
$vision = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch Founders
$stmt = $pdo->prepare("SELECT id, title, description, image_path FROM our_story WHERE type = 'founder'");
$stmt->execute();
$founders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch Commitments
$stmt = $pdo->prepare("SELECT description FROM our_story WHERE type = 'commitment'");
$stmt->execute();
$commitments = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Format commitments as HTML for Froala Editor
$commitmentText = "";
foreach ($commitments as $commitment) {
    $commitmentText .= "✅ " . htmlspecialchars($commitment) . "<br>\n";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Content</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<style>
    h2 {
        text-align: center;
    }

    .ourstory{
        background: #fff;
        padding: 20px;
        max-width: 800px;
        margin: auto;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .content-box {
        border: 2px solid #ddd;
        padding: 15px;
        margin-bottom: 20px;
        background: #f9f9f9;
    }

    .section {
        margin-bottom: 15px;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    label {
        font-weight: bold;
        display: block;
        margin-top: 10px;
    }

    input, textarea {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

    .image-preview {
        margin-top: 10px;
        display: block;
        max-width: 100px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .fr-toolbar {
        display: flex !important;
        flex-wrap: wrap;
        justify-content: space-between;
        background-color: #fff !important;
        border-radius: 5px;
        padding: 5px;
        z-index: 99999 !important;
    }

    .fr-popup, .fr-dropdown-menu {
        z-index: 999999 !important;
    }

    .fr-wrapper {
        border: 1px solid #ddd !important;
        border-radius: 5px;
    }

    .fr-command {
        display: flex !important;
        align-items: center;
        justify-content: center;
    }

    .fr-btn {
        height: 35px;
        width: 35px;
        margin: 3px;
        font-size: 14px !important;
    }
</style>
<body>
    <div class="ourstory">
        <h2>Manage Our Story</h2>

        <form id="edit-form">
            <!-- Story Section -->
            <label>Story Content:</label>
            <div id="froala-story"><?php echo $story_content; ?></div>
            <input type="hidden" name="story" id="story">

            <!-- Vision Section -->
            <label>Vision Title:</label>
            <input type="text" name="vision_title" value="<?php echo htmlspecialchars($vision['title']); ?>">

            <label>Vision Description:</label>
            <div id="froala-vision"><?php echo htmlspecialchars($vision['description']); ?></div>
            <input type="hidden" name="vision_description" id="vision_description">

            <!-- Founders Section -->
            <h3>Founders</h3>
            <?php foreach ($founders as $founder): ?>
                <div>
                    <input type="hidden" name="founder_id[]" value="<?php echo $founder['id']; ?>">
                    <label>Name:</label>
                    <input type="text" name="founder_name[<?php echo $founder['id']; ?>]" value="<?php echo htmlspecialchars($founder['title']); ?>">

                    <label>Description:</label>
                    <div class="froala-founder" data-id="<?php echo $founder['id']; ?>"><?php echo htmlspecialchars($founder['description']); ?></div>
                    <input type="hidden" name="founder_description[<?php echo $founder['id']; ?>]" class="founder_description" data-id="<?php echo $founder['id']; ?>">

                    <label>Upload Image:</label>
                    <input type="file" name="founder_image[<?php echo $founder['id']; ?>]" accept="image/*">
                    <?php if (!empty($founder['image_path'])): ?>
                        <img class="image-preview" src="<?php echo $founder['image_path']; ?>" alt="Founder Image">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <!-- Commitments Section -->
            <label>All Commitments:</label>
            <div id="froala-commitments"><?php echo $commitmentText; ?></div>
            <input type="hidden" name="commitments" id="commitments">

            <button type="submit">Save Changes</button>
        </form>

        <p id="success-message" style="display: none; color: green;">Save Successfully!</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/js/froala_editor.pkgd.min.js"></script>
    <script>
        $(document).ready(function() {
            var storyEditor = new FroalaEditor('#froala-story', {
                heightMin: 300, heightMax: 600
            });

            var visionEditor = new FroalaEditor('#froala-vision', {
                heightMin: 200, heightMax: 400
            });

            var commitmentEditor = new FroalaEditor('#froala-commitments', {
                heightMin: 300, heightMax: 600
            });

            $(".froala-founder").each(function() {
                new FroalaEditor(this, { heightMin: 200, heightMax: 400 });
            });

            // AJAX Form Submission
            $("#edit-form").on("submit", function(event) {
                event.preventDefault(); // Prevent page reload

                $("#story").val(storyEditor.html.get());
                $("#vision_description").val(visionEditor.html.get());
                $("#commitments").val(commitmentEditor.html.get());

                $(".froala-founder").each(function() {
                    var id = $(this).attr("data-id");
                    $("input.founder_description[data-id='" + id + "']").val($(this).html());
                });

                var formData = new FormData(this);

                $.ajax({
                    url: "update-ourstory.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.trim() === "success") {
                            $("#success-message").fadeIn().delay(2000).fadeOut();
                        } else {
                            alert("Error updating content: " + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Failed to update content!");
                    }
                });
            });
        });
    </script>

</body>
</html>
