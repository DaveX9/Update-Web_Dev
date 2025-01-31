<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<style>
    .form-container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background: #fff;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input, .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .preview-image {
        max-width: 150px;
        display: block;
        margin-top: 10px;
    }

    .gallery-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Adds space between images */
    }

    .gallery-item {
        max-width: 150px;
        position: relative;
    }

    .gallery-item img {
        width: 100%;
        border-radius: 5px;
    }

    .remove-gallery-item {
        position: absolute;
        top: 5px;
        right: 5px;
        background: red;
        color: white;
        border: none;
        padding: 5px;
        cursor: pointer;
    }

    #save-btn {
        background-color: #007BFF;
        color: white;
        font-size: 16px;
        font-weight: bold;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }

    #save-btn:hover {
        background-color: #0056b3;
    }
</style>

<div class="form-container">
    <h1>Manage Review Page</h1>

    <form id="review-form" enctype="multipart/form-data">
        <h2>Contact Information</h2>
        <div class="form-group">
            <label for="contact-phone">Phone:</label>
            <input type="text" id="contact-phone" name="contact_phone" value="02-454-2043">
        </div>
        <div class="form-group">
            <label for="contact-line">Line ID:</label>
            <input type="text" id="contact-line" name="contact_line" value="@t.home">
        </div>
        <div class="form-group">
            <label for="contact-email">Email:</label>
            <input type="email" id="contact-email" name="contact_email" value="contact@homespector.com">
        </div>

        <h2>Review Page</h2>
        <div class="form-group">
            <label for="review-title">Review Title:</label>
            <input type="text" id="review-title" name="review_title" value="Review Setthasiri">
        </div>
        <div class="form-group">
            <label for="review-description">Description:</label>
            <textarea id="review-description" name="review_description" rows="4">
                ........................................
            </textarea>
        </div>

        <h2>Main Review Image</h2>
        <div class="form-group">
            <label>Current Image:</label>
            <img src="/HOMESPECTOR/img/landhouse1.jpg" alt="Review Image" class="preview-image">
            <input type="file" name="review_main_image" accept="image/*">
        </div>
            <!-- Include Froala Editor -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/css/froala_editor.pkgd.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/js/froala_editor.pkgd.min.js"></script>

        <h2>Related Images</h2>
        <div class="form-group">
            <label for="gallery-editor">Images & Descriptions:</label>
            <textarea id="gallery-editor" name="gallery_content">
                <?php
                $galleryFile = 'gallery_data.json';
                $defaultImages = [
                    "/HOMESPECTOR/img/after_review/reviewphoto1.png" => "ตรวจสอบโครงสร้างพื้น",
                    "/HOMESPECTOR/img/after_review/reviewphoto2.png" => "ตรวจสอบการติดตั้งรั้ว",
                    "/HOMESPECTOR/img/after_review/reviewphoto3.png" => "ตรวจสอบการระบายน้ำ",
                    "/HOMESPECTOR/img/after_review/reviewphoto4.png" => "ตรวจสอบระบบไฟฟ้า",
                ];

                // Check if the file exists before reading it
                if (file_exists($galleryFile)) {
                    $galleryData = json_decode(file_get_contents($galleryFile), true);
                    if (!empty($galleryData['images'])) {
                        foreach ($galleryData['images'] as $image) {
                            echo '<p><img src="'.$image['url'].'" alt="Uploaded Image"><br>'.$image['description'].'</p>';
                        }
                    } else {
                        foreach ($defaultImages as $image => $desc) {
                            echo '<p><img src="'.$image.'" alt="Default Image"><br>'.$desc.'</p>';
                        }
                    }
                } else {
                    foreach ($defaultImages as $image => $desc) {
                        echo '<p><img src="'.$image.'" alt="Default Image"><br>'.$desc.'</p>';
                    }
                }
                ?>
            </textarea>
        </div>

        <!-- Save Button -->
        <button type="submit" id="save-btn">Save Changes</button>
    </form>
</div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Froala Editor
            new FroalaEditor('#gallery-editor', {
                toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript',
                                '|', 'alignLeft', 'alignCenter', 'alignRight', 'alignJustify',
                                '|', 'insertLink', 'insertImage', 'insertTable', '|', 'undo', 'redo', 'fullscreen'],
                heightMin: 300,
                heightMax: 600,
                imageUploadURL: 'upload-imagereview.php', // Set up an image upload endpoint
                fileUpload: false,
            });

            // Save Review Data
            document.getElementById('review-form').addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);

                fetch('save-afterinterior.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Review Page Updated Successfully!');
                        location.reload();
                    } else {
                        alert('Failed to update review page.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>



<?php include 'footer.php'; ?>
