<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<style>
    #save-btn, #add-content-btn {
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

    #save-btn:hover, #add-content-btn:hover {
        background-color: #0056b3;
    }

    .remove-content-item {
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
    <h2>Contact Information</h2>
        <div class="form-group">
            <label for="contact-phone">Phone:</label>
            <input type="text" id="contact-phone" name="contact_phone" value="02-454-2043">
        </div>
        <div class="form-group">
            <label for="contact-line">Line ID:</label>
            <input type="text" id="contact-line" name="contact_line" value="@t.home">
        </div>

        <!-- Content Section Heading -->
        <h2>Content Page</h2>
        <div class="form-group">
            <label for="content-heading">Content Page Heading (H1):</label>
            <input type="text" id="content-heading" name="content_heading" value="Content">
        </div>

        <h2>Manage Content</h2>
        <div id="content-container">
            <?php
            $contentFile = 'content_data.json';
            $default_content = [
                ["title" => "ตกแต่งบ้านหรู สไตล์ Modern classic", "image" => "/HOMESPECTOR/img/thumbnail1.jpg", "category" => "Roof"],
                ["title" => "Review SEtthasiri", "image" => "/HOMESPECTOR/img/thumbnail2.jpg", "category" => "Price"],
                ["title" => "Review Ladawan", "image" => "/HOMESPECTOR/img/thumbnail3.jpg", "category" => "Price"],
                ["title" => "Review SC Asset", "image" => "/HOMESPECTOR/img/thumbnail2.jpg", "category" => "Process"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/apthai1.jpg", "category" => "Interior"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/thumbnail1.jpg", "category" => "Interior"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/apthai1.jpg", "category" => "Interior"],
                ["title" => "Review Ap Thai", "image" => "/HOMESPECTOR/img/thumbnail3.jpg", "category" => "Interior"]
            ];

            foreach ($default_content as $content) {
                echo '
                <div class="content-item">
                    <label>Title:</label>
                    <input type="text" name="content_titles[]" value="' . $content["title"] . '">
                    
                    <label>Category:</label>
                    <select name="content_categories[]">
                        <option value="Roof">Roof</option>
                        <option value="Price">Price</option>
                        <option value="Process">Process</option>
                        <option value="Interior">Interior</option>
                    </select>

                    <label>Image:</label>
                    <img src="' . $content["image"] . '" alt="Content Image" class="preview-image">
                    <input type="file" name="content_images[]" accept="image/*">

                    <button type="button" class="remove-content-item">Delete</button>
                </div>';
            }
            ?>
        </div>

        <!-- Add New Content Button -->
        <button type="button" id="add-content-btn">+ Add New Content</button>

        <!-- Save Button -->
        <button type="submit" id="save-btn">Save Changes</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        function addDeleteFunctionality() {
            document.querySelectorAll('.remove-content-item').forEach(btn => {
                btn.addEventListener('click', function () {
                    this.parentElement.remove();
                });
            });
        }
        addDeleteFunctionality();

        // Add New Content Item with Default Category Options
        document.getElementById('add-content-btn').addEventListener('click', function () {
            const container = document.getElementById('content-container');

            const categoryOptions = `
                <option value="Roof">Roof</option>
                <option value="Price">Price</option>
                <option value="Process">Process</option>
                <option value="Interior">Interior</option>
            `;

            const itemHTML = `
                <div class="content-item">
                    <label>Title:</label>
                    <input type="text" name="content_titles[]" placeholder="Enter content title">

                    <label>Category:</label>
                    <select name="content_categories[]">${categoryOptions}</select>

                    <label>Image:</label>
                    <input type="file" name="content_images[]" accept="image/*">

                    <button type="button" class="remove-content-item">Delete</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', itemHTML);
            addDeleteFunctionality();
        });

        // Save All Data
        document.getElementById('admin-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('save-carousel-content.php', {
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
