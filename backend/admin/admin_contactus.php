<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<div class="form-container">

    <form id="contact-form" enctype="multipart/form-data">
        <h2>Contact Information</h2>

        <!-- Phone Number -->
        <div class="form-group">
            <label for="admin-phone">Admin Phone Number:</label>
            <input type="text" id="admin-phone" name="admin_phone" value="082-045-6165, 02-301-0283" />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="admin-email">Admin Email:</label>
            <input type="email" id="admin-email" name="admin_email" value="marketing@Thomeinspector.co.th" />
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="office-address">Office Address:</label>
            <textarea id="office-address" name="office_address" rows="3">
2043 ซอย กาญจนาภิเษก 8 แขวงบางแค เขตบางแค กรุงเทพมหานคร 10160
            </textarea>
        </div>

        <!-- Social Links -->
        <h2>Social Links</h2>
        <div class="form-group">
            <label for="facebook-link">Facebook Link:</label>
            <input type="url" id="facebook-link" name="facebook_link" value="https://www.facebook.com/t.homeinspector/?locale=th_TH" />
        </div>
        <div class="form-group">
            <label for="instagram-link">Instagram Link:</label>
            <input type="url" id="instagram-link" name="instagram_link" value="https://www.instagram.com/t.homeinspector/" />
        </div>
        <div class="form-group">
            <label for="line-link">Line Link:</label>
            <input type="url" id="line-link" name="line_link" value="https://page.line.me/t.home?openQrModal=true" />
        </div>

        <!-- Save Button -->
        <button type="submit" id="save-contact-btn">Save Changes</button>
    </form>
</div>

<script>
    document.getElementById('contact-form').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        // Submit form data to the server
        fetch('save-contact.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Contact section updated successfully!');
                } else {
                    alert('Failed to update the contact section.');
                }
            })
            .catch(error => {
                console.error('Error saving contact section:', error);
            });
    });
</script>

<?php include 'footer.php'; ?>
