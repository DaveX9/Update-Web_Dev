<?php 
include 'db.php';

// Check if we are editing an existing review
$review = null;
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM home_reviews WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Review Editor</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/css/froala_editor.pkgd.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.10/js/froala_editor.pkgd.min.js"></script>

    <style>
      /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        /* Form Container */
        .form-container {
            width: 90%;
            max-width: 1000px;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Section Titles */
        h2 {
            color: #002d5b;
            font-weight: bold;
            font-size: 20px;
            border-bottom: 2px solid #002d5b;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* Label Styling */
        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        /* Form Rows */
        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        /* Form Fields (Two-Column Layout) */
        .form-field {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        /* Inputs, Selects, and Textareas */
        select, input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            background: #fff;
        }

        select:focus, input:focus, textarea:focus {
            border-color: #002d5b;
            box-shadow: 0 0 5px rgba(0, 45, 91, 0.3);
            outline: none;
        }

        /* Upload Image Buttons */
        .upload-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            background: #f0f0f0;
            padding: 8px;
            border-radius: 6px;
        }

        .upload-btn {
            background: #007bff;
            color: white;
            padding: 8px 15px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .upload-btn:hover {
            background: #0056b3;
        }

        /* Reset Image Button */
        .reset-btn {
            background: #ffcc00;
            color: black;
            padding: 8px 15px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .reset-btn:hover {
            background: #e6b800;
        }

        /* Review Detail Section (Bottom) */
        .review-section {
            margin-top: 20px;
        }

        .review-detail {
            border: 1px solid #ddd;
            border-radius: 6px;
            background: white;
            padding: 10px;
        }

        /* Froala Editor Styling */
        .fr-box {
            border: 1px solid #ddd !important;
            border-radius: 6px !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Buttons */
        button {
            margin-top: 15px;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            background: #002d5b;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #001f3f;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }

            .form-field {
                width: 100%;
            }
        }


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
    <div class="form-container">
        <h2>📝 <?php echo isset($review) ? 'Edit Review' : 'Add Review'; ?></h2>
        <form action="save_review.php" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?php echo $review['id'] ?? ''; ?>">

            <!-- First Row: Developer & Headline -->
            <div class="form-row">
                <div class="form-field">
                    <label>เลือก Developer:</label>
                    <select name="developer">
                        <option value="Sansiri" <?php echo (isset($review) && $review['developer'] == 'Sansiri') ? 'selected' : ''; ?>>Sansiri</option>
                        <option value="Land and House" <?php echo (isset($review) && $review['developer'] == 'Land and House') ? 'selected' : ''; ?>>Land and House</option>
                        <option value="SC Asset" <?php echo (isset($review) && $review['developer'] == 'SC Asset') ? 'selected' : ''; ?>>SC Asset</option>
                    </select>
                </div>

                <div class="form-field">
                    <label>Headline:</label>
                    <input type="text" name="headline" value="<?php echo $review['headline'] ?? ''; ?>" required>
                </div>
            </div>

            <!-- Second Row: Short Detail & Thumbnail Upload -->
            <div class="form-row">
                <div class="form-field">
                    <label>Short detail / รายละเอียดโดยย่อ:</label>
                    <textarea name="short_detail"><?php echo $review['short_detail'] ?? ''; ?></textarea>
                </div>

                <div class="form-field">
                    <label>ภาพ Thumbnail (936 x 712 px):</label>
                    <div class="upload-section">
                        <input type="file" name="thumbnail" accept="image/*">
                        <button type="button" class="upload-btn">📁 เลือกรูป</button>
                        <button type="button" class="reset-btn">🔄 Reset Image</button>
                    </div>
                    <?php if (!empty($review['thumbnail'])): ?>
                        <br><img src="<?php echo $review['thumbnail']; ?>" alt="Thumbnail" width="100">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Third Row: Facebook Share -->
            <div class="form-row">
                <div class="form-field">
                    <label>ภาพ Share Facebook (1200 x 628 px หรือ 600 x 600 px):</label>
                    <div class="upload-section">
                        <input type="file" name="facebook_share" accept="image/*">
                        <button type="button" class="upload-btn">📁 เลือกรูป</button>
                        <button type="button" class="reset-btn">🔄 Reset Image</button>
                    </div>
                    <?php if (!empty($review['facebook_share'])): ?>
                        <br><img src="<?php echo $review['facebook_share']; ?>" alt="Facebook Share" width="100">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Review Detail (Moved Below All Inputs) -->
            <div class="review-section">
                <label>Review Detail:</label>
                <div class="review-detail">
                    <textarea id="editor" name="review_detail"><?php echo htmlspecialchars_decode($review['review_detail'] ?? ''); ?></textarea>
                </div>
            </div>

            <button type="submit"><?php echo isset($review) ? '📝 Update Review' : '💾 Save Review'; ?></button>
        </form>
    </div>



    <script>
        $(function() {
            new FroalaEditor('#editor');
        });
    </script>

</body>
</html>
