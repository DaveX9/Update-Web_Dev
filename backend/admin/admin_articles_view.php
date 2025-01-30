
<style>
      body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color:rgb(255, 255, 255);
        }
        .form-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .form-group input, .form-group textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group textarea {
            height: 100px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .button-container .save-btn {
            background-color: #007bff;
            color: #fff;
        }
        .button-container .cancel-btn {
            background-color: #6c757d;
            color: #fff;
        }
        .footer{
            margin-top: 40px;
        }
    #save-btn, #add-carousel-item-btn {
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

    #save-btn:hover, #add-carousel-item-btn:hover {
        background-color: #0056b3;
    }

    .remove-carousel-item {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        margin-top: 10px;
    }

    .carousel-item {
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
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group img {
        max-width: 300px;
        display: block;
        margin-top: 10px;
    }
</style>

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

<div class="form-container">
    <h1>Manage "Other Articles" Carousel</h1>

    <form id="carousel-form" enctype="multipart/form-data">
        <h2>Edit Carousel</h2>

        <!-- Default Carousel Items -->
        <div id="carousel-container">
            <div class="carousel-item">
                <label>Title:</label>
                <input type="text" name="carousel_titles[]" value="Review Setthasiri">
                <label>Image:</label>
                <img src="/HOMESPECTOR/img/project1.jpg" alt="Carousel Image" class="preview-image">
                <input type="file" name="carousel_images[]" accept="image/*">
                <button type="button" class="remove-carousel-item">Delete</button>
            </div>
            <div class="carousel-item">
                <label>Title:</label>
                <input type="text" name="carousel_titles[]" value="Review Setthasiri">
                <label>Image:</label>
                <img src="/HOMESPECTOR/img/project1.jpg" alt="Carousel Image" class="preview-image">
                <input type="file" name="carousel_images[]" accept="image/*">
                <button type="button" class="remove-carousel-item">Delete</button>
            </div>

            <div class="carousel-item">
                <label>Title:</label>
                <input type="text" name="carousel_titles[]" value="Review Ladawan">
                <label>Image:</label>
                <img src="/HOMESPECTOR/img/carousel2.jpg" alt="Carousel Image" class="preview-image">
                <input type="file" name="carousel_images[]" accept="image/*">
                <button type="button" class="remove-carousel-item">Delete</button>
            </div>
            <div class="carousel-item">
                <label>Title:</label>
                <input type="text" name="carousel_titles[]" value="Review Ladawan">
                <label>Image:</label>
                <img src="/HOMESPECTOR/img/carousel2.jpg" alt="Carousel Image" class="preview-image">
                <input type="file" name="carousel_images[]" accept="image/*">
                <button type="button" class="remove-carousel-item">Delete</button>
            </div>
            <div class="carousel-item">
                <label>Title:</label>
                <input type="text" name="carousel_titles[]" value="Review Ladawan">
                <label>Image:</label>
                <img src="/HOMESPECTOR/img/carousel2.jpg" alt="Carousel Image" class="preview-image">
                <input type="file" name="carousel_images[]" accept="image/*">
                <button type="button" class="remove-carousel-item">Delete</button>
            </div>

            <div class="carousel-item">
                <label>Title:</label>
                <input type="text" name="carousel_titles[]" value="Review Setthasiri">
                <label>Image:</label>
                <img src="/HOMESPECTOR/img/project1.jpg" alt="Carousel Image" class="preview-image">
                <input type="file" name="carousel_images[]" accept="image/*">
                <button type="button" class="remove-carousel-item">Delete</button>
            </div>
        </div>

        <!-- Add New Carousel Item Button -->
        <button type="button" id="add-carousel-item-btn">+ Add New Carousel Item</button>

        <!-- Save Button -->
        <button type="submit" id="save-btn">Save Changes</button>
    </form>
</div>

<!-- Include Froala Editor CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/css/froala_editor.pkgd.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.15/js/froala_editor.pkgd.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize Froala Editor
        new FroalaEditor('#article-detail', {
            toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript',
                            '|', 'alignLeft', 'alignCenter', 'alignRight', 'alignJustify',
                            '|', 'insertLink', 'insertImage', 'insertTable', '|', 'undo', 'redo', 'fullscreen'],
            imageUploadURL: 'upload-image.php', // Endpoint for uploading images
            heightMin: 300,
            heightMax: 600
        });

        // Save Article Data
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

        // Add Delete Functionality for Carousel
        function addDeleteFunctionality() {
            document.querySelectorAll('.remove-carousel-item').forEach(btn => {
                btn.addEventListener('click', function () {
                    this.parentElement.remove();
                });
            });
        }
        addDeleteFunctionality();

        // Add New Carousel Item
        document.getElementById('add-carousel-item-btn').addEventListener('click', function () {
            const container = document.getElementById('carousel-container');
            const itemHTML = `
                <div class="carousel-item">
                    <label>Title:</label>
                    <input type="text" name="carousel_titles[]" placeholder="Enter article title">
                    <label>Image:</label>
                    <input type="file" name="carousel_images[]">
                    <button type="button" class="remove-carousel-item">Delete</button>
                </div>
            `;
            container.innerHTML += itemHTML;
            addDeleteFunctionality();
        });

        // Save Carousel Data
        document.getElementById('carousel-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('save-articlesview.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Carousel updated successfully!');
                    location.reload();
                } else {
                    alert('Failed to update carousel.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
