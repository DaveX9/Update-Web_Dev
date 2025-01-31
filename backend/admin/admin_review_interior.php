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
</style>

<div class="form-container">
    <h1>Manage Website Content</h1>
    
    <form id="admin-form" enctype="multipart/form-data">
        <!-- Review Page Heading and Description -->
        <h2>Review Page</h2>
        <div class="form-group">
            <label for="review-heading">Review Page Heading (H1):</label>
            <input type="text" id="review-heading" name="review_heading" value="รีวิวตกแต่งบ้าน">
        </div>

        <h2>Manage Reviews</h2>
        <div id="review-container">
            <!-- Default Reviews -->
            <?php
            $default_reviews = [
                ["title" => "ตกแต่งบ้านหรู สไตล์ Modern classic", "image" => "/HOMESPECTOR/img/landhouse1.jpg", "category" => "ทัวร์บ้าน"],
                ["title" => "Review SEtthasiri", "image" => "/HOMESPECTOR/img/landhouse1.jpg", "category" => "ทัวร์บ้าน"],
                ["title" => "Review Ladawan", "image" => "/HOMESPECTOR/img/sansiri1.png", "category" => "Modern Luxury: 500,000-800,000"],
                ["title" => "Review SC Asset", "image" => "/HOMESPECTOR/img/sansiri1.png", "category" => "Modern Luxury: 800,000-1,300,000"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/apthai1.jpg", "category" => "Modern Luxury: 1,300,000-2,000,000"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/apthai2.jpg", "category" => "Modern Luxury: 2,000,000-5,000,000"],
                ["title" => "Review Property Profect", "image" => "/HOMESPECTOR/img/property-perfect1.jpg", "category" => "Modern Classic: 1,000,000-2,000,000"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/apthai3.jpg", "category" => "Modern Classic & Classic luxury: 2,000,000-5,000,000"],
                ["title" => "Review Property Profect", "image" => "/HOMESPECTOR/img/property-profect2.jpg", "category" => "Modern Classic & Classic luxury: 2,000,000-5,000,000"]
                ];

            foreach ($default_reviews as $review) {
                echo '
                <div class="review-item">
                    <label>Title:</label>
                    <input type="text" name="review_titles[]" value="' . $review["title"] . '">
                    
                    <label>Category:</label>
                    <select name="review_categories[]">
                        <option value="ทัวร์บ้าน">ทัวร์บ้าน</option>
                        <option value="Modern Luxury: 500,000-800,000">Modern Luxury: 500,000-800,000</option>
                        <option value="Modern Luxury: 800,000-1,300,000">Modern Luxury: 800,000-1,300,000</option>
                        <option value="Modern Luxury: 1,300,000-2,000,000">Modern Luxury: 1,300,000-2,000,000</option>
                        <option value="Modern Luxury: 2,000,000-5,000,000">Modern Luxury: 2,000,000-5,000,000</option>
                        <option value="Modern Classic: 1,000,000-2,000,000">Modern Classic: 1,000,000-2,000,000</option>
                        <option value="Modern Classic & Classic luxury: 2,000,000-5,000,000">Modern Classic & Classic luxury: 2,000,000-5,000,000</option>
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
    function addDeleteFunctionality() {
        document.querySelectorAll('.remove-review-item').forEach(btn => {
            btn.addEventListener('click', function () {
                this.parentElement.remove();
            });
        });
    }
    addDeleteFunctionality();

    // Add New Review Item with Default Category Options
    document.getElementById('add-review-btn').addEventListener('click', function () {
        const container = document.getElementById('review-container');

        const categoryOptions = `
            <option value="ทัวร์บ้าน">ทัวร์บ้าน</option>
            <option value="Modern Luxury: 500,000-800,000">Modern Luxury: 500,000-800,000</option>
            <option value="Modern Luxury: 800,000-1,300,000">Modern Luxury: 800,000-1,300,000</option>
            <option value="Modern Luxury: 1,300,000-2,000,000">Modern Luxury: 1,300,000-2,000,000</option>
            <option value="Modern Luxury: 2,000,000-5,000,000">Modern Luxury: 2,000,000-5,000,000</option>
            <option value="Modern Classic: 1,000,000-2,000,000">Modern Classic: 1,000,000-2,000,000</option>
            <option value="Modern Classic & Classic luxury: 2,000,000-5,000,000">Modern Classic & Classic luxury: 2,000,000-5,000,000</option>
        `;

        const itemHTML = `
            <div class="review-item">
                <label>Title:</label>
                <input type="text" name="review_titles[]" placeholder="Enter review title">

                <label>Category:</label>
                <select name="review_categories[]">${categoryOptions}</select>

                <label>Image:</label>
                <input type="file" name="review_images[]" accept="image/*">

                <button type="button" class="remove-review-item">Delete</button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', itemHTML);
        addDeleteFunctionality();
    });

    // Save All Data
    document.getElementById('admin-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch('save-interior.php', {
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
