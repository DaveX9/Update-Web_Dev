<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🛋️ รีวิวตกแต่งภายใน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .review-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .review-page h1 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .review-page p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .categories {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
            gap: 10px;
        }

        .category-btn {
            background-color: #f1f1f1;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .category-btn.active {
            background-color: #003f87;
            color: #fff;
        }

        .category-btn:hover {
            background-color: #ddd;
        }

        /* hr line */
        hr {
            border: none;
            height: 2px;
            background-color: #333;
            width: 40%;
            margin: 20px auto;
        }

        /* review card */
        .review-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            text-decoration: none;
            padding: 20px;
        }

        .review-cards .card {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 320px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out;
            text-decoration: none;
            color: inherit;
        }

        .review-cards .card img {
            display: block;
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }


        .review-cards .card::before {
            content: "ดูเพิ่มเติม";
            font-size: 18px;
            color: white;
            font-weight: bold;
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .review-cards .card:hover::before {
            opacity: 1;
        }

        .review-cards .card .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }


        .review-cards .card:hover .overlay {
            opacity: 1;
            color: var(--background-color);
        }

        .review-cards .card .overlay p {
            margin: 5px 0;
            font-size: 16px;
            font-weight: bold;
        }

        .review-cards .card p {
            padding: 12px;
            font-size: 14px;
            color: #333;
            font-weight: bold;
        }


        @media (max-width: 768px) {
            .review-cards {
                flex-direction: column;
                align-items: center;
            }

            .review-cards .card {
                width: 90%;
            }
        }


        /* video carousel of review interior */

        .video-carousel {
            position: relative;
            max-width: 100%;
            overflow: hidden;
            padding: 20px;
            background-color: #222;
            margin-bottom: 50px;
        }


        .video-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .video-item {
            flex: 0 0 33.33%;
            padding: 10px;
            box-sizing: border-box;
            position: relative;
        }

        .video-item iframe {
            width: 90%;
            height: 250px;
            border-radius: 10px;
        }


        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 15px;
            font-size: 20px;
            border-radius: 5px;
            z-index: 100;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .video-item {
                flex: 0 0 100%;
            }
        }

    </style>
    </head>
    <body>

    <div class="review-page">
        <h1 id="interior-title">กำลังโหลด...</h1>
        <p id="interior-desc">กรุณารอสักครู่</p>
        <hr>

        <h1 class="mt-4">เลือกตามสไตล์การออกแบบ</h1>
        <div class="categories mb-4">
        <button class="category-btn active" data-category="all">All</button>
        <button class="category-btn" data-category="Modern">Modern</button>
        <button class="category-btn" data-category="Modern Luxury">Modern Luxury</button>
        <button class="category-btn" data-category="Modern Classic">Modern Classic</button>
        </div>

        <div class="review-cards" id="interior-images"></div>
    </div>

    <div class="video-carousel">
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <div class="video-wrapper" id="videoSlider"></div>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <script>
        let currentSlide = 0;

        function moveSlide(direction) {
        const slider = document.getElementById('videoSlider');
        const total = slider.children.length;
        currentSlide += direction;
        if (currentSlide < 0) currentSlide = 0;
        if (currentSlide > total - 3) currentSlide = total - 3;
        slider.style.transform = `translateX(-${(100 / 3) * currentSlide}%)`;
        }

        fetch("/HOMESPECTOR/backend/panel/interior_api.php")
        .then(res => res.json())
        .then(data => {
            // Title & Description
            document.getElementById("interior-title").textContent = data.review.title;
            document.getElementById("interior-desc").textContent = data.review.description;

            // Images
            const imageContainer = document.getElementById("interior-images");
            data.images.forEach(img => {
            const card = document.createElement("a");
            card.className = "card";
            card.setAttribute("data-category", img.alt_text); // ใช้ alt_text แทน category
            card.href = "#"; // หรือลิงก์ไปหน้ารายละเอียด
            card.innerHTML = `
                <img src="${img.image_path}" alt="${img.alt_text}">
                <p>${img.alt_text}</p>
            `;
            imageContainer.appendChild(card);
            });

            // Videos
            const videoSlider = document.getElementById("videoSlider");
            data.videos.forEach(video => {
            const div = document.createElement("div");
            div.className = "video-item";
            div.innerHTML = `
                <iframe src="${video.youtube_link}" frameborder="0" allowfullscreen></iframe>
            `;
            videoSlider.appendChild(div);
            });
        });

        // Optional: category filter script
        document.querySelectorAll(".category-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            document.querySelectorAll(".category-btn").forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            const category = btn.dataset.category;
            document.querySelectorAll(".review-cards .card").forEach(card => {
            card.style.display = category === "all" || card.dataset.category === category ? "inline-block" : "none";
            });
        });
        });
    </script>
</body>
</html>
