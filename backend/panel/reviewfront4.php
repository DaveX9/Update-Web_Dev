<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Frontend Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Image Container */
        .interior-container {
            width: 100%;
            text-align: center;
        }

        .interior-banner {
            width: 100vw;
            height: 700px;
            overflow: hidden;
        }

        .interior-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Banner Text - Now Below the Image */
        .banner-text {
            width: 100%;
            max-width: 800px;
            margin: 20px auto; /* Center the text block */
            padding: 20px;
            text-align: center;
            background: #fff; /* White background for clarity */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .review-title {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        .photo-description {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }


        @media screen and (max-width: 768px) {
            .banner-text {
                max-width: 90%;
                padding: 15px;
            }

            .review-title {
                font-size: 22px;
            }

            .photo-description {
                font-size: 14px;
            }
        }

        /* Related Images Section */
        .review-page {
            max-width: 1200px;
            margin: 20px auto;
            text-align: center;
        }

        .related-images-title {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            text-align: left;
        }

        /* Image Grid */
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr); 
            gap: 15px;
            justify-content: center;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .image-item {
            max-width: 100%;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .image-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .image-item:hover {
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media screen and (max-width: 1024px) {
            .image-gallery {
                grid-template-columns: repeat(2, 1fr); /* 3 images per row for tablets */
            }
            .related-images-title{
                text-align: center;
            }
        }

        @media screen and (max-width: 768px) {
            .image-gallery {
                grid-template-columns: repeat(1, 1fr); /* 2 images per row for smaller screens */
            }
            .related-images-title{
                text-align: center;
            }
        }

        @media screen and (max-width: 480px) {
            .image-gallery {
                grid-template-columns: repeat(1, 1fr); /* 1 image per row for mobile */
            }
            .related-images-title{
                text-align: center;
            }
        }


        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            max-width: 60%;
            max-height: 80%;
            border-radius: 8px;
            animation: zoomIn 0.3s ease-in-out;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #ff0000;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .banner-text {
                font-size: 14px;
                padding: 10px 15px;
                max-width: 90%;
            }

            .review-title {
                font-size: 22px;
            }

            .photo-description {
                font-size: 14px;
            }

            .image-gallery {
                gap: 10px;
            }

            .image-item {
                flex: 1 1 calc(50% - 10px);
            }

            .modal-content {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>

    <div class="interior-container">
        <!-- Banner Image -->
        <div class="interior-banner">
        <img id="thumbnail" alt="Project Thumbnail">
        </div>

        <!-- Text Box -->
        <div class="banner-text">
        <div class="review-title" id="project-name"></div>
        <div class="photo-description" id="project-description"></div>
        </div>
    </div>

    <!-- Related Images -->
    <div class="review-page">
        <h3 class="related-images-title">ภาพตรวจสอบอื่น ๆ</h3>
        <div class="image-gallery" id="image-list"></div>
    </div>

    <!-- Modal (คลิกภาพเพื่อดูใหญ่) -->
    <div class="modal" id="imageModal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImg">
    </div>

    <script>
        fetch('http://localhost/HomeSpector/backend/panel/admin_after_review4.php?fetch=json')
        .then(res => res.json())
        .then(data => {
            document.getElementById('project-name').innerHTML = data.review.title;
            document.getElementById('project-description').innerHTML = data.review.description;
            document.getElementById('thumbnail').src = data.review.banner_image;

            const container = document.getElementById('image-list');
            data.images.forEach(img => {
            const div = document.createElement('div');
            div.className = 'image-item';
            div.innerHTML = `<img src="${img.image_path}" alt="${img.alt_text}" onclick="openModal('${img.image_path}')">`;
            container.appendChild(div);
            });
        });


        function openModal(src) {
        document.getElementById("imageModal").classList.add("show");
        document.getElementById("modalImg").src = src;
        }

        function closeModal() {
        document.getElementById("imageModal").classList.remove("show");
        }
    </script>
</body>
</html>

