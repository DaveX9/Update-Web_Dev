<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<style>
    #save-btn {
    background-color: #007BFF; /* Blue color */
    color: white; /* White text */
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

#save-btn:hover {
    background-color: #0056b3; /* Darker blue */
}

#save-btn:active {
    background-color: #00408a; /* Even darker blue */
}

</style>

<div class="form-container">
    <h1>Manage About Us Section</h1>

    <form id="about-form" enctype="multipart/form-data">
        <h2>Edit Contact Information</h2>
        <div class="form-group">
            <label for="contact-phone">Phone:</label>
            <input type="text" id="contact-phone" name="contact_phone" value="02-454-2043">
        </div>
        <div class="form-group">
            <label for="contact-line">Line ID:</label>
            <input type="text" id="contact-line" name="contact_line" value="@t.home">
        </div>

        <h2>Edit "Our Story"</h2>
        <div class="form-group">
            <label for="about-content">About Content:</label>
            <textarea id="about-content" name="about_content" rows="6">
            ต.ตรวจบ้านก่อตั้งขึ้นเมื่อปี 2015 โดยคุณสมเย ซอว์ราซัย และคุณเทพ เดชกีราชชัย
            </textarea>
        </div>

        <h2>Edit YouTube Video</h2>
        <div class="form-group">
            <label for="youtube-link">YouTube Video Link:</label>
            <input type="text" id="youtube-link" name="youtube_link" value="https://www.youtube.com/embed/47ZFlpLnICQ">
            <div class="video-preview">
                <iframe id="youtube-preview" width="560" height="315" src="https://www.youtube.com/embed/47ZFlpLnICQ" 
                    frameborder="0" allowfullscreen>
                </iframe>
            </div>
        </div>

        <h2>Manage Founders</h2>
        <div id="founders-container">
            <div class="form-group">
                <label>Founder 1 Name:</label>
                <input type="text" name="founder_names[]" value="Sumes Chethtumrongchai">
                <label>Role:</label>
                <input type="text" name="founder_roles[]" value="Founder & Managing Director">
                <label>Image:</label>
                <img src="/HOMESPECTOR/img/staff/CEO.jpg" alt="Founder 1" style="max-width: 150px;">
                <input type="file" name="founder_images[]" accept="image/*">
            </div>

            <div class="form-group">
                <label>Founder 2 Name:</label>
                <input type="text" name="founder_names[]" value="Suthep Chethtumrongchai">
                <label>Role:</label>
                <input type="text" name="founder_roles[]" value="Co-Founder & Civil Engineer">
                <label>Image:</label>
                <img src="/HOMESPECTOR/img/staff/Co-founder.jpg" alt="Founder 2" style="max-width: 150px;">
                <input type="file" name="founder_images[]" accept="image/*">
            </div>
        </div>

        <h2>Our Team</h2>
        <div id="team-container">
            <div class="team-member">
                <input type="text" name="team_names[]" value="Charnthawat">
                <img src="/HOMESPECTOR/img/staff/Charnthawat.jpg" alt="Team Member 1" style="max-width: 150px;">
                <input type="file" name="team_images[]" accept="image/*">
                <button type="button" class="remove-team-btn">Delete</button>
            </div>
            <div class="team-member">
                <input type="text" name="team_names[]" value="Supapat">
                <img src="/HOMESPECTOR/img/staff/Supapat.jpg" alt="Team Member 2" style="max-width: 150px;">
                <input type="file" name="team_images[]" accept="image/*">
                <button type="button" class="remove-team-btn">Delete</button>
            </div>
            <div class="team-member">
                <input type="text" name="team_names[]" value="Jakkarin">
                <img src="/HOMESPECTOR/img/staff/Jakkarin.jpg" alt="Team Member 3" style="max-width: 150px;">
                <input type="file" name="team_images[]" accept="image/*">
                <button type="button" class="remove-team-btn">Delete</button>
            </div>
            <div class="team-member">
                <input type="text" name="team_names[]" value="Waroj">
                <img src="/HOMESPECTOR/img/staff/Waroj.jpg" alt="Team Member 4" style="max-width: 150px;">
                <input type="file" name="team_images[]" accept="image/*">
                <button type="button" class="remove-team-btn">Delete</button>
            </div>
            <div class="team-member">
                <input type="text" name="team_names[]" value="Watanon">
                <img src="/HOMESPECTOR/img/staff/Watanon.jpg" alt="Team Member 5" style="max-width: 150px;">
                <input type="file" name="team_images[]" accept="image/*">
                <button type="button" class="remove-team-btn">Delete</button>
            </div>
            <div class="team-member">
                <input type="text" name="team_names[]" value="Phonthewa">
                <img src="/HOMESPECTOR/img/staff/Phonthewa.JPG" alt="Team Member 6" style="max-width: 150px;">
                <input type="file" name="team_images[]" accept="image/*">
                <button type="button" class="remove-team-btn">Delete</button>
            </div>
            <div class="team-member">
                <input type="text" name="team_names[]" value="Chonsawat">
                <img src="/HOMESPECTOR/img/staff/Chonsawat.jpg" alt="Team Member 7" style="max-width: 150px;">
                <input type="file" name="team_images[]" accept="image/*">
                <button type="button" class="remove-team-btn">Delete</button>
            </div>
        </div>
        <button type="button" id="add-team-btn">Add New Team Member</button>

        <button type="submit" id="save-btn">Save Changes</button>
    </form>
</div>

<script>
// Update YouTube preview when admin changes the link
document.getElementById('youtube-link').addEventListener('input', function () {
    let videoUrl = this.value;
    document.getElementById('youtube-preview').src = videoUrl;
});

// Add new team member dynamically
document.getElementById('add-team-btn').addEventListener('click', function () {
    const teamContainer = document.getElementById('team-container');
    const newMemberHTML = `
        <div class="team-member">
            <input type="text" name="team_names[]" placeholder="Enter Team Member Name">
            <input type="file" name="team_images[]" accept="image/*">
            <button type="button" class="remove-team-btn">Delete</button>
        </div>`;
    teamContainer.insertAdjacentHTML('beforeend', newMemberHTML);
    attachDeleteHandlers();
});

// Function to attach delete handlers dynamically
function attachDeleteHandlers() {
    document.querySelectorAll('.remove-team-btn').forEach(button => {
        button.addEventListener('click', function () {
            this.parentElement.remove();
        });
    });
}

attachDeleteHandlers();

// Save form data via AJAX
document.getElementById('about-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('save-ourteam.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Content updated successfully!');
            location.reload();
        } else {
            alert('Failed to update content.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>

<?php include 'footer.php'; ?>
