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

<!-- Include Froala Editor CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/css/froala_editor.pkgd.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/js/froala_editor.pkgd.min.js"></script>

<div class="form-container">
    <h1>Manage Articles</h1>

    <form id="article-form" enctype="multipart/form-data">
        <h2>Edit Article</h2>

        <!-- Article Thumbnail -->
        <div class="form-group">
            <label for="article-thumbnail">Article Thumbnail (936 x 712 px):</label>
            <img id="article-thumbnail-preview" src="/HOMESPECTOR/img/project1.jpg" alt="Article Thumbnail" style="max-width: 300px;">
            <input type="file" id="article-thumbnail" name="article_thumbnail" accept="image/*">
        </div>

        <!-- Article Headline -->
        <div class="form-group">
            <label for="article-title">Headline:</label>
            <input type="text" id="article-title" name="article_title" value="สรุป!! จัดการการออกแบบสาย LAN ตามบ้าน">
        </div>

        <!-- Short Detail -->
        <div class="form-group">
            <label for="article-short-detail">Short Detail:</label>
            <textarea id="article-short-detail" name="article_short_detail" rows="3">News Detail Show</textarea>
        </div>

        <!-- Article Detail with Froala Editor -->
        <h2>Article Detail</h2>
        <textarea id="article-detail" name="article_detail">
            <p>
                สรุปจักรวาลการออกแบบสาย LAN ตามบ้านแบบเข้าใจง่าย โดยหลักการออกแบบเบื้องต้นจะมี 4 แบบดังนี้
                (หรืออ่านในรูปได้ค่ะ)
            </p>

            <div class="subsection">
                <img src="/HOMESPECTOR/img/article1.jpg" alt="Fiber Optic Design 1">
                <p>
                    1. มีจุดต่อ Fiber Optic อยู่ใกล้หม้อแปลงไฟฟ้า มีการเชื่อมต่อไปที่โถงชั้น 1
                    และโถงชั้น 2 (รูปที่ 1)
                    การเชื่อมระบบ LAN แบบส่วนตัว
                    เน้นให้ใช้งานผ่าน Wifi เป็นหลัก ไม่ได้เน้นการต่อสาย LAN เข้าทีคอมพิวเตอร์โดยตรง
                </p>
            </div>

            <div class="subsection">
                <img src="/HOMESPECTOR/img/article1.jpg" alt="Fiber Optic Design 2">
                <p>
                    2. มีจุดต่อ Fiber Optic อยู่ใกล้หม้อแปลงไฟฟ้า มีการเชื่อมต่อไปที่โถงชั้น 1
                    และโถงชั้น 2
                    และห้องนอนส่วนตัวของบ้าน การเชื่อมระบบ LAN
                    รูปแบบแบ่งแยกเหมาะสมในรูปแบบส่วนตัวใช้ LAN สำหรับห้อง Computer ในแต่ละห้อง
                </p>
            </div>

            <div class="subsection">
                <img src="/HOMESPECTOR/img/article1.jpg" alt="Fiber Optic Design 2">
                <p>
                    3. มีจุดต่อ Fiber Optic อยู่ใกล้หม้อแปลงไฟฟ้า มีการเชื่อมต่อไปที่โถงชั้น 1
                    และโถงชั้น 2
                    และห้องนอนส่วนตัวของบ้าน การเชื่อมระบบ LAN
                    รูปแบบแบ่งแยกเหมาะสมในรูปแบบส่วนตัวใช้ LAN สำหรับห้อง Computer ในแต่ละห้อง
                </p>
            </div>

            <div class="subsection">
                <img src="/HOMESPECTOR/img/article1.jpg" alt="Fiber Optic Design 2">
                <p>
                    4. มีจุดต่อ Fiber Optic อยู่ใกล้หม้อแปลงไฟฟ้า มีการเชื่อมต่อไปที่โถงชั้น 1
                    และโถงชั้น 2
                    และห้องนอนส่วนตัวของบ้าน การเชื่อมระบบ LAN
                    รูปแบบแบ่งแยกเหมาะสมในรูปแบบส่วนตัวใช้ LAN สำหรับห้อง Computer ในแต่ละห้อง
                </p>
            </div>
        </textarea>
        

        <!-- Save Button -->
        <button type="submit" id="save-btn">Save Changes</button>
    </form>
</div>

<script>
    // Initialize Froala Editor
    new FroalaEditor('#article-detail', {
        toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript',
                        '|', 'alignLeft', 'alignCenter', 'alignRight', 'alignJustify',
                        '|', 'insertLink', 'insertImage', 'insertTable', '|', 'undo', 'redo', 'fullscreen'],
        imageUploadURL: 'upload-image.php', // Endpoint for uploading images
        heightMin: 300,
        heightMax: 600
    });

    // Save Data
    document.getElementById('article-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch('save-articlesview.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Article updated successfully!');
                location.reload();
            } else {
                alert('Failed to update article.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>
<?php include 'footer.php'; ?>
