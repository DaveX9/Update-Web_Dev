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
            max-width: 600px;
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
            <!-- Existing Carousel Images -->
            <div class="form-group">
                <h3>Current Carousel Images</h3>
                <div class="carousel-preview" id="carousel-preview">
                    <!-- Preview existing images dynamically -->
                </div>
            </div>

            <!-- Increase Carousel Slots -->
            <div class="form-group">
                <label for="carousel-count">Number of Carousel Images:</label>
                <input type="number" id="carousel-count" min="1" value="5" />
                <button type="button" id="update-slots-btn">Update Slots</button>
            </div>

            <!-- Upload New Images -->
            <div class="form-group" id="new-images-container">
                <label>Upload New Images:</label>
            </div>

            <button type="submit">Save Changes</button>
        </form>
    </div>

    <script>
        // Fetch existing carousel images and display them
        function loadCarouselImages() {
            $.get('load-carousel.php', function (data) {
                const images = JSON.parse(data);
                const previewContainer = $('#carousel-preview');
                previewContainer.empty();

                images.forEach((image, index) => {
                    previewContainer.append(`
                        <div>
                            <img src="${image}" alt="Carousel Image ${index + 1}">
                            <button type="button" class="delete-btn" data-index="${index}">x</button>
                        </div>
                    `);
                });

                // Sync the number of images with the input count
                $('#carousel-count').val(images.length);
                updateImageSlots(images.length);
            });
        }

        // Function to update image slots dynamically
        function updateImageSlots(count) {
            const newImagesContainer = $('#new-images-container');
            newImagesContainer.empty();

            for (let i = 1; i <= count; i++) {
                newImagesContainer.append(`
                    <div class="form-group">
                        <label for="new-image-${i}">Image ${i}:</label>
                        <input type="file" id="new-image-${i}" name="images[]" accept="image/*">
                    </div>
                `);
            }
        }

        // Initialize carousel images on page load
        $(document).ready(function () {
            loadCarouselImages();

            // Handle image deletion
            $(document).on('click', '.delete-btn', function () {
                const index = $(this).data('index');
                $.post('delete-carousel.php', { index: index }, function () {
                    alert('Image deleted successfully!');
                    loadCarouselImages();
                });
            });

            // Handle updating slots
            $('#update-slots-btn').on('click', function () {
                const newCount = parseInt($('#carousel-count').val());
                if (newCount > 0) {
                    updateImageSlots(newCount);
                } else {
                    alert('Please enter a valid number greater than 0.');
                }
            });

            // Handle new image uploads
            $('#carousel-form').on('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);
                $.ajax({
                    url: 'save-carousel.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function () {
                        alert('Carousel updated successfully!');
                        loadCarouselImages();
                    },
                    error: function () {
                        alert('Error updating carousel.');
                    }
                });
            });
        });
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
    </script>
</body>
</html>