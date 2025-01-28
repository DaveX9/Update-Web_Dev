<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<div class="form-container">
    <h1>Manage "Join Us" Section</h1>

    <form id="join-us-form" enctype="multipart/form-data">
        <h2>Join Us Content</h2>

        <!-- Editable Text Fields -->
        <div class="form-group">
            <label for="join-title">Title:</label>
            <input type="text" id="join-title-input" name="join_title" value="JOIN US !" />
        </div>

        <div class="form-group">
            <label for="join-description">Description:</label>
            <textarea id="join-description-input" name="join_description" rows="4">
Join us to be a part of the professional consulting team, providing extraordinary
level of expertise on services and solutions of the ever growing industry.
            </textarea>
        </div>

        <div class="form-group">
            <label for="join-button">Button Text:</label>
            <input type="text" id="join-button-input" name="join_button" value="Join Us" />
        </div>

        <!-- Editable Image -->
        <h2>Join Us Image</h2>
        <div class="form-group">
            <label for="join-image">Upload Image:</label>
            <img id="join-image-preview" src="/HOMESPECTOR/img/joinwithus2.png" alt="Join Us Preview" style="max-width: 300px;">
            <input type="file" id="join-image-input" name="join_image" accept="image/*" />
        </div>

        <!-- Save Button -->
        <button type="submit" id="save-join-us-btn">Save Changes</button>
    </form>
</div>
<script>
    document.getElementById('join-us-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    // Submit form data to the server
    fetch('save-join-us.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Join Us section updated successfully!');
                // Update the page dynamically
                document.getElementById('join-title').innerText = formDataa.get('join_title');
                document.getElementById('join-description').innerText = formData.get('join_description');
                document.getElementById('join-button').innerText = formData.get('join_button');
                if (data.image_url) {
                    document.getElementById('join-image').src = data.image_url;
                }
            } else {
                alert('Failed to update the Join Us section.');
            }
        })
        .catch(error => {
            console.error('Error updating Join Us section:', error);
        });
    });

</script>
<?php include 'footer.php'; ?>