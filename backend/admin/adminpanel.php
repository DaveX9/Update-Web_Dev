<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Choose Us: Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.15/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.0.15/js/froala_editor.pkgd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

    </style>
</head>
<body>
    <!-- line  -->
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

    <script>
        // Handle form submission
        document.getElementById('edit-contact-form').addEventListener('submit', function (e) {
            e.preventDefault();

            // Collect the form data
            const formData = new FormData(this);

            // Send the data to the backend
            fetch('save-contact-info.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.text())
                .then((data) => {
                    alert('Contact Info updated successfully!');
                    console.log(data); // Log response for debugging
                })
                .catch((error) => {
                    console.error('Error updating Contact Info:', error);
                    alert('Failed to update Contact Info.');
                });
        });
    </script>

    <div class="form-container">
        <h1>Manage Carousel Images</h1>

        <form id="carousel-form" enctype="multipart/form-data">
            <!-- Default Images Section -->
            <div class="form-group">
                <h3>Current Carousel Images</h3>
                <div class="carousel-preview" id="carousel-preview">
                    <!-- Default images -->
                    <div class="carousel-item" id="carousel-item-1">
                        <img src="/HOMESPECTOR/img/carousel4.jpg" alt="Carousel Image 1" style="max-width: 200px;">
                        <button type="button" class="delete-btn" onclick="deleteImage(1)">Delete</button>
                    </div>
                    <div class="carousel-item" id="carousel-item-2">
                        <img src="/HOMESPECTOR/img/carousel2.jpg" alt="Carousel Image 2" style="max-width: 200px;">
                        <button type="button" class="delete-btn" onclick="deleteImage(2)">Delete</button>
                    </div>
                    <div class="carousel-item" id="carousel-item-3">
                        <img src="/HOMESPECTOR/img/carousel3.jpg" alt="Carousel Image 3" style="max-width: 200px;">
                        <button type="button" class="delete-btn" onclick="deleteImage(3)">Delete</button>
                    </div>
                </div>
            </div>

            <!-- Upload New Images -->
            <div class="form-group">
                <h3>Upload New Images</h3>
                <div id="new-images-container">
                    <div class="upload-slot" id="upload-slot-1">
                        <label for="new-image-1">New Image 1:</label>
                        <input type="file" id="new-image-1" name="new_image_1" accept="image/*">
                    </div>
                </div>
                <button type="button" id="add-upload-slot-btn">Add Another Image</button>
            </div>

            <!-- Submit Button -->
            <div class="button-container">
                <button type="submit" class="save-btn">Save Changes</button>
            </div>
        </form>
    </div>

    <script>
        let uploadSlotCount = 1; // Tracks the number of upload slots

        // Function to add a new upload slot dynamically
        function addUploadSlot() {
            uploadSlotCount++;
            const newImagesContainer = document.getElementById('new-images-container');

            const slotHTML = `
                <div class="upload-slot" id="upload-slot-${uploadSlotCount}">
                    <label for="new-image-${uploadSlotCount}">New Image ${uploadSlotCount}:</label>
                    <input type="file" id="new-image-${uploadSlotCount}" name="new_image_${uploadSlotCount}" accept="image/*">
                </div>
            `;

            newImagesContainer.insertAdjacentHTML('beforeend', slotHTML);
        }

        // Function to delete a default image
        function deleteImage(id) {
            const imageSlot = document.getElementById(`carousel-item-${id}`);
            if (imageSlot) {
                imageSlot.remove();
            }
        }

        // Handle form submission
        document.getElementById('carousel-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('save-carousel1-images.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    alert(data.message);
                })
                .catch((error) => {
                    console.error('Error saving carousel images:', error);
                    alert('Failed to save carousel images.');
                });
        });

        // Add event listener for adding new upload slots
        document.getElementById('add-upload-slot-btn').addEventListener('click', addUploadSlot);
    </script>


    <div class="form-container">
        <h1>Edit Inspection Info</h1>
        <form id="edit-inspection-form" enctype="multipart/form-data">
            <!-- Image Upload -->
            <div class="form-group">
                <label for="inspection-image">Current Image:</label>
                <div class="image-preview">
                    <img id="current-inspection-image" src="/HOMESPECTOR/img/how.png" alt="Current Image" style="max-width: 200px;" />
                </div>
                <label for="new-inspection-image">Upload New Image:</label>
                <input type="file" id="new-inspection-image" name="inspection_image" accept="image/*" />
            </div>

            <!-- Text Inputs -->
            <div class="form-group">
                <label for="inspection-title">Title:</label>
                <input type="text" id="inspection-title" name="inspection_title" value="ตรวจบ้านต้องทำอย่างไร ?" />
            </div>
            <div class="form-group">
                <label for="inspection-description">Description:</label>
                <textarea id="inspection-description" name="inspection_description" placeholder="Enter inspection details">รายละเอียดที่ต้องตกลง และเตรียมก่อนตรวจบ้าน</textarea>
            </div>

            <!-- Button Text -->
            <div class="form-group">
                <label for="button-text">Button Text:</label>
                <input type="text" id="button-text" name="button_text" value="ดูรายละเอียด" />
            </div>

            <!-- Save and Cancel Buttons -->
            <div class="button-container">
                <button type="submit" class="save-btn">Save</button>
                <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('edit-inspection-form').addEventListener('submit', function (e) {
            e.preventDefault();

            // Collect the form data
            const formData = new FormData(this);

            // Send the data to the backend
            fetch('save-inspection-info.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.text())
                .then((data) => {
                    alert('Inspection Info updated successfully!');
                    console.log(data); // Log response for debugging
                })
                .catch((error) => {
                    console.error('Error updating Inspection Info:', error);
                    alert('Failed to update Inspection Info.');
                });
        });
    </script>


    <div class="form-container">
        <h1>Why Us? : Edit</h1>
        <form id="edit-form">
            <!-- Headline Inputs -->
            <div class="form-group">
                <label for="headline-th">Headline (TH):</label>
                <input type="text" id="headline-th" name="headline_th" value="ทำไมต้องเลือก ต.ตรวจบ้าน" />
            </div>
            <div class="form-group">
                <label for="headline-en">Headline (EN):</label>
                <input type="text" id="headline-en" name="headline_en" value="Why Choose Us?" />
            </div>

            <!-- Froala Editor for Details -->
            <div class="form-group">
                <label for="trust-editor">Detail:</label>
                <textarea id="trust-editor">TRUST<br>บริษัทตรวจบ้านอันดับ 1 ที่ลูกค้าบอกต่อมากที่สุดในประเทศไทย...<br><br>
                TECH<br>บริษัทตรวจบ้านเจ้าแรกและเจ้าเดียวที่ออกแบบและพัฒนาระบบ Web-Application...<br><br>
                TEAM<br>เราทำงานเป็นระบบแบบมืออาชีพ มีประสบการณ์และเชี่ยวชาญในการตรวจทุกคน...</textarea>
            </div>

            <div class="button-container">
                <button type="submit" class="save-btn">Save</button>
                <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
            </div>
        </form>
    </div>
    <div class="form-container">
        <h1>Edit Certifications and Images</h1>
        <form id="edit-certifications-form" enctype="multipart/form-data">
            <!-- Default Main Image -->
            <div class="form-group">
                <label for="main-image">Main Image:</label>
                <div class="image-preview">
                    <img id="current-main-image" src="/HOMESPECTOR/img/carousel2.1.jpg" alt="Main Image" style="max-width: 200px;" />
                </div>
                <label for="new-main-image">Upload New Main Image:</label>
                <input type="file" id="new-main-image" name="main_image" accept="image/*" />
            </div>

            <!-- Certifications Section -->
            <div class="form-group">
                <label for="certification-1">Certification 1 Image:</label>
                <div class="image-preview">
                    <img id="certification-1-preview" src="/HOMESPECTOR/img/certified1.png" alt="Certification 1" style="max-width: 100px;" />
                </div>
                <input type="file" id="certification-1" name="certification_1" accept="image/*" />
            </div>
            <div class="form-group">
                <label for="certification-2">Certification 2 Image:</label>
                <div class="image-preview">
                    <img id="certification-2-preview" src="/HOMESPECTOR/img/certified2.png" alt="Certification 2" style="max-width: 100px;" />
                </div>
                <input type="file" id="certification-2" name="certification_2" accept="image/*" />
            </div>
            <div class="form-group">
                <label for="certification-3">Certification 3 Image:</label>
                <div class="image-preview">
                    <img id="certification-3-preview" src="/HOMESPECTOR/img/certified3.png" alt="Certification 3" style="max-width: 100px;" />
                </div>
                <input type="file" id="certification-3" name="certification_3" accept="image/*" />
            </div>

            <div class="button-container">
                <button type="submit" class="save-btn">Save</button>
                <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
            </div>
        </form>
    </div>



    <script>
        // Initialize Froala Editor for the Details section
        const trustEditor = new FroalaEditor('#trust-editor', {
            toolbarButtons: [
                'bold', 'italic', 'underline', 'formatOL', 'formatUL', 'paragraphFormat', 'insertLink'
            ],
            height: 300
        });

        // Handle Form Submission
        $('#edit-form').on('submit', function (e) {
            e.preventDefault();

            // Get values from the editors and inputs
            const headlineTH = $('#headline-th').val();
            const headlineEN = $('#headline-en').val();
            const detailsContent = trustEditor.html.get();

            // Send the data to the server using AJAX
            $.ajax({
                url: 'save-content.php', // PHP file to save the data
                type: 'POST',
                data: {
                    headline_th: headlineTH,
                    headline_en: headlineEN,
                    details: detailsContent
                },
                success: function (response) {
                    alert('Content saved successfully!');
                },
                error: function () {
                    alert('Error saving content.');
                }
            });
        });
            document.getElementById('edit-certifications-form').addEventListener('submit', function (e) {
            e.preventDefault();

            // Collect form data
            const formData = new FormData(this);

            // Send the data to the backend
            fetch('save-certifications.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.text())
                .then((data) => {
                    alert('Certifications updated successfully!');
                    console.log(data); // Log response for debugging
                })
                .catch((error) => {
                    console.error('Error updating certifications:', error);
                    alert('Failed to update certifications.');
                });
        });
    </script>
    <div class="form-container">
        <h1>Edit Carousel Slides and Thumbnails</h1>
        <form id="edit-carousel-form" enctype="multipart/form-data">
            <!-- Carousel Section -->
            <div id="carousel-section">
                <h2>Carousel Slides <button type="button" id="add-carousel-btn" class="add-btn">Add Slide</button></h2>

                <!-- Slide 1 -->
                <div class="form-group slide-group" id="carousel-slide-1">
                    <h3>Slide 1 <button type="button" class="delete-btn" onclick="deleteCarouselSlide(1)">Delete</button></h3>
                    <label for="carousel-upload-1">Image:</label>
                    <div class="image-preview">
                        <img id="carousel-preview-1" src="/HOMESPECTOR/img/carousel_thumb3.webp" alt="Feature 1" style="max-width: 200px;" />
                    </div>
                    <input type="file" id="carousel-upload-1" name="carousel_image_1" accept="image/*" />
                    <label for="carousel-title-1">Title (H3):</label>
                    <input type="text" id="carousel-title-1" name="carousel_title_1" value="ต.ตรวจบ้าน x การตลาดวันละตอน" />
                    <label for="carousel-description-1">Description (P):</label>
                    <textarea id="carousel-description-1" name="carousel_description_1">พาดูบ้านหรู 89 ล้าน! แกรนด์ บางกอก บูเลอวาร์ด ยาร์ด บางนา</textarea>
                </div>
                <!-- Slide 2 -->
                <div class="form-group slide-group" id="carousel-slide-2">
                    <h3>Slide 2 <button type="button" class="delete-btn" onclick="deleteCarouselSlide(2)">Delete</button></h3>
                    <label for="carousel-upload-2">Image:</label>
                    <div class="image-preview">
                        <img id="carousel-preview-2" src="/HOMESPECTOR/img/carousel_thumb1.jpg" alt="Feature 2" style="max-width: 200px;" />
                    </div>
                    <input type="file" id="carousel-upload-2" name="carousel_image_2" accept="image/*" />
                    <label for="carousel-title-2">Title (H3):</label>
                    <input type="text" id="carousel-title-2" name="carousel_title_2" value="สุดพิเศษ! พาดูบ้านหรู" />
                    <label for="carousel-description-2">Description (P):</label>
                    <textarea id="carousel-description-2" name="carousel_description_2">รีวิวตรวจบ้านหรู 40ล้าน! CEO #บุญนําพา</textarea>
                </div>

                <!-- Slide 3 -->
                <div class="form-group slide-group" id="carousel-slide-3">
                    <h3>Slide 3 <button type="button" class="delete-btn" onclick="deleteCarouselSlide(3)">Delete</button></h3>
                    <label for="carousel-upload-3">Image:</label>
                    <div class="image-preview">
                        <img id="carousel-preview-3" src="/HOMESPECTOR/img/carousel_thumb2.jpg" alt="Feature 3" style="max-width: 200px;" />
                    </div>
                    <input type="file" id="carousel-upload-3" name="carousel_image_3" accept="image/*" />
                    <label for="carousel-title-3">Title (H3):</label>
                    <input type="text" id="carousel-title-3" name="carousel_title_3" value="ตรวจบ้านก่อนโอน by ต.ตรวจบ้าน" />
                    <label for="carousel-description-3">Description (P):</label>
                    <textarea id="carousel-description-3" name="carousel_description_3">ตรวจบ้านก่อนโอน by ต.ตรวจบ้าน...🏡⛈️</textarea>
                </div>

                <!-- Slide 4 -->
                <div class="form-group slide-group" id="carousel-slide-4">
                    <h3>Slide 4 <button type="button" class="delete-btn" onclick="deleteCarouselSlide(4)">Delete</button></h3>
                    <label for="carousel-upload-4">Image:</label>
                    <div class="image-preview">
                        <img id="carousel-preview-4" src="/HOMESPECTOR/img/thumbnail1.jpg" alt="Feature 4" style="max-width: 200px;" />
                    </div>
                    <input type="file" id="carousel-upload-4" name="carousel_image_4" accept="image/*" />
                    <label for="carousel-title-4">Title (H3):</label>
                    <input type="text" id="carousel-title-4" name="carousel_title_4" value="ประกันภัยบ้าน แฮปปี้โฮม ธนชาต" />
                    <label for="carousel-description-4">Description (P):</label>
                    <textarea id="carousel-description-4" name="carousel_description_4">ช่วงนี้หน้าฝน อย่ามองข้ามสิ่งนี้🏡⛈️</textarea>
                </div>

                <!-- Slide 5 -->
                <div class="form-group slide-group" id="carousel-slide-5">
                    <h3>Slide 5 <button type="button" class="delete-btn" onclick="deleteCarouselSlide(5)">Delete</button></h3>
                    <label for="carousel-upload-5">Image:</label>
                    <div class="image-preview">
                        <img id="carousel-preview-5" src="/HOMESPECTOR/img/thumbnail3.jpg" alt="Feature 5" style="max-width: 200px;" />
                    </div>
                    <input type="file" id="carousel-upload-5" name="carousel_image_5" accept="image/*" />
                    <label for="carousel-title-5">Title (H3):</label>
                    <input type="text" id="carousel-title-5" name="carousel_title_5" value="สนุก มันส์ ฮา กับช่างตรวจ" />
                    <label for="carousel-description-5">Description (P):</label>
                    <textarea id="carousel-description-5" name="carousel_description_5">สนุก มันส์ ฮา กับช่างตรวจ</textarea>
                </div>
                <!-- slide 6 -->
                <div class="form-group slide-group" id="carousel-slide-6">
                    <h3>Slide 6 <button type="button" class="delete-btn" onclick="deleteCarouselSlide(6)">Delete</button></h3>
                    <label for="carousel-upload-6">Image:</label>
                    <div class="image-preview">
                        <img id="carousel-preview-6" src="/HOMESPECTOR/img/thumbnail4.jpg" alt="Feature 6" style="max-width: 200px;" />
                    </div>
                    <input type="file" id="carousel-upload-6" name="carousel_image_6" accept="image/*" />
                    <label for="carousel-title-6">Title (H3):</label>
                    <input type="text" id="carousel-title-6" name="carousel_title_6" value="ต.ตรวจบ้าน x การตลาดวันละตอน" />
                    <label for="carousel-description-6">Description (P):</label>
                    <textarea id="carousel-description-6" name="carousel_description_6">พาดูบ้านหรู 89 ล้าน! แกรนด์ บางกอก บูเลอวาร์ด ยาร์ด บางนา</textarea>
                </div>

                <!-- Thumbnails Section -->
                <div id="thumbnail-section">
                    <h2>Thumbnails <button type="button" id="add-thumbnail-btn" class="add-btn">Add Thumbnail</button></h2>

                    <!-- Thumbnail 1 -->
                    <div class="form-group thumbnail-group" id="thumbnail-1">
                        <h3>Thumbnail 1 <button type="button" class="delete-btn" onclick="deleteThumbnail(1)">Delete</button></h3>
                        <label for="thumbnail-upload-1">Image:</label>
                        <div class="image-preview">
                            <img id="thumbnail-preview-1" src="/HOMESPECTOR/img/carousel_thumb3.webp" alt="Thumb 1" style="max-width: 100px;" />
                        </div>
                        <input type="file" id="thumbnail-upload-1" name="thumbnail_image_1" accept="image/*" />
                    </div>
                    <div class="form-group thumbnail-group" id="thumbnail-2">
                        <h3>Thumbnail 2 <button type="button" class="delete-btn" onclick="deleteThumbnail(2)">Delete</button></h3>
                        <label for="thumbnail-upload-2">Image:</label>
                        <div class="image-preview">
                            <img id="thumbnail-preview-2" src="/HOMESPECTOR/img/carousel_thumb1.jpg" alt="Thumb 2" style="max-width: 100px;" />
                        </div>
                        <input type="file" id="thumbnail-upload-2" name="thumbnail_image_2" accept="image/*" />
                    </div>
                    <div class="form-group thumbnail-group" id="thumbnail-3">
                        <h3>Thumbnail 3 <button type="button" class="delete-btn" onclick="deleteThumbnail(3)">Delete</button></h3>
                        <label for="thumbnail-upload-3">Image:</label>
                        <div class="image-preview">
                            <img id="thumbnail-preview-3" src="/HOMESPECTOR/img/carousel_thumb2.jpg" alt="Thumb 3" style="max-width: 100px;" />
                        </div>
                        <input type="file" id="thumbnail-upload-3" name="thumbnail_image_3" accept="image/*" />
                    </div>
                    <div class="form-group thumbnail-group" id="thumbnail-4">
                        <h3>Thumbnail 4 <button type="button" class="delete-btn" onclick="deleteThumbnail(4)">Delete</button></h3>
                        <label for="thumbnail-upload-4">Image:</label>
                        <div class="image-preview">
                            <img id="thumbnail-preview-4" src="/HOMESPECTOR/img/thumbnail1.jpg" alt="Thumb 4" style="max-width: 100px;" />
                        </div>
                        <input type="file" id="thumbnail-upload-4" name="thumbnail_image_4" accept="image/*" />
                    </div>
                    <div class="form-group thumbnail-group" id="thumbnail-5">
                        <h3>Thumbnail 5 <button type="button" class="delete-btn" onclick="deleteThumbnail(5)">Delete</button></h3>
                        <label for="thumbnail-upload-5">Image:</label>
                        <div class="image-preview">
                            <img id="thumbnail-preview-5" src="/HOMESPECTOR/img/thumbnail3.jpg" alt="Thumb 5" style="max-width: 100px;" />
                        </div>
                        <input type="file" id="thumbnail-upload-5" name="thumbnail_image_5" accept="image/*" />
                    </div>
                    <div class="form-group thumbnail-group" id="thumbnail-6">
                        <h3>Thumbnail 6 <button type="button" class="delete-btn" onclick="deleteThumbnail(6)">Delete</button></h3>
                        <label for="thumbnail-upload-6">Image:</label>
                        <div class="image-preview">
                            <img id="thumbnail-preview-6" src="/HOMESPECTOR/img/thumbnail4.jpg" alt="Thumb 6" style="max-width: 100px;" />
                        </div>
                        <input type="file" id="thumbnail-upload-6" name="thumbnail_image_6" accept="image/*" />
                    </div>

            </div>

            <div class="button-container">
                <button type="submit" class="save-btn">Save</button>
                <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
            </div>
        </form>
    </div>

    


    <script>
        let carouselCount = 6; // Start with 1 carousel slide
        let thumbnailCount = 6; // Start with 1 thumbnail

        // Function to add a new carousel slide
        function addCarouselSlide() {
            carouselCount++;
            const carouselSection = document.getElementById('carousel-section');

            const newSlideHTML = `
                <div class="form-group slide-group" id="carousel-slide-${carouselCount}">
                    <h3>Slide ${carouselCount} <button type="button" class="delete-btn" onclick="deleteCarouselSlide(${carouselCount})">Delete</button></h3>
                    <label for="carousel-upload-${carouselCount}">Image:</label>
                    <div class="image-preview">
                        <img id="carousel-preview-${carouselCount}" src="" alt="Carousel Image ${carouselCount}" style="max-width: 200px;" />
                    </div>
                    <input type="file" id="carousel-upload-${carouselCount}" name="carousel_image_${carouselCount}" accept="image/*" />
                    <label for="carousel-title-${carouselCount}">Title (H3):</label>
                    <input type="text" id="carousel-title-${carouselCount}" name="carousel_title_${carouselCount}" placeholder="Enter Title ${carouselCount}" />
                    <label for="carousel-description-${carouselCount}">Description (P):</label>
                    <textarea id="carousel-description-${carouselCount}" name="carousel_description_${carouselCount}" placeholder="Enter Description for Slide ${carouselCount}"></textarea>
                </div>
            `;

            carouselSection.insertAdjacentHTML('beforeend', newSlideHTML);
        }

        // Function to add a new thumbnail
        function addThumbnail() {
            thumbnailCount++;
            const thumbnailSection = document.getElementById('thumbnail-section');

            const newThumbnailHTML = `
                <div class="form-group thumbnail-group" id="thumbnail-${thumbnailCount}">
                    <h3>Thumbnail ${thumbnailCount} <button type="button" class="delete-btn" onclick="deleteThumbnail(${thumbnailCount})">Delete</button></h3>
                    <label for="thumbnail-upload-${thumbnailCount}">Image:</label>
                    <div class="image-preview">
                        <img id="thumbnail-preview-${thumbnailCount}" src="" alt="Thumbnail ${thumbnailCount}" style="max-width: 100px;" />
                    </div>
                    <input type="file" id="thumbnail-upload-${thumbnailCount}" name="thumbnail_image_${thumbnailCount}" accept="image/*" />
                </div>
            `;

            thumbnailSection.insertAdjacentHTML('beforeend', newThumbnailHTML);
        }

        // Function to delete a carousel slide
        function deleteCarouselSlide(id) {
            const slide = document.getElementById(`carousel-slide-${id}`);
            if (slide) slide.remove();
        }

        // Function to delete a thumbnail
        function deleteThumbnail(id) {
            const thumbnail = document.getElementById(`thumbnail-${id}`);
            if (thumbnail) thumbnail.remove();
        }

        // Event Listeners for Add Buttons
        document.getElementById('add-carousel-btn').addEventListener('click', addCarouselSlide);
        document.getElementById('add-thumbnail-btn').addEventListener('click', addThumbnail);

        // Handle form submission
        document.getElementById('edit-carousel-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('save-carousel-images.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.text())
                .then((data) => {
                    alert('Carousel slides and thumbnails updated successfully!');
                    console.log(data); // Log response for debugging
                })
                .catch((error) => {
                    console.error('Error updating carousel and thumbnails:', error);
                    alert('Failed to update carousel and thumbnails.');
                });
        });
    </script>

    <div class="form2-container">
        <h1>Edit Reviews Section</h1>
        <form id="edit-reviews-form" enctype="multipart/form-data">
            <!-- Title and Subtitle -->
            <div class="form-group">
                <h2>Title and Subtitle</h2>
                <label for="section-title">Section Title:</label>
                <input type="text" id="section-title" name="section_title" value="Read What Others Have To Say.">
                <label for="section-subtitle">Section Subtitle:</label>
                <textarea id="section-subtitle" name="section_subtitle">In the 7+ years we have been doing business, our customers have left us lots of great feedback.</textarea>
            </div>

            <!-- Reviews Carousel -->
            <div class="form-group">
                <h2>Reviews Carousel</h2>
                <div id="carousel-images">
                    <!-- Review 1 -->
                    <div class="carousel-item-group" id="carousel-item-1">
                        <label for="review-image-1">Review Image 1:</label>
                        <img id="review-preview-1" src="/HOMESPECTOR/icon/ICON/review1.png" alt="Review 1" style="max-width: 200px;">
                        <input type="file" id="review-image-1" name="review_image_1" accept="image/*">
                        <button type="button" class="delete-btn" onclick="deleteReviewImage(1)">Delete</button>
                    </div>
                    <!-- Add more reviews dynamically -->
                </div>
                <button type="button" id="add-review-btn" class="add-btn">Add Review</button>
            </div>

            <!-- Facebook Review -->
            <div class="form-group">
                <h2>Facebook Review</h2>
                <label for="facebook-rating">Facebook Rating:</label>
                <input type="number" step="0.1" id="facebook-rating" name="facebook_rating" value="4.9">
                <label for="facebook-reviews">Number of Reviews:</label>
                <input type="number" id="facebook-reviews" name="facebook_reviews" value="75">
            </div>

            <!-- Stats Section -->
            <div class="form-group">
                <h2>Stats</h2>
                <label for="developer-count">Developer Count:</label>
                <input type="number" id="developer-count" name="developer_count" value="0">
                <label for="project-count">Project Count:</label>
                <input type="number" id="project-count" name="project_count" value="0">
                <label for="house-count">House Count:</label>
                <input type="number" id="house-count" name="house_count" value="0">
            </div>

            <!-- Submit -->
            <div class="button-container">
                <button type="submit" class="save-btn">Save</button>
                <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
            </div>
        </form>
    </div>

    <script>
        let reviewCount = 1; // Initial number of reviews

        // Add a new review dynamically
        function addReview() {
            reviewCount++;
            const carouselContainer = document.getElementById('carousel-images');

            const newReviewHTML = `
                <div class="carousel-item-group" id="carousel-item-${reviewCount}">
                    <label for="review-image-${reviewCount}">Review Image ${reviewCount}:</label>
                    <img id="review-preview-${reviewCount}" src="" alt="Review ${reviewCount}" style="max-width: 200px;">
                    <input type="file" id="review-image-${reviewCount}" name="review_image_${reviewCount}" accept="image/*" onchange="previewImage(${reviewCount})">
                    <button type="button" class="delete-btn" onclick="deleteReviewImage(${reviewCount})">Delete</button>
                </div>
            `;

            carouselContainer.insertAdjacentHTML('beforeend', newReviewHTML);
        }

        // Delete a review image
        function deleteReviewImage(id) {
            const reviewItem = document.getElementById(`carousel-item-${id}`);
            if (reviewItem) reviewItem.remove();
        }

        // Preview an uploaded image
        function previewImage(id) {
            const fileInput = document.getElementById(`review-image-${id}`);
            const imagePreview = document.getElementById(`review-preview-${id}`);

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        // Handle form submission
        document.getElementById('edit-reviews-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('save-reviews.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    alert(data.message);
                })
                .catch((error) => {
                    console.error('Error saving reviews:', error);
                    alert('Failed to save reviews.');
                });
        });

        // Add event listener to the Add Review button
        document.getElementById('add-review-btn').addEventListener('click', addReview);
    </script>

    <div class="form-container8">
        <h1>Manage "New Application" Section</h1>

        <form id="newapp-form" enctype="multipart/form-data">
            <!-- Header Section -->
            <div class="form-group">
                <h2>Edit Header</h2>
                <label for="header-title">Main Title (H1):</label>
                <input type="text" id="header-title" name="header_title" value="New">
                
                <label for="header-subtitle">Subtitle (H2):</label>
                <input type="text" id="header-subtitle" name="header_subtitle" value="Application ตรวจบ้านด้วยตัวเอง">
                
                <label for="header-description">Description (P):</label>
                <textarea id="header-description" name="header_description">ตรวจบ้านด้วยตัวเอง พร้อมออกรายงานในตัว ตรวจไม่เป็นก็มีคลิปสอนให้ภายในแอป</textarea>
            </div>

            <!-- Images Section -->
            <div class="form-group">
                <h2>Edit Images</h2>
                <div id="image-previews">
                    <!-- Default Images -->
                    <div class="image-slot" id="image-slot-1">
                        <label for="image-upload-1">Image 1:</label>
                        <img src="/HOMESPECTOR/img/app1.png" alt="App Preview 1" style="max-width: 200px;" id="preview-1">
                        <input type="file" id="image-upload-1" name="image_1" accept="image/*">
                        <button type="button" class="delete-btn" onclick="deleteImage(1)">Delete</button>
                    </div>
                    <div class="image-slot" id="image-slot-2">
                        <label for="image-upload-2">Image 2:</label>
                        <img src="/HOMESPECTOR/img/app2.png" alt="App Preview 2" style="max-width: 200px;" id="preview-2">
                        <input type="file" id="image-upload-2" name="image_2" accept="image/*">
                        <button type="button" class="delete-btn" onclick="deleteImage(2)">Delete</button>
                    </div>
                </div>
            </div>

            <!-- Call-to-Action -->
            <div class="form-group">
                <h2>Edit Call-to-Action</h2>
                <label for="cta-text">Button Text:</label>
                <input type="text" id="cta-text" name="cta_text" value="ใช้งานฟรี!">
            </div>

            <!-- Submit Button -->
            <div class="button-container">
                <button type="submit" class="save-btn">Save Changes</button>
                <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
            </div>
        </form>
    </div>

    <script>
        // Function to delete an image slot
        function deleteImage(id) {
            const imageSlot = document.getElementById(`image-slot-${id}`);
            if (imageSlot) {
                imageSlot.remove();
            }
        }

        // Handle form submission
        document.getElementById('newapp-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('save-newapp.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    alert(data.message);
                })
                .catch((error) => {
                    console.error('Error saving new application section:', error);
                    alert('Failed to save the new application section.');
                });
        });

        // Preview uploaded images
        document.querySelectorAll('input[type="file"]').forEach((input) => {
            input.addEventListener('change', function (e) {
                const id = this.id.split('-')[2]; // Extract the slot number
                const preview = document.getElementById(`preview-${id}`);

                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    };

                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>

    <div class="form-container9">
        <h1>Manage FAQ Section</h1>

        <form id="faq-form" method="POST" action="save-faq.php">
            <!-- Plumbing FAQs -->
            <div class="form-group">
                <h2>Plumbing FAQs</h2>
                <div id="plumbing-faq-items">
                    <!-- Default Plumbing Questions -->
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[plumbing][0][question]" value="What is a home inspection?" />
                        <label>Answer:</label>
                        <textarea name="faqs[plumbing][0][answer]">A home inspection is a non-invasive examination of a property's condition, focusing on the structure, electrical, plumbing, and other essential systems.</textarea>
                    </div>
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[plumbing][1][question]" value="Why should I get a home inspection?" />
                        <label>Answer:</label>
                        <textarea name="faqs[plumbing][1][answer]">Home inspections identify potential issues, ensuring you make an informed decision before buying or selling a property.</textarea>
                    </div>
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[plumbing][2][question]" value="Why should I get a home inspection?" />
                        <label>Answer:</label>
                        <textarea name="faqs[plumbing][2][answer]">Home inspections identify potential issues, ensuring you make an informed decision before buying or selling a property.</textarea>
                    </div>
                </div>
                <button type="button" class="add-btn" onclick="addFAQ('plumbing')">Add Plumbing FAQ</button>
            </div>

            <!-- Roof FAQs -->
            <div class="form-group">
                <h2>Roof FAQs</h2>
                <div id="roof-faq-items">
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[roof][0][question]" value="What types of roofs do you inspect?" />
                        <label>Answer:</label>
                        <textarea name="faqs[roof][0][answer]">We inspect all types of roofs, including shingles, metal, tile, flat, and slate roofs, to ensure their integrity and condition.</textarea>
                    </div>
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[roof][1][question]" value="How do you check for roof damage?" />
                        <label>Answer:</label>
                        <textarea name="faqs[roof][1][answer]">We look for signs of wear, leaks, cracks, missing shingles, or structural damage using a combination of visual inspection and specialized tools.</textarea>
                    </div>
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[roof][2][question]" value="Can you inspect roofs during bad weather?" />
                        <label>Answer:</label>
                        <textarea name="faqs[roof][2][answer]">While we can perform limited inspections in light weather, we recommend rescheduling for a thorough assessment in optimal conditions.</textarea>
                    </div>
                </div>
                <button type="button" class="add-btn" onclick="addFAQ('roof')">Add Roof FAQ</button>
            </div>

            <!-- Pricing FAQs -->
            <div class="form-group">
                <h2>Pricing FAQs</h2>
                <div id="pricing-faq-items">
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[pricing][0][question]" value="How much does a home inspection cost?" />
                        <label>Answer:</label>
                        <textarea name="faqs[pricing][0][answer]">Our pricing varies based on the property size and location. Typically, inspections start at $300.</textarea>
                    </div>
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[pricing][1][question]" value=" Are there any additional fees?" />
                        <label>Answer:</label>
                        <textarea name="faqs[pricing][1][answer]">Additional fees may apply for specialized inspections like radon testing,mold inspection, or sewer line evaluations.</textarea>
                    </div>
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[pricing][2][question]" value=" Are there any additional fees?" />
                        <label>Answer:</label>
                        <textarea name="faqs[pricing][2][answer]">Additional fees may apply for specialized inspections like radon testing,mold inspection, or sewer line evaluations.</textarea>
                    </div>
                </div>
                <button type="button" class="add-btn" onclick="addFAQ('pricing')">Add Pricing FAQ</button>
            </div>

            <!-- Process FAQs -->
            <div class="form-group">
                <h2>Process FAQs</h2>
                <div id="process-faq-items">
                    <div class="faq-item">
                        <label>Question:</label>
                        <input type="text" name="faqs[process][0][question]" value="How long does a home inspection take?" />
                        <label>Answer:</label>
                        <textarea name="faqs[process][0][answer]">On average, a home inspection takes 2-3 hours, depending on the property's size and condition.</textarea>
                    </div>
                </div>
                <button type="button" class="add-btn" onclick="addFAQ('process')">Add Process FAQ</button>
            </div>

            <div class="button-container">
                <button type="submit" class="save-btn">Save Changes</button>
                <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
            </div>
        </form>
    </div>

    <script>
        function addFAQ(category) {
            const container = document.getElementById(`${category}-faq-items`);
            const newIndex = container.children.length; // Find the new index for the FAQ

            const newFAQHTML = `
                <div class="faq-item">
                    <label>Question:</label>
                    <input type="text" name="faqs[${category}][${newIndex}][question]" placeholder="Enter question">
                    <label>Answer:</label>
                    <textarea name="faqs[${category}][${newIndex}][answer]" placeholder="Enter answer"></textarea>
                    <button type="button" class="delete-btn" onclick="this.parentElement.remove()">Delete</button>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', newFAQHTML);
        }
    </script>
</body>
</html>