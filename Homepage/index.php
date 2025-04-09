<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="/HOMESPECTOR/img/favicon1.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap">
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/index.css">
    <title>Header Design</title>
</head>

<body>
    <div class="content-box">
        <div class="content-box">
            <div class="header">
                <header class="top-bar">
                    <div class="container">
                        <!-- Social Icons -->
                        <div class="social-icons">
                            <a href="https://www.facebook.com/t.homeinspector/?locale=th_TH">
                                <img src="/HOMESPECTOR/icon/ICON/Fb.png" alt="Facebook">
                            </a>
                            <a href="https://www.instagram.com/t.homeinspector/">
                                <img src="/HOMESPECTOR/icon/ICON/IG.png" alt="Instagram">
                            </a>
                            <a href="https://page.line.me/t.home?openQrModal=true">
                                <img src="/HOMESPECTOR/icon/ICON/line.png" alt="Line">
                            </a>
                            <a href="tel:082-045-6165">
                                <img src="/HOMESPECTOR/icon/ICON/phone.png" alt="Phone">
                            </a>
                        </div>
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/HOMESPECTOR/Homepage/index.html">
                                <img src="/HOMESPECTOR/img/s1.png" alt="T. Home Inspector Logo">
                            </a>
                        </div>

                        <div class="actions">
                            <!-- Language Switcher -->
                            <div class="language-switcher">
                                <a href="?lang=th" class="lang-link">
                                    <img src="/HOMESPECTOR/icon/ICON/thai.png" alt="Thai" title="ภาษาไทย">
                                </a>
                                <a href="?lang=en" class="lang-link">
                                    <img src="/HOMESPECTOR/icon/ICON/eng.png" alt="English" title="English">
                                </a>
                            </div>

                            <!-- Search Icon -->
                            <i id="search-icon" class="fas fa-search"></i>
                            <div id="search-bar" class="search-bar">
                                <input type="text" placeholder="Search..." />
                                <button onclick="searchFunction()">Search</button>
                            </div>
                            <!-- Hamburger Icon -->
                            <i id="hamburger-icon" class="fas fa-bars hamburger-icon" onclick="toggleMenu()"></i>
                        </div>
                </header>
                <nav class="nav-links" id="nav-links">
                    <ul>
                        <li><a href="/HOMESPECTOR/Homepage/index.html" data-translate="nav.home">หน้าหลัก</a>
                        </li>
                        <li><a href="/HOMESPECTOR/Homepage/service.php" data-translate="nav.services">บริการ</a></li>
                        <li><a href="/HOMESPECTOR/Homepage/promotion.php" data-translate="nav.promotion">สิทธิพิเศษ</a>
                        </li>
                        <li><a href="/HOMESPECTOR/Homepage/projects_media.html" data-translate="nav.projects">ผลงาน</a>
                        </li>

                        <!-- Dropdown Menu -->
                        <li class="dropdown">
                            <a href="#" class="menu-item" data-translate="nav.aboutUs">
                                เกี่ยวกับเรา <span class="dropdown-icon"><i class="fa-solid fa-caret-down"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/HOMESPECTOR/Homepage/ourstory.php"
                                        data-translate="nav.ourStory">ประวัติของเรา</a>
                                </li>
                                <li><a href="/HOMESPECTOR/Homepage/ourteam.php"
                                        data-translate="nav.ourTeam">ทีมงานของเรา</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-item" data-translate="nav.service">
                                บริการเสริม <span class="dropdown-icon"><i class="fa-solid fa-caret-down"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/HOMESPECTOR/Homepage/app-inspector.php"
                                        data-translate="nav.app-inspector">ตรวจบ้านเอง</a>
                                </li>
                                <li><a href="cal-electric.html" data-translate="nav.cal-electric">คำนวณไฟฟ้า</a>
                                </li>
                                <li><a href="checklist.html" data-translate="nav.checklist">เทียบสเปกบ้าน</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/HOMESPECTOR/Homepage/articles.html" data-translate="nav.articles">บทความ</a></li>
                        <li><a href="/HOMESPECTOR/Homepage/Review-home.html"
                                data-translate="nav.reviewHome">รีวิวบ้าน</a></li>
                        <li><a href="/HOMESPECTOR/Homepage/review_interior.php"
                                data-translate="nav.reviewInterior">บริการตกแต่งภายใน</a></li>
                        <li><a href="/HOMESPECTOR/Homepage/joinwithus.php" data-translate="nav.joinUs">รวมงานกับเรา</a>
                        </li>
                        <li><a href="/HOMESPECTOR/Homepage/Contactus.php" data-translate="nav.contact">ติดต่อเรา</a>
                        </li>
                    </ul>
                </nav>
                <!-- Fullscreen Navigation -->
                <div id="fullscreen-menu" class="fullscreen-menu">
                    <!-- Close Icon -->
                    <i id="close-icon" class="fas fa-times"></i>
                    <header class="top-bar">
                        <div class="container">
                            <!-- Social Icons -->
                            <div class="social-icons">
                                <a href="https://www.facebook.com/t.homeinspector/?locale=th_TH">
                                    <img src="/HOMESPECTOR/icon/ICON/Fb.png" alt="Facebook">
                                </a>
                                <a href="https://www.instagram.com/t.homeinspector/">
                                    <img src="/HOMESPECTOR/icon/ICON/IG.png" alt="Instagram">
                                </a>
                                <a href="https://page.line.me/t.home?openQrModal=true">
                                    <img src="/HOMESPECTOR/icon/ICON/line.png" alt="Line">
                                </a>
                                <a href="tel:082-045-6165">
                                    <img src="/HOMESPECTOR/icon/ICON/phone.png" alt="Phone">
                                </a>
                            </div>

                            <!-- Logo -->
                            <div class="logo">
                                <a href="/HOMESPECTOR/Homepage/index.html">
                                    <img src="/HOMESPECTOR/img/s1.png" alt="T. Home Inspector Logo">
                                </a>
                            </div>

                            <!-- Actions -->
                            <div class="actions">
                                <!-- Language Switcher -->
                                <div class="language-switcher">
                                    <a href="?lang=th" class="lang-link">
                                        <img src="/HOMESPECTOR/icon/ICON/thai.png" alt="Thai" title="ภาษาไทย">
                                    </a>
                                    <a href="?lang=en" class="lang-link">
                                        <img src="/HOMESPECTOR/icon/ICON/eng.png" alt="English" title="English">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Navigation Content -->
                    <div class="menu-content">
                        <!-- Topics Section -->
                        <div class="menu-section">
                            <h3>Navigation</h3>
                            <ul>
                                <li><a href="/HOMESPECTOR/Homepage/index.html" data-translate="nav.home">หน้าหลัก</a>
                                </li>
                                <li><a href="/HOMESPECTOR/Homepage/service.php" data-translate="nav.services">บริการ</a>
                                </li>
                                <li><a href="/HOMESPECTOR/Homepage/promotion.php"
                                        data-translate="nav.promotion">สิทธิพิเศษ</a></li>
                                <li><a href="/HOMESPECTOR/Homepage/projects_media.html"
                                        data-translate="nav.projects">ผลงาน</a></li>

                                <!-- Dropdown Menu -->
                                <li class="dropdown1">
                                    <a href="#" class="menu-item1" data-translate="nav.aboutUs">
                                        เกี่ยวกับเรา <span class="dropdown-icon1"><i
                                                class="fa-solid fa-caret-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu1">
                                        <li><a href="/HOMESPECTOR/Homepage/ourstory.php"
                                                data-translate="nav.ourStory">ประวัติของเรา</a>
                                        </li>
                                        <li><a href="/HOMESPECTOR/Homepage/ourteam.php"
                                                data-translate="nav.ourTeam">ทีมงานของเรา</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="menu-item" data-translate="nav.service">
                                        บริการเสริม <span class="dropdown-icon"><i
                                                class="fa-solid fa-caret-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/HOMESPECTOR/Homepage/app-inspector.php"
                                                data-translate="nav.app-inspector">ตรวจบ้านเอง</a>
                                        </li>
                                        <li><a href="cal-electric.html" data-translate="nav.cal-electric">คำนวณไฟฟ้า</a>
                                        </li>
                                        <li><a href="checklist.html" data-translate="nav.checklist">เทียบสเปกบ้าน</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="/HOMESPECTOR/Homepage/articles.html"
                                        data-translate="nav.articles">บทความ</a></li>
                                <li><a href="/HOMESPECTOR/Homepage/Review-home.html"
                                        data-translate="nav.reviewHome">รีวิวบ้าน</a></li>
                                <li><a href="/HOMESPECTOR/Homepage/review_interior.php"
                                        data-translate="nav.reviewInterior">บริการตกแต่งภายใน</a></li>
                                <li><a href="/HOMESPECTOR/Homepage/joinwithus.php"
                                        data-translate="nav.joinUs">รวมงานกับเรา</a></li>
                                <li><a href="/HOMESPECTOR/Homepage/Contactus.php"
                                        data-translate="nav.contact">ติดต่อเรา</a></li>
                            </ul>
                        </div>

                        <!-- Series & Podcast Section -->
                        <div class="menu-section">
                            <h3>Content/Articles</h3>
                            <ul>
                                <li><a href="#">รายการทั้งหมด</a></li>
                                <li><a href="#">มนุษย์ต่างวัย Talk</a></li>
                                <li><a href="#">บพุทธ์ที่โครฟ</a></li>
                                <li><a href="#">Life Long Investing</a></li>
                                <li><a href="#">มนุษย์ต่างวัย Podcast</a></li>
                                <li><a href="#">ชีวิตชีวา 2</a></li>
                                <li><a href="#">The O Idol</a></li>
                                <li><a href="#">มนุษย์ต่างวัย Talk</a></li>
                            </ul>
                        </div>

                        <!-- Other Sections -->
                        <div class="menu-section">
                            <h3><a href="/HOMESPECTOR/Homepage/Contactus.php" class="menu-link">Contact</a></h3>
                            <h3><a href="/HOMESPECTOR/Homepage/projects_media.html" class="menu-link">Projects</a></h3>
                            <h3><a href="/HOMESPECTOR/Homepage/joinwithus.php" class="menu-link">joinwithus</a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hero Section -->
            <section class="hero">
                <div class="hero-bg" id="hero-bg"></div>
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1 id="hero-title">Loading...</h1>
                    <p id="hero-subtitle"></p>
                </div>
            </section>

            <script>
                let texts = [];
                let bgImages = [];
                let textIndex = 0;
                let bgIndex = 0;

                // โหลดข้อมูลจาก backend
                fetch('/HOMESPECTOR/backend/panel/get_hero_data.php')
                    .then(res => res.json())
                    .then(data => {
                        texts = data.texts;
                        bgImages = data.backgrounds;

                        if (texts.length > 0 && bgImages.length > 0) {
                            startHeroRotation();
                        } else {
                            console.warn("ไม่พบข้อมูล Hero หรือ Background");
                        }
                    })
                    .catch(err => console.error("โหลดข้อมูลผิดพลาด", err));

                // เริ่มเปลี่ยนข้อความ + รูป
                function startHeroRotation() {
                    updateHeroContent();

                    setInterval(() => {
                        textIndex = (textIndex + 1) % texts.length;
                        bgIndex = (bgIndex + 1) % bgImages.length;
                        updateHeroContent();
                    }, 8000); // เปลี่ยนทุก 8 วินาที
                }

                // อัปเดตเนื้อหา Hero
                function updateHeroContent() {
                    document.getElementById('hero-title').innerHTML = texts[textIndex].title;
                    document.getElementById('hero-subtitle').innerText = texts[textIndex].subtitle;
                    document.getElementById('hero-bg').style.backgroundImage = `url('${bgImages[bgIndex]}')`;
                }
            </script>

            <!-- Services Section -->
            <section class="services">
                <div class="services-header" data-aos="fade-up">
                    <h2>Our Services</h2>
                </div>
                <div class="services-grid">
                    <!-- Service 1 -->
                    <div class="service-card" data-aos="fade-up-right">
                        <div class="service-icon">
                            <a href="/HOMESPECTOR/Homepage/service1.php">
                                <img src="/HOMESPECTOR/img/s1.png" alt="T. Home Inspector">
                            </a>
                        </div>
                        <h3>T. Home Inspector</h3>
                    </div>

                    <!-- Service 2 -->
                    <div class="service-card" data-aos="fade-up">
                        <div class="service-icon">
                            <a href="/HOMESPECTOR/Homepage/hinterior.html">
                                <img src="/HOMESPECTOR/img/s2.png" alt="T. Home Interior">
                            </a>
                        </div>
                        <h3>T. Home Interior</h3>
                    </div>

                    <!-- Service 3 -->
                    <div class="service-card" data-aos="fade-up">
                        <div class="service-icon">
                            <a href="/HOMESPECTOR/Homepage/Hconstruction.php">
                                <img src="/HOMESPECTOR/img/s3.png" alt="T. Home Construction">
                            </a>
                        </div>
                        <h3>T. Home Construction</h3>
                    </div>

                    <!-- Service 4 -->
                    <div class="service-card" data-aos="fade-up-left">
                        <div class="service-icon">
                            <a href="/HOMESPECTOR/Homepage/Hbulter.php">
                                <img src="/HOMESPECTOR/img/s4-bg.png" alt="Home Butler">
                            </a>
                        </div>
                        <h3>Home Butler</h3>
                    </div>
                </div>
                <!-- Inspection Info Section -->
                <div class="wrapper" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <div class="inspection-info">
                        <div class="info-content">
                            <h2>ตรวจบ้านต้องทำอย่างไร ?</h2>
                            <h3 data-translate="inspection-details">
                                รายละเอียดที่ต้องตกลง และเตรียมก่อนตรวจบ้าน
                            </h3>
                            <a href="/HOMESPECTOR/Homepage/description.html">
                                <button data-translate="see-details">
                                    <i class="fa-solid fa-eye"></i> ดูรายละเอียด
                                </button>
                            </a>
                        </div>
                        <div class="info-image">
                            <!-- <img src="/HOMESPECTOR/img/how.png" alt="Inspection Process"> -->
                        </div>
                    </div>
                </div>
            </section>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const servicesSection = document.querySelector(".services");

                    fetch("/HOMESPECTOR/backend/panel/get_index_service.php")
                        .then(res => res.json())
                        .then(images => {
                            let index = 0;
                            function changeBackground() {
                                servicesSection.style.backgroundImage = `url('${images[index]}')`;
                                index = (index + 1) % images.length;
                            }
                            if (images.length > 0) {
                                changeBackground();
                                setInterval(changeBackground, 5000);
                            }
                        })
                        .catch(err => console.error("โหลดภาพพื้นหลังผิดพลาด:", err));
                });
            </script>


            <!-- line -->
            <div class="contact-container">
                <a id="phone-link" href="#" class="contact-item" data-aos="fade-up-left">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <span id="phone-text">โทร ...</span>
                </a>

                <a id="line-link" href="#" target="_blank" class="contact-item" data-aos="fade-up-right">
                    <div class="icon">
                        <i class="fa-brands fa-line" style="color: #00a347;"></i>
                    </div>
                    <span id="line-text">@line.id</span>
                </a>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    fetch('/HOMESPECTOR/backend/panel/get_line_section.php')
                        .then(response => response.json())
                        .then(data => {
                            // อัปเดตเบอร์โทร
                            const phoneLink = document.getElementById('phone-link');
                            const phoneText = document.getElementById('phone-text');
                            phoneLink.href = 'tel:' + data.phone_number;
                            phoneText.textContent = 'โทร ' + data.phone_number;

                            // อัปเดต Line ID
                            const lineLink = document.getElementById('line-link');
                            const lineText = document.getElementById('line-text');
                            lineLink.href = 'https://line.me/R/ti/p/' + encodeURIComponent(data.line_id);
                            lineText.textContent = data.line_id;
                        })
                        .catch(error => {
                            console.error('เกิดข้อผิดพลาดในการโหลดข้อมูลติดต่อ:', error);
                        });
                });
            </script>

            <!-- why choose us -->
            <section class="why-choose-us">
                <div id="why-choose-us-container"></div>
            </section>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    fetch('/HOMESPECTOR/backend/panel/get_why_choose_us.php')
                        .then(res => res.json())
                        .then(data => {
                            document.getElementById("why-choose-us-container").innerHTML = data.content;
                        })
                        .catch(err => console.error("โหลดเนื้อหาผิดพลาด:", err));
                });
            </script>

            <div class="cal-container" data-aos="zoom-in-down">
                <div class="cal">
                    <div class="cal-item">
                        <div>
                            <h2><i class="fas fa-calculator"></i> About the Calculator (เกี่ยวกับเครื่องคำนวณ)</h2>
                            <p><i class="fas fa-info-circle"></i> This calculator helps you estimate the cost of home
                                inspection services.
                                (เครื่องคำนวณนี้ช่วยประมาณค่าบริการตรวจสอบบ้านของคุณ)</p>
                            <p><i class="fas fa-check-circle"></i> Simply enter the required details, and the system
                                will provide an instant estimate.
                                (เพียงป้อนข้อมูลที่จำเป็น ระบบจะคำนวณราคาให้คุณทันที)</p>
                            <p><i class="fas fa-phone"></i> If you have any questions, feel free to contact us.
                                (หากมีข้อสงสัย ติดต่อเราได้ทุกเมื่อ)</p>
                        </div>
                        <div class="logo-container">
                            <img src="https://img.freepik.com/free-vector/household-HOMESPECTOR-utilities-design-concept-illustrated-consumption-accounting-energetic-water-resources-isometric-vector-illustration_98292-9053.jpg?t=st=1738919465~exp=1738923065~hmac=e56ee21aff5e511ecc26ae700c498f651b595e534afce2935ef0b8959ced7d59&w=1060"
                                alt="House Logo">
                        </div>
                    </div>

                    <!-- Right side iframe -->
                    <iframe class="cal-iframe" src="https://requestform.thomeinspector.com/calc/"></iframe>
                </div>

                <!-- CTA Section -->
                <div class="cta-section" data-aos="fade-up">
                    <h2>เริ่มต้นวางแผนระบบไฟฟ้าภายในบ้านของคุณ!</h2>
                    <a href="cal-electric.html" class="btn">เริ่มต้นคำนวณเลย</a>
                </div>
            </div>



            <section class="projects" data-aos="fade-up" data-aos-duration="3000">
                <h2 class="projects-title">ผลงาน</h2>
                <a href="/HOMESPECTOR/Homepage/projects_media.html" class="btn btn-firstall">ดูทั้งหมด</a>
                <div class="projects-grid" id="project-cards">
                    <!-- Cards will be dynamically populated here -->
                </div>
            </section>

            <!-- content -->
            <div class="carousel-container3" data-aos="fade-up" data-aos-anchor-placement="top-center">
                <div class="carousel-header3">
                    <h2 class="carousel-title3">Content</h2>
                    <a href="/HOMESPECTOR/Homepage/content.html" class="btn btn-all">ดูทั้งหมด</a>
                </div>

                <div class="carousel3">
                    <div class="carousel-slides3" id="carousel-slides"></div>

                    <div class="carousel-thumbnails" id="carousel-thumbnails">
                        <button class="prev-btn" onclick="changeSlide(-1)">&lt;</button>
                        <!-- Thumbnails will be added here -->
                        <button class="next-btn" onclick="changeSlide(1)">&gt;</button>
                    </div>
                </div>
            </div>

            <script>
                let currentSlide = 0;
                let totalSlides = 0;

                function showSlide(index) {
                    const slides = document.querySelectorAll('.carousel-slide3');
                    const thumbnails = document.querySelectorAll('.thumbnail');

                    if (index < 0) index = totalSlides - 1;
                    if (index >= totalSlides) index = 0;
                    currentSlide = index;

                    slides.forEach((slide, i) => {
                        slide.classList.toggle('active', i === index);
                    });

                    thumbnails.forEach((thumb, i) => {
                        thumb.classList.toggle('active', i === index);
                    });
                }

                function changeSlide(step) {
                    showSlide(currentSlide + step);
                }

                fetch("/HOMESPECTOR/backend/panel/fetch_content_carousel.php")
                    .then(res => res.json())
                    .then(data => {
                        const slidesContainer = document.getElementById("carousel-slides");
                        const thumbnailsContainer = document.getElementById("carousel-thumbnails");

                        data.forEach((item, index) => {
                            // Slide
                            const slide = document.createElement("div");
                            slide.className = "carousel-slide3" + (index === 0 ? " active" : "");
                            slide.innerHTML = `
                            <img src="${item.image_url}" alt="Feature ${index + 1}">
                            <div class="slide-content3">
                                <h3>${item.title}</h3>
                                <p>${item.episodes}</p>
                                <p>${item.description}</p>
                                <a href="${item.link_url}" class="btn">ดูทั้งหมด</a>
                            </div>
                            `;
                            slidesContainer.appendChild(slide);

                            // Thumbnail
                            const thumb = document.createElement("div");
                            thumb.className = "thumbnail" + (index === 0 ? " active" : "");
                            thumb.setAttribute("onclick", `showSlide(${index})`);
                            thumb.innerHTML = `<img src="${item.thumbnail_url}" alt="Thumb ${index + 1}">`;
                            thumbnailsContainer.insertBefore(thumb, thumbnailsContainer.querySelector(".next-btn"));
                        });

                        totalSlides = data.length;
                    });
            </script>





            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    fetch("/HOMESPECTOR/backend/panel/get_index_reviews.php")
                        .then(res => res.json())
                        .then(data => {
                            // Set review title and subtitle (allow HTML from Froala)
                            // document.getElementById('review-title').innerText = data.text.title;
                            document.getElementById('review-subtitle').innerHTML = data.text.subtitle;

                            // Generate stat boxes
                            const statsContainer = document.getElementById('stats-container');
                            data.stats.forEach(stat => {
                                const box = document.createElement("div");
                                box.className = "stat-box";
                                box.innerHTML = `
                            <img src="${stat.icon_url}" alt="${stat.label}">
                            <h2 id="stat-${stat.id}">0</h2>
                            <p>${stat.label}</p>
                        `;
                                statsContainer.appendChild(box);
                            });

                            // Animate numbers only when in view
                            let animated = false;
                            const animateValue = (id, end, duration) => {
                                let start = 0;
                                let increment = Math.ceil(end / (duration / 50));
                                const element = document.getElementById(id);
                                const interval = setInterval(() => {
                                    start += increment;
                                    if (start >= end) {
                                        start = end;
                                        clearInterval(interval);
                                    }
                                    element.textContent = start.toLocaleString();
                                }, 50);
                            };

                            window.addEventListener("scroll", () => {
                                const section = document.getElementById("stats-section");
                                const offset = section.offsetTop;

                                if (!animated && window.scrollY + window.innerHeight > offset) {
                                    data.stats.forEach(stat => {
                                        animateValue(`stat-${stat.id}`, stat.final_value, stat.animation_duration);
                                    });
                                    animated = true;
                                }
                            });
                        })
                        .catch(err => {
                            console.error("โหลดข้อมูลรีวิวผิดพลาด:", err);
                        });
                });
            </script>


            <section class="articles" data-aos="fade-up" data-aos-delay="100">
                <h2 class="articles-title">Latest Articles</h2>
                <a href="/HOMESPECTOR/Homepage/articles.html" class="btn btn-firstall">ดูทั้งหมด</a>
                <div class="articles-grid">
                    <!-- Dynamically populated -->
                </div>
            </section>

            <!-- newapp -->
            <div id="newapp-container" class="container-newapp" data-aos="fade-up" data-aos-duration="3000">
                <!-- Content will load here -->
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    fetch("/HOMESPECTOR/backend/panel/get_newapp_content.php")
                        .then(res => res.text())
                        .then(html => {
                            document.getElementById("newapp-container").innerHTML = html;
                        })
                        .catch(err => {
                            document.getElementById("newapp-container").innerHTML = "<p>ไม่สามารถโหลดข้อมูลได้</p>";
                            console.error("Fetch error:", err);
                        });
                });
            </script>

            <!-- Reviews Section -->
            <section class="stats-section" id="stats-section">
                <div class="content-wrapper">
                    <div class="text-content">
                        <!-- <h2 class="section-title" id="review-title">Loading...</h2> -->
                        <p class="section-subtitle" id="review-subtitle">Please wait...</p>
                    </div>

                    <div class="elfsight-app-c9e9af2e-5acf-4478-8bc7-62f17e30af1c" data-elfsight-app-lazy></div>

                    <div class="stats-container" id="stats-container"></div>
                </div>
            </section>

            <!-- faq Section -->
            <section class="faq" id="faq">
                <div class="faq-container">
                    <h1 class="faq-title">คำถามที่พบบ่อย</h1>
                    <div class="faq-content">
                        <aside class="faq-menu">
                            <ul id="faq-category-list">
                                <li class="active" data-category="all" onclick="filterFAQ('all')">ทั้งหมด</li>
                            </ul>
                        </aside>

                        <div class="faq-questions" id="faq-content">
                            <!-- คำถามจะโหลดแบบ dynamic -->
                        </div>
                    </div>


                </div>
            </section>


            <script>
                function slugify(str) {
                    return str.toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '');
                }

                function toggleAnswer(btn) {
                    const answer = btn.nextElementSibling;
                    btn.classList.toggle("active");
                    answer.style.display = answer.style.display === "block" ? "none" : "block";
                }

                function filterFAQ(category) {
                    document.querySelectorAll("#faq-category-list li").forEach(li => li.classList.remove("active"));
                    document.querySelector(`#faq-category-list li[data-category="${category}"]`)?.classList.add("active");

                    document.querySelectorAll(".faq-section").forEach(section => {
                        section.style.display = category === "all" || section.getAttribute("data-category") === category ? "block" : "none";
                    });
                }

                // Fetch FAQs
                window.addEventListener("DOMContentLoaded", () => {
                    fetch("/HOMESPECTOR/backend/panel/get_faqs.php")
                        .then(res => res.json())
                        .then(data => {
                            const categories = new Set();
                            const faqContent = document.getElementById("faq-content");
                            const categoryList = document.getElementById("faq-category-list");
                            faqContent.innerHTML = "";

                            const grouped = {};
                            data.forEach(faq => {
                                const cat = faq.category;
                                categories.add(cat);
                                if (!grouped[cat]) grouped[cat] = [];
                                grouped[cat].push(faq);
                            });

                            categories.forEach(cat => {
                                const li = document.createElement("li");
                                li.textContent = cat;
                                li.setAttribute("data-category", cat);
                                li.onclick = () => filterFAQ(cat);
                                categoryList.appendChild(li);
                            });

                            for (const cat in grouped) {
                                const section = document.createElement("div");
                                section.className = `faq-section`;
                                section.setAttribute("data-category", cat);

                                grouped[cat].forEach(faq => {
                                    const item = document.createElement("div");
                                    item.className = "faq-item";
                                    item.innerHTML = `
                                    <button class="faq-question" onclick="toggleAnswer(this)">
                                        ${faq.question} <span class="icon">+</span>
                                    </button>
                                    <div class="faq-answer" style="display:none"><p>${faq.answer}</p></div>
                                    `;
                                    section.appendChild(item);
                                });

                                faqContent.appendChild(section);
                            }

                            filterFAQ("all");
                        })
                        .catch(err => console.error("โหลด FAQ ไม่สำเร็จ:", err));
                });
            </script>


            <section class="elfsight" data-aos="fade-up">
                <h1>Facebook </h1>
                <div class="elfsight-app-497acae0-7e96-4622-8948-67f19c0a831b" data-aos="fade-up"
                    data-elfsight-app-lazy>
                </div>
            </section>

            <footer class="footer">
                <div class="footer-container">
                    <!-- Left Section: Social Media & Branding -->
                    <div class="footer-left">
                        <!-- <h2>HomeInspector</h2> -->
                        <img src="/HOMESPECTOR/img/footer_logo.png" alt="HomeInspector Logo" class="footer-logo">
                        <div class="social-icons">
                            <a href="https://www.facebook.com/t.homeinspector/" target="_blank"><img
                                    src="/HOMESPECTOR/icon/ICON/Fb.png" alt="Facebook"></a>
                            <a href="https://www.instagram.com/t.homeinspector/" target="_blank"><img
                                    src="/HOMESPECTOR/icon/ICON/IG.png" alt="Instagram"></a>
                            <a href="https://page.line.me/t.home?openQrModal=true" target="_blank"><img
                                    src="/HOMESPECTOR/icon/ICON/line.png" alt="Line"></a>
                            <a href="https://www.tiktok.com/@thomeinspector" target="_blank"><img
                                    src="/HOMESPECTOR/icon/ICON/Tiktok.png" alt="TikTok"></a>
                            <a href="https://www.youtube.com/channel/UC1BPUCVPBW4-ml7MrxQWjug" target="_blank"><img
                                    src="/HOMESPECTOR/icon/ICON/YB.png" alt="YouTube"></a>
                        </div>
                    </div>

                    <!-- Center Section: Company -->
                    <div class="footer-center">
                        <h2>เกี่ยวกับเรา <span class="toggle-icon">+</span></h2>
                        <ul>
                            <li><a href="/HOMESPECTOR/Homepage/ourstory.php">ประวัติของเรา</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/ourteam.php">ทีมงานของเรา</a></li>
                        </ul>
                    </div>

                    <!-- Right Section: Our Services -->
                    <div class="footer-right">
                        <h2>บริการของเรา <span class="toggle-icon">+</span></h2>
                        <ul>
                            <li><a href="/HOMESPECTOR/Homepage/Hinspector.html">ต.ตรวจบ้าน</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/Hinterior.html">ต.ตงแต่ง</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/Hconstruction.php">ต.เติม</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/Hbulter.php">H.Bulter</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/cal-electric.html">ตรวจสอบระบบไฟฟ้า</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/app-inspector.php">ตรวจบ้านเอง</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/checklist.html">เทียบสเปกบ้าน</a></li>
                        </ul>
                    </div>

                    <!-- Extra Section: Customer Help -->
                    <div class="footer-help">
                        <h2>ช่วยเหลือ <span class="toggle-icon">+</span></h2>
                        <ul>
                            <li><a href="/HOMESPECTOR/Homepage/index.html#faq">คำถามที่พบบ่อย (FAQ)</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/joinwithus.php">รวมงานกับเรา</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/promotion.php">โปรโมชั่น</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/Contactus.php">ติดต่อเรา</a></li>
                        </ul>
                    </div>

                    <!-- Payment Logos -->
                    <div class="footer-payment">
                        <h2>ชำระเงินด้วย</h2>
                        <div class="payment-logos">
                            <img src="/HOMESPECTOR/img/visacard.png" alt="Visa">
                            <img src="/HOMESPECTOR/img/Mastercard.webp" alt="MasterCard">
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <p>© 2024 HomeInspector. All Rights Reserved.</p>
                </div>
            </footer>


        </div>
    </div>


    <script src="/HOMESPECTOR/JS/Toggle_Navbar.js"></script>
    <script src="/HOMESPECTOR/JS/dropdown.js"></script>
    <script src="/HOMESPECTOR/JS/pull_articles.js"></script>
    <!-- <script src="/HOMESPECTOR/JS/carousel.js"></script>
    <script src="/HOMESPECTOR/JS/carousel2.js"></script>
    <script src="/HOMESPECTOR/JS/carousel4.js"></script> -->
    <!-- <script src="/HOMESPECTOR/JS/stats-section.js"></script> -->
    <script src="/HOMESPECTOR/JS/pull_project.js"></script>
    <!-- <script src="/HOMESPECTOR/JS/faq.js"></script> -->
    <script src="/HOMESPECTOR/JS/search_ham.js"></script>
    <script src="/HOMESPECTOR/JS/footer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://static.elfsight.com/platform/platform.js" async></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const heroBg = document.querySelector(".hero-bg");

            let scale = 1;
            let growing = true;

            function animateBackground() {
                if (growing) {
                    scale += 0.005; // Slowly zoom in
                    if (scale >= 1.1) growing = false;
                } else {
                    scale -= 0.005; // Slowly zoom out
                    if (scale <= 1) growing = true;
                }
                heroBg.style.transform = `scale(${scale})`;
                requestAnimationFrame(animateBackground);
            }

            animateBackground();
        });

    </script>


</body>

</html>