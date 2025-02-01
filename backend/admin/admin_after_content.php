<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<style>
   /* Button Container */
    .button-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    /* General Button Styles */
    .button-container button, 
    #save-btn, #add-episode-btn, #add-carousel-btn {
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    /* Save & Add Buttons */
    #save-btn
    .button-container .save-btn {
        background-color: #007BFF;
        color: white;
        width: 35%;
        text-align: center;
    }

    #save-btn:hover, 
    #add-episode-btn:hover, 
    #add-carousel-btn:hover, 
    .button-container .save-btn:hover {
        background-color: #0056b3;
    }

    /* Cancel Button */
    .button-container .cancel-btn {
        background-color: #6c757d;
        color: #fff;
    }

    .button-container .cancel-btn:hover {
        background-color: #545b62;
    }


    .remove-item {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-top: 10px;
    }

    .content-item {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .preview-image {
        max-width: 150px;
        display: block;
        margin-top: 10px;
    }
</style>

<div class="form-container">
    <h1>Manage Website Content</h1>

    <form id="admin-form" enctype="multipart/form-data">
        
        <!-- 🎥 Featured Video -->
        <h2>Featured Video</h2>
        <div class="form-group">
            <label for="featured-title">Title:</label>
            <input type="text" id="featured-title" name="featured_title" value="ต.ตรวจบ้าน x การตลาดวันละตอน EP.1">
        </div>
        <div class="form-group">
            <label for="featured-desc">Description:</label>
            <textarea id="featured-desc" name="featured_desc">พาดูคฤหาสน์หรู 50 ล้าน!...</textarea>
        </div>
        <div class="form-group">
            <label for="featured-url">YouTube URL:</label>
            <input type="text" id="featured-url" name="featured_url" value="https://www.youtube.com/embed/oAPAWQvzN6Y">
        </div>

        <!-- 🎥 Manage Related Videos -->
        <h2>Manage Related Videos</h2>
        <div id="video-container">
            <?php
            $default_videos = [
                ["title" => "Mindset ที่จะเปลี่ยนชีวิตคุณ | EP.28", "image" => "/HOMESPECTOR/img/thumbnail1.jpg", "category" => "Related", "youtube_url" => "https://www.youtube.com/embed/oAPAWQvzN6Y", "tags" => "SCASSET, รีวิวบ้าน"],
                ["title" => "พาดูคฤหาสน์หรู 50 ล้าน!", "image" => "/HOMESPECTOR/img/thumbnail2.jpg", "category" => "Related", "youtube_url" => "https://www.youtube.com/embed/oAPAWQvzN6Y", "tags" => "ตตรวจบ้าน, การตลาดวันละหลัง"]
            ];

            foreach ($default_videos as $video) {
                echo '
                <div class="content-item">
                    <label>Title:</label>
                    <input type="text" name="video_titles[]" value="' . htmlspecialchars($video["title"]) . '">
                    
                    <label>Category:</label>
                    <select name="video_categories[]">
                        <option value="Featured">Featured</option>
                        <option value="Related">Related</option>
                        <option value="Other">Other</option>
                    </select>

                    <label>YouTube URL:</label>
                    <input type="text" name="video_urls[]" value="' . htmlspecialchars($video["youtube_url"]) . '">

                    <label>Tags (comma-separated):</label>
                    <input type="text" name="video_tags[]" value="' . htmlspecialchars($video["tags"]) . '">

                    <label>Image:</label>
                    <img src="' . $video["image"] . '" alt="Video Image" class="preview-image">
                    <input type="file" name="video_images[]" accept="image/*">

                    <button type="button" class="remove-item">Delete</button>
                </div>';
            }
            ?>
        </div>
        <button type="button" id="add-video-btn">+ Add New Video</button>

        <!-- 🖼️ Manage Carousel Content -->
        <h2>Manage Carousel Content</h2>
        <div id="carousel-container">
            <?php
            $default_carousel = [
                ["title" => "รีวิวตรวจบ้านดารา", "image" => "/HOMESPECTOR/img/thumbnail4.jpg", "description" => "รีวิวการตรวจบ้านเดี่ยว..."],
                ["title" => "ต.ตรวจบ้าน x การตลาดวันละตอน", "image" => "/HOMESPECTOR/img/carousel_thumb1.jpg", "description" => "พาดูบ้านหรู 89 ล้าน!"],
            ];

            foreach ($default_carousel as $carousel) {
                echo '
                <div class="content-item">
                    <label>Title:</label>
                    <input type="text" name="carousel_titles[]" value="' . htmlspecialchars($carousel["title"]) . '">

                    <label>Description:</label>
                    <textarea name="carousel_descriptions[]">' . htmlspecialchars($carousel["description"]) . '</textarea>

                    <label>Image:</label>
                    <img src="' . $carousel["image"] . '" alt="Carousel Image" class="preview-image">
                    <input type="file" name="carousel_images[]" accept="image/*">

                    <button type="button" class="remove-item">Delete</button>
                </div>';
            }
            ?>
        </div>
        <button type="button" id="add-carousel-btn">+ Add New Carousel Item</button>

        <!-- Save Button -->
        <button type="submit" id="save-btn">Save Changes</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        function addDeleteFunctionality() {
            document.querySelectorAll('.remove-item').forEach(btn => {
                btn.addEventListener('click', function () {
                    this.parentElement.remove();
                });
            });
        }
        addDeleteFunctionality();

        // Add New Video Item
        document.getElementById('add-video-btn').addEventListener('click', function () {
            const container = document.getElementById('video-container');

            const itemHTML = `
                <div class="content-item">
                    <label>Title:</label>
                    <input type="text" name="video_titles[]" placeholder="Enter video title">

                    <label>Category:</label>
                    <select name="video_categories[]">
                        <option value="Featured">Featured</option>
                        <option value="Related">Related</option>
                        <option value="Other">Other</option>
                    </select>

                    <label>YouTube URL:</label>
                    <input type="text" name="video_urls[]" placeholder="Enter YouTube URL">

                    <label>Tags (comma-separated):</label>
                    <input type="text" name="video_tags[]" placeholder="Enter tags">

                    <label>Image:</label>
                    <input type="file" name="video_images[]" accept="image/*">

                    <button type="button" class="remove-item">Delete</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', itemHTML);
            addDeleteFunctionality();
        });

        // Add New Carousel Item
        document.getElementById('add-carousel-btn').addEventListener('click', function () {
            const container = document.getElementById('carousel-container');

            const itemHTML = `
                <div class="content-item">
                    <label>Title:</label>
                    <input type="text" name="carousel_titles[]" placeholder="Enter title">

                    <label>Description:</label>
                    <textarea name="carousel_descriptions[]" placeholder="Enter description"></textarea>

                    <label>Image:</label>
                    <input type="file" name="carousel_images[]" accept="image/*">

                    <button type="button" class="remove-item">Delete</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', itemHTML);
            addDeleteFunctionality();
        });

        // ✅ SAVE FUNCTION ADDED HERE
        document.getElementById('admin-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('save-aftercontent.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('✅ All changes saved successfully!');
                    location.reload();
                } else {
                    alert('❌ Failed to save changes.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>


<?php include 'footer.php'; ?>
