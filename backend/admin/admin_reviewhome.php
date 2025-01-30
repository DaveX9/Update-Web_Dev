<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<style>
    #save-btn, #add-review-btn {
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

    #save-btn:hover, #add-review-btn:hover {
        background-color: #0056b3;
    }

    .remove-review-item {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-top: 10px;
    }

    .review-item {
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

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>

<div class="form-container">
    <h1>Manage Website Content</h1>
    
    <form id="admin-form" enctype="multipart/form-data">
        
        <!-- Contact Details -->
        <h2>Contact Information</h2>
        <div class="form-group">
            <label for="contact-phone">Phone Number:</label>
            <input type="text" id="contact-phone" name="contact_phone" value="02-454-2043">
        </div>
        <div class="form-group">
            <label for="contact-line">Line ID:</label>
            <input type="text" id="contact-line" name="contact_line" value="@t.home">
        </div>

        <!-- Review Page Heading and Description -->
        <h2>Review Page</h2>
        <div class="form-group">
            <label for="review-heading">Review Page Heading (H1):</label>
            <input type="text" id="review-heading" name="review_heading" value="รีวิวบ้าน">
        </div>
        <div class="form-group">
            <label for="review-description">Review Page Description (P):</label>
            <textarea id="review-description" name="review_description" rows="3">
                พาทัวร์บ้านรูปแบบใหม่ ไม่ซ้ำใคร ที่แรกและที่เดียว เพราะเราพาดูงานระบบของบ้านในโครงการต่าง ๆ
                ไม่ว่าจะเป็นงานสถาปัตย์ ระบบไฟฟ้า ระบบสุขาภิบาล หรืองานหลังคา ซึ่งไม่มีที่ไหนทำมาก่อน
            </textarea>
        </div>

        <!-- Manage Reviews -->
        <h2>Manage Reviews</h2>
        <div id="review-container">
            <!-- Default Reviews -->
            <?php
            $default_reviews = [
                ["title" => "Review Setthasiri", "image" => "/HOMESPECTOR/img/landhouse1.jpg", "category" => "Land and House"],
                ["title" => "Review Ladawan", "image" => "/HOMESPECTOR/img/sansiri1.png", "category" => "Sansiri"],
                ["title" => "Review SC Asset", "image" => "/HOMESPECTOR/img/scasset1.webp", "category" => "SC Asset"],
                ["title" => "The Residences", "image" => "/HOMESPECTOR/img/landhouse2.jpg", "category" => "Land and House"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/apthai1.jpg", "category" => "Ap Thai"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/apthai2.jpg", "category" => "Ap Thai"],
                ["title" => "Review Property Profect", "image" => "/HOMESPECTOR/img/property-perfect1.jpg", "category" => "Property Profect"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/apthai3.jpg", "category" => "Ap Thai"],
                ["title" => "Review Property Profect", "image" => "/HOMESPECTOR/img/property-profect2.jpg", "category" => "Property Profect"],
                ["title" => "Review MQDC", "image" => "/HOMESPECTOR/img/mqdc1.jpg", "category" => "MQDC"],
                ["title" => "Review House", "image" => "/HOMESPECTOR/img/others1.jpg", "category" => "Others"],
                ["title" => "Review MQDC", "image" => "/HOMESPECTOR/img/mqdc2.jpg", "category" => "MQDC"],
                ["title" => "Review QHouse", "image" => "/HOMESPECTOR/img/qhouse1.jpg", "category" => "QHouse"]
            ];

            foreach ($default_reviews as $review) {
                echo '
                <div class="review-item">
                    <label>Title:</label>
                    <input type="text" name="review_titles[]" value="' . $review["title"] . '">
                    
                    <label>Category:</label>
                    <select name="review_categories[]">
                        <option value="Land and House">Land and House</option>
                        <option value="Sansiri">Sansiri</option>
                        <option value="SC Asset">SC Asset</option>
                        <option value="Ap Thai">Ap Thai</option>
                        <option value="Property Profect">Property Profect</option>
                        <option value="MQDC">MQDC</option>
                        <option value="QHouse">QHouse</option>
                        <option value="Others">Others</option>
                    </select>

                    <label>Image:</label>
                    <img src="' . $review["image"] . '" alt="Review Image" class="preview-image">
                    <input type="file" name="review_images[]" accept="image/*">

                    <button type="button" class="remove-review-item">Delete</button>
                </div>';
            }
            ?>
        </div>

        <!-- Add New Review Item Button -->
        <button type="button" id="add-review-btn">+ Add New Review</button>

        <!-- Save Button -->
        <button type="submit" id="save-btn">Save Changes</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Add Delete Functionality for Reviews
        function addDeleteFunctionality() {
            document.querySelectorAll('.remove-review-item').forEach(btn => {
                btn.addEventListener('click', function () {
                    this.parentElement.remove();
                });
            });
        }
        addDeleteFunctionality();

        // Add New Review Item
        document.getElementById('add-review-btn').addEventListener('click', function () {
            const container = document.getElementById('review-container');
            const itemHTML = `
                <div class="review-item">
                    <label>Title:</label>
                    <input type="text" name="review_titles[]" placeholder="Enter review title">
                    
                    <label>Category:</label>
                    <select name="review_categories[]">
                        <option value="Land and House">Land and House</option>
                        <option value="Sansiri">Sansiri</option>
                        <option value="SC Asset">SC Asset</option>
                        <option value="Ap Thai">Ap Thai</option>
                        <option value="Property Profect">Property Profect</option>
                        <option value="MQDC">MQDC</option>
                        <option value="QHouse">QHouse</option>
                        <option value="Others">Others</option>
                    </select>

                    <label>Image:</label>
                    <input type="file" name="review_images[]">
                    
                    <button type="button" class="remove-review-item">Delete</button>
                </div>
            `;
            container.innerHTML += itemHTML;
            addDeleteFunctionality();
        });

        // Save All Data
        document.getElementById('admin-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('save-reviewhome.php', {
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
