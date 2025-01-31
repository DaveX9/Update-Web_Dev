<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<style>
    #save-btn, #add-video-btn {
        background-color: #007BFF;
        color: white;
        font-size: 16px;
        font-weight: bold;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        display: block;
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }

    #save-btn:hover, #add-video-btn:hover {
        background-color: #0056b3;
    }

    .remove-video-item {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-top: 10px;
    }

    .video-item {
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
    <h1>Manage Video Content</h1>

    <form id="admin-form" enctype="multipart/form-data">
        <h2>Featured Video</h2>
        <div class="form-group">
            <label for="featured-title">Title:</label>
            <input type="text" id="featured-title" name="featured_title" value="ต.ตรวจบ้าน x การตลาดวันละตอน EP.1">
        </div>
        <div class="form-group">
            <label for="featured-desc">Description:</label>
            <textarea id="featured-desc" name="featured_desc">พาดูคฤหาสน์หรู 50 ล้าน! 𝐆𝐫𝐚𝐧𝐝 𝐁𝐚𝐧𝐠𝐤𝐨𝐤 𝐁𝐨𝐮𝐥𝐞𝐯𝐚𝐫𝐝 ปิ่นเกล้า-บรมฯ | ต.ตรวจบ้าน x การตลาดวันละตอน EP.1</textarea>
        </div>
        <div class="form-group">
            <label for="featured-url">YouTube URL:</label>
            <input type="text" id="featured-url" name="featured_url" value="https://www.youtube.com/embed/oAPAWQvzN6Y">
        </div>

        <h2>Manage Related Videos</h2>
        <div id="video-container">
            <?php
            $videoFile = 'video_content.json';
            $default_videos = [
                ["title" => "Mindset ที่จะเปลี่ยนชีวิตคุณ | EP.28", "image" => "/HOMESPECTOR/img/thumbnail1.jpg", "category" => "Related", "youtube_url" => "https://www.youtube.com/embed/oAPAWQvzN6Y", "tags" => "SCASSET, รีวิวบ้าน"],
                ["title" => "พาดูคฤหาสน์หรู 50 ล้าน!", "image" => "/HOMESPECTOR/img/thumbnail2.jpg", "category" => "Related", "youtube_url" => "https://www.youtube.com/embed/oAPAWQvzN6Y", "tags" => "ตตรวจบ้าน, การตลาดวันละหลัง"]
            ];

            foreach ($default_videos as $video) {
                echo '
                <div class="video-item">
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

                    <button type="button" class="remove-video-item">Delete</button>
                </div>';
            }
            ?>
        </div>

        <!-- Add New Video Button -->
        <button type="button" id="add-video-btn">+ Add New Video</button>

        <!-- Save Button -->
        <button type="submit" id="save-btn">Save Changes</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        function addDeleteFunctionality() {
            document.querySelectorAll('.remove-video-item').forEach(btn => {
                btn.addEventListener('click', function () {
                    this.parentElement.remove();
                });
            });
        }
        addDeleteFunctionality();

        // Add New Video Item
        document.getElementById('add-video-btn').addEventListener('click', function () {
            const container = document.getElementById('video-container');

            const categoryOptions = `
                <option value="Featured">Featured</option>
                <option value="Related">Related</option>
                <option value="Other">Other</option>
            `;

            const itemHTML = `
                <div class="video-item">
                    <label>Title:</label>
                    <input type="text" name="video_titles[]" placeholder="Enter video title">

                    <label>Category:</label>
                    <select name="video_categories[]">${categoryOptions}</select>

                    <label>YouTube URL:</label>
                    <input type="text" name="video_urls[]" placeholder="Enter YouTube URL">

                    <label>Tags (comma-separated):</label>
                    <input type="text" name="video_tags[]" placeholder="Enter tags">

                    <label>Image:</label>
                    <input type="file" name="video_images[]" accept="image/*">

                    <button type="button" class="remove-video-item">Delete</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', itemHTML);
            addDeleteFunctionality();
        });

        // Save All Data
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
                    alert('All changes saved successfully!');
                    location.reload();
                } else {
                    alert('Failed to save changes.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>

<?php include 'footer.php'; ?>
