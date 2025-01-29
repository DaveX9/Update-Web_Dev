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
    <h1>Manage "Our Story" Section</h1>

    <form id="story-form" enctype="multipart/form-data">
        <h2>Edit Contact Information</h2>
        <div class="form-group">
            <label for="contact-phone">Phone:</label>
            <input type="text" id="contact-phone" name="contact_phone" value="02-454-2043">
        </div>
        <div class="form-group">
            <label for="contact-email">Email:</label>
            <input type="email" id="contact-email" name="contact_email" value="info@thomeinspector.com">
        </div>
        <div class="form-group">
            <label for="contact-line">Line ID:</label>
            <input type="text" id="contact-line" name="contact_line" value="@t.home">
        </div>

        <h2>Edit "Our Story" Section</h2>
        <div class="form-group">
            <label for="story-content">Story Content:</label>
            <textarea id="story-content" name="story_content" rows="6">
            ต.ตรวจบ้าน เริ่มต้นเมื่อปี 2015 เจ้าของ คุณสุเมธ เจตรำรงชัย และคุณสุเทพ เจตรำรงชัย...
            </textarea>
        </div>

        <h2>Edit Vision and Mission</h2>
        <div class="form-group">
            <label for="vision-mission">Vision and Mission:</label>
            <textarea id="vision-mission" name="vision_mission" rows="4">
            “ผู้นำด้านการตรวจบ้าน”
            บริการตรวจสอบบ้านมือสองของบ้านและคอนโดก่อนโอนกรรมสิทธิ์ดีที่สุด อันดับ 1 ที่ลูกค้าเลือกมากที่สุดในประเทศไทย
            </textarea>
        </div>

        <h2>Edit Team Section</h2>
        <div id="team-container">
            <div class="form-group team-member">
                <label>Team Member 1:</label>
                <input type="text" name="team_names[]" value="Sumes Cheethamroongchai">
                <input type="text" name="team_roles[]" value="Founder/CEO">
                <img src="/HOMESPECTOR/img/staff/CEO.jpg" alt="Team Member 1" style="max-width: 200px;">
                <input type="file" name="team_images[]" accept="image/*">
                <button type="button" class="delete-btn" onclick="removeTeamMember(this)">Delete</button>
            </div>
            <div class="form-group team-member">
                <label>Team Member 2:</label>
                <input type="text" name="team_names[]" value="Suthep Cheethamroongchai">
                <input type="text" name="team_roles[]" value="Co-founder">
                <img src="/HOMESPECTOR/img/staff/Co-founder.jpg" alt="Team Member 2" style="max-width: 200px;">
                <input type="file" name="team_images[]" accept="image/*">
                <button type="button" class="delete-btn" onclick="removeTeamMember(this)">Delete</button>
            </div>
        </div>
        <button type="button" id="add-team-btn">Add Team Member</button>

        <h2>Edit Commitment Section</h2>
        <div id="commitment-container">
            <div class="form-group commitment-item">
                <label>Commitment 1:</label>
                <input type="text" name="commitment_points[]" value="ซื่อสัตย์และโปร่งใส ไม่ใช่คนในบริษัทอสังหาริมทรัพย์ออกมารับงานเองหรือตรวจงานโครงการตัวเอง">
                <button type="button" class="delete-btn" onclick="removeCommitment(this)">Delete</button>
            </div>
            <div class="form-group commitment-item">
                <label>Commitment 2:</label>
                <input type="text" name="commitment_points[]" value="ตรวจครบทุกฟังก์ชันการใช้งานหลัก ใช้เทคโนโลยีที่ทันสมัยเข้ามาใช้ในการตรวจเพื่อความแม่นยำ">
                <button type="button" class="delete-btn" onclick="removeCommitment(this)">Delete</button>
            </div>
            <div class="form-group commitment-item">
                <label>Commitment 3:</label>
                <input type="text" name="commitment_points[]" value="ตรวจบ้านทุกวันเป็น 'อาชีพหลัก ไม่ใช่งานเสริม'">
                <button type="button" class="delete-btn" onclick="removeCommitment(this)">Delete</button>
            </div>
            <div class="form-group commitment-item">
                <label>Commitment 4:</label>
                <input type="text" name="commitment_points[]" value="ตรวจด้วยช่างผู้เชี่ยวชาญงานจริง ไม่ใช้คำว่าวิศวกรมาหากิน">
                <button type="button" class="delete-btn" onclick="removeCommitment(this)">Delete</button>
            </div>
            <div class="form-group commitment-item">
                <label>Commitment 5:</label>
                <input type="text" name="commitment_points[]" value="ไม่เน้นล่ารายการดีเฟคเพื่อให้เล่มรายงานดูเยอะ">
                <button type="button" class="delete-btn" onclick="removeCommitment(this)">Delete</button>
            </div>
            <div class="form-group commitment-item">
                <label>Commitment 6:</label>
                <input type="text" name="commitment_points[]" value="บริษัทรับงานเองและไม่มีการส่งงานต่อให้ซับกินค่าหัวคิว">
                <button type="button" class="delete-btn" onclick="removeCommitment(this)">Delete</button>
            </div>
            <div class="form-group commitment-item">
                <label>Commitment 7:</label>
                <input type="text" name="commitment_points[]" value="คติของเรา 'ตรวจจริง เห็นกับตา ไปพร้อมลูกค้า'">
                <button type="button" class="delete-btn" onclick="removeCommitment(this)">Delete</button>
            </div>
        </div>
        <button type="button" id="add-commitment-btn">Add Commitment</button>

        <button type="submit" id="save-btn">Save Changes</button>
    </form>
</div>

<script>
    document.getElementById('story-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch('save-OURstory.php', {
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
        .catch(error => console.error('Error:', error));
    });

    // Add New Commitment
    document.getElementById('add-commitment-btn').addEventListener('click', function () {
        const container = document.getElementById('commitment-container');
        const count = container.getElementsByClassName('commitment-item').length + 1;

        const newCommitment = document.createElement('div');
        newCommitment.classList.add('form-group', 'commitment-item');
        newCommitment.innerHTML = `
            <label>Commitment ${count}:</label>
            <input type="text" name="commitment_points[]" value="">
            <button type="button" class="delete-btn" onclick="removeCommitment(this)">Delete</button>
        `;
        container.appendChild(newCommitment);
    });

    // Delete Commitment
    function removeCommitment(button) {
        button.parentElement.remove();
    }

    // Add New Team Member
    document.getElementById('add-team-btn').addEventListener('click', function () {
        const container = document.getElementById('team-container');
        const count = container.getElementsByClassName('team-member').length + 1;

        const newTeamMember = document.createElement('div');
        newTeamMember.classList.add('form-group', 'team-member');
        newTeamMember.innerHTML = `
            <label>Team Member ${count}:</label>
            <input type="text" name="team_names[]" value="" placeholder="Name">
            <input type="text" name="team_roles[]" value="" placeholder="Role">
            <input type="file" name="team_images[]" accept="image/*">
            <button type="button" class="delete-btn" onclick="removeTeamMember(this)">Delete</button>
        `;
        container.appendChild(newTeamMember);
    });

    // Delete Team Member
    function removeTeamMember(button) {
        button.parentElement.remove();
    }
</script>

<?php include 'footer.php'; ?>
