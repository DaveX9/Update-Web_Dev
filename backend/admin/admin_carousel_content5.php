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
    <?php
        // Load existing Featured Section Data
        $featured_file = 'featured_data.json';

        // Check if the file exists and load data, otherwise set default values
        if (file_exists($featured_file)) {
            $featured_data = json_decode(file_get_contents($featured_file), true);
        } else {
            $featured_data = [];
        }

        // Default Values for Featured Section
        $featured_title = isset($featured_data['title']) ? $featured_data['title'] : "สนุก มันส์ ฮา กับช่างตรวจ";
        $featured_description = isset($featured_data['description']) ? $featured_data['description'] : " สนุก มันส์ ฮา กับช่างตรวจ";
        $featured_image = isset($featured_data['image']) ? $featured_data['image'] : "/HOMESPECTOR/img/thumbnail3.jpg";
    ?>

    <div class="form-container">
        <h1>Edit Contact Info</h1>
        <form id="edit-contact-form">
            <!-- Phone Number -->
            <div class="form-group">
                <label for="phone-number">Phone Number:</label>
                <input type="text" id="phone-number" name="phone_number" value="02-454-2043" placeholder="Enter phone number" />
            </div>

            <!-- Line ID -->
            <div class="form-group">
                <label for="line-id">Line ID:</label>
                <input type="text" id="line-id" name="line_id" value="@t.home" placeholder="Enter Line ID" />
            </div>

            <!-- Save and Cancel Buttons -->
            <div class="button-container">
                <button type="submit" class="save-btn">Save</button>
                <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
            </div>
        </form>
    </div>
    <!-- 📌 Featured Content -->
    <div class="form-container">
        <h1>Featured Content</h1>
        <form id="featured-form">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="featured_title" value="<?= htmlspecialchars($featured_title) ?>">
                <label>Description:</label>
                <textarea name="featured_description"><?= htmlspecialchars($featured_description) ?></textarea>
                <label>Image:</label>
                <img src="<?= $featured_image ?>" alt="Featured Image" class="preview-image">
                <input type="file" name="featured_image" accept="image/*">
            </div>
            <div class="button-container">
                <button type="submit" class="save-btn">Save</button>
                <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
            </div>
        </form>
    </div>


    <div class="form-container">
        <h1>Manage Website Content</h1>

        <form id="admin-form" enctype="multipart/form-data">

            <!-- 🎬 Manage Episodes -->
            <h2>Manage Episodes</h2>
            <div id="episode-container">
                <?php
                $episodes_file = 'episodes_data.json';
                $episodes_data = file_exists($episodes_file) ? json_decode(file_get_contents($episodes_file), true) : [];

                // Default episodes (NO LINKS)
                $default_episodes = [
                    ["title" => "รีวิวตรวจบ้านเดี่ยว พระเอกดัง!! 'ตงตง เดอะสตาร์'", "image" => "/HOMESPECTOR/img/thumbnail5.jpg"],
                    ["title" => "ตรวจบ้านหรู 89 ล้าน!", "image" => "/HOMESPECTOR/img/thumbnail4.jpg"],
                    ["title" => "บ้านหรู CEO 40 ล้าน!", "image" => "/HOMESPECTOR/img/thumbnail3.jpg"],
                    ["title" => "การตรวจบ้านก่อนโอน", "image" => "/HOMESPECTOR/img/thumbnail1.jpg"],
                    ["title" => "สนุก มันส์ ฮา กับช่างตรวจ", "image" => "/HOMESPECTOR/img/thumbnail5.jpg"],
                    ["title" => "การตรวจบ้านก่อนโอน", "image" => "/HOMESPECTOR/img/thumbnail1.jpg"],
                    ["title" => "สนุก มันส์ ฮา กับช่างตรวจ", "image" => "/HOMESPECTOR/img/thumbnail5.jpg"],
                    ["title" => "สนุก มันส์ ฮา กับช่างตรวจ", "image" => "/HOMESPECTOR/img/thumbnail5.jpg"],
                    ["title" => "รีวิวตรวจบ้านเดี่ยว พระเอกดัง!! 'ตงตง เดอะสตาร์'", "image" => "/HOMESPECTOR/img/thumbnail5.jpg"],
                    ["title" => "รีวิวตรวจบ้านเดี่ยว พระเอกดัง!! 'ตงตง เดอะสตาร์'", "image" => "/HOMESPECTOR/img/thumbnail5.jpg"],
                ];

                if (empty($episodes_data)) {
                    $episodes_data = $default_episodes;
                }

                foreach ($episodes_data as $episode) {
                    echo '
                    <div class="content-item">
                        <label>Title:</label>
                        <input type="text" name="episode_titles[]" value="' . htmlspecialchars($episode["title"]) . '">

                        <label>Image:</label>
                        <img src="' . htmlspecialchars($episode["image"]) . '" alt="Episode Image" class="preview-image">
                        <input type="file" name="episode_images[]" accept="image/*">

                        <button type="button" class="remove-item">Delete</button>
                    </div>';
                }
                ?>
            </div>
            <button type="button" id="add-episode-btn">+ Add New Episode</button>
            <!-- 🖼️ Manage Carousel Content -->
            <h2>Manage Carousel Content</h2>
            <div id="carousel-container">
                <?php
                $carousel_file = 'carousel_data.json';
                $carousel_data = file_exists($carousel_file) ? json_decode(file_get_contents($carousel_file), true) : [];

                // Default carousel
                $default_carousel = [
                    ["title" => "พาดูบ้านหรู 89 ล้าน!", "image" => "/HOMESPECTOR/img/carousel_thumb1.jpg", "description" => "พาดูบ้านหรู 89 ล้าน! แกรนด์ บางกอก บูเลอวาร์ด ยาร์ด บางนา"],
                    ["title" => "สุดพิเศษ! พาดูบ้านหรู", "image" => "/HOMESPECTOR/img/thumbnail3.jpg", "description" => "รีวิวตรวจบ้านหรู 40ล้าน! CEO #บุญนําพา"],
                    ["title" => "ตรวจบ้านก่อนโอน by ต.ตรวจบ้าน", "image" => "/HOMESPECTOR/img/carousel_thumb2.jpg", "description" => "ตรวจบ้านก่อนโอน by ต.ตรวจบ้าน..."],
                    ["title" => "ประกันภัยบ้าน แฮปปี้โฮม ธนชาต", "image" => "/HOMESPECTOR/img/thumbnail1.jpg", "description" => "ช่วงนี้หน้าฝน อย่ามองข้ามสิ่งนี้🏡⛈️"],
                    ["title" => "สนุก มันส์ ฮา กับช่างตรวจ", "image" => "/HOMESPECTOR/img/thumbnail3.jpg", "description" => "สนุก มันส์ ฮา กับช่างตรวจ"],
                    
                    
                ];

                if (empty($carousel_data)) {
                    $carousel_data = $default_carousel;
                }

                foreach ($carousel_data as $carousel) {
                    echo '
                    <div class="content-item">
                        <label>Title:</label>
                        <input type="text" name="carousel_titles[]" value="' . htmlspecialchars($carousel["title"]) . '">

                        <label>Description:</label>
                        <textarea name="carousel_descriptions[]">' . htmlspecialchars($carousel["description"]) . '</textarea>

                        <label>Image:</label>
                        <img src="' . htmlspecialchars($carousel["image"]) . '" alt="Carousel Image" class="preview-image">
                        <input type="file" name="carousel_images[]" accept="image/*">

                        <button type="button" class="remove-item">Delete</button>
                    </div>';
                }
                ?>
            </div>
            <button type="button" id="add-carousel-btn">+ Add New Carousel Item</button>

            <div class="button-container">
        <button type="submit" id="save-btn" class="save-btn">Save Changes</button>
        <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
    </div>

        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // ✅ Function to Handle Delete Button
            function addDeleteFunctionality() {
                document.querySelectorAll('.remove-item').forEach(btn => {
                    btn.addEventListener('click', function () {
                        this.parentElement.remove();
                    });
                });
            }
            addDeleteFunctionality();

            // ✅ Add New Episode Item
            document.getElementById('add-episode-btn').addEventListener('click', function () {
                const container = document.getElementById('episode-container');

                const itemHTML = `
                    <div class="content-item">
                        <label>Title:</label>
                        <input type="text" name="episode_titles[]" placeholder="Enter episode title">

                        <label>Image:</label>
                        <input type="file" name="episode_images[]" accept="image/*">

                        <button type="button" class="remove-item">Delete</button>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', itemHTML);
                addDeleteFunctionality();
            });

            // ✅ Add New Carousel Item
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

            // ✅ SAVE FUNCTION (Episodes & Carousel)
            document.getElementById('admin-form').addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);

                fetch('save-after-carousel-content.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('✅ All changes saved successfully!');
                        location.reload();
                    } else {
                        alert('❌ Failed to save changes: ' + (data.error || 'Unknown error'));
                    }
                })
                .catch(error => console.error('Error:', error));
            });

            // ✅ Featured Content Management
            const featuredForm = document.getElementById("featured-form");
            const fileInput = document.querySelector("input[name='featured_image']");
            const previewImage = document.querySelector(".preview-image");

            // ✅ Live Image Preview for Featured Section
            fileInput.addEventListener("change", function (event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // ✅ Handle Featured Content Submission
            featuredForm.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(featuredForm);

                fetch("save-featured.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("✅ Featured content updated successfully!");
                        location.reload();
                    } else {
                        alert("❌ Failed to update. " + (data.error || "Unknown error."));
                    }
                })
                .catch(error => console.error("Error:", error));
            });

        });
</script>


<?php include 'footer.php'; ?>
