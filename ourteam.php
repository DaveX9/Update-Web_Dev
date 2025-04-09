<?php
include __DIR__ . '/../backend/panel/db.php';


function getContent($section) {
    global $conn;
    $stmt = $conn->prepare("SELECT content FROM ourteam WHERE section = ?");
    $stmt->bind_param("s", $section);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()['content'];
}
?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/ourteam.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
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
                                <li><a href="/HOMESPECTOR/Homepage/service.php"
                                        data-translate="nav.services">บริการ</a></li>
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

            <!-- <section class="about">
                <div class="about-container">
                    <h2>ต.ตรวจบ้าน</h2>
                    <p>
                        ต.ตรวจบ้านก่อตั้งขึ้นเมื่อปี 2015 โดยคุณสมเย ซอว์ราซัย และคุณเทพ เดชกีราชชัย
                        จดทะเบียนในนามบริษัท ต.วัสดี ลากคาสตรัค จำกัด
                        และได้รับอนุญาตประกอบวิชาชีพการตรวจสอบอาคารบ้านเป็นผู้ดูแลจากสภาวิศวกร
                        และเมตตา ยินดีดูแล
                    </p>
                    <p>
                        ต.ตรวจบ้านมีความมุ่งมั่นตรวจสอบความเรียบร้อยของบ้านและคอนโดก่อนรับโอนกรรมสิทธิ์
                        ตรวจสอบห้องด้วยผู้เชี่ยวชาญเฉพาะด้าน รวมถึงใช้เครื่องมือการตรวจที่ทันสมัย “ตรวจจริง
                        เห็นกับตา ไปพร้อมลูกค้า”
                    </p>
                </div>
                <section class="video-section">
                    <div class="video-container">
                        <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/47ZFlpLnICQ?si=qqGsOzRYYFCuL8FQ"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                    </div>
                </section>
            </section>

            <section class="our-founders">
                <h2 data-aos="fade-up">Our Founders</h2>
                <div class="founders-container">
                    <div class="founder" data-aos="fade-right">
                        <img src="/HOMESPECTOR/img/staff/CEO.jpg" alt="Sumes Chetthamrongchai" class="founder-photo">
                        <h3>Sumes Chetthamrongchai</h3>
                        <p>Founder & Managing Director, NACHI Certified Inspector</p>
                        <div class="certification-container">
                            <p class="certification">
                                ได้รับการรับรองผู้ตรวจสอบบ้านจากสมาคมระดับโลกอย่าง INTERNACHI
                            </p>
                            <img src="/HOMESPECTOR/img/certified3.png" alt="Certification Badge"
                                class="certification-badge">
                        </div>
                    </div>
                    <div class="founder" data-aos="fade-left">
                        <img src="/HOMESPECTOR/img/staff/Co-founder.jpg" alt="Suthep Chetthamrongchai"
                            class="founder-photo">
                        <h3>Suthep Chetthamrongchai</h3>
                        <p>Co-Founder & Civil Engineer</p>
                    </div>
                </div>
            </section> -->



            <section class="about">
                <div class="about-container">
                    <?php echo getContent('about'); ?>
                </div>
            </section>

            <section class="our-founders">
                <div class="founders-container">
                    <?php 
                        // echo getContent('founders'); 
                    ?> 
                </div>
            </section>
            <section class="our-founders">
                <h2 data-aos="fade-up">Our Founders</h2>
                <div class="founders-container">
                    <div class="founder" data-aos="fade-right">
                        <img src="/HOMESPECTOR/img/staff/CEO.jpg" alt="Sumes Chetthamrongchai" class="founder-photo">
                        <h3>Sumes Chetthamrongchai</h3>
                        <p>Founder & Managing Director, NACHI Certified Inspector</p>
                        <div class="certification-container">
                            <p class="certification">
                                ได้รับการรับรองผู้ตรวจสอบบ้านจากสมาคมระดับโลกอย่าง INTERNACHI
                            </p>
                            <img src="/HOMESPECTOR/img/certified3.png" alt="Certification Badge"
                                class="certification-badge">
                        </div>
                    </div>
                    <div class="founder" data-aos="fade-left">
                        <img src="/HOMESPECTOR/img/staff/Co-founder.jpg" alt="Suthep Chetthamrongchai"
                            class="founder-photo">
                        <h3>Suthep Chetthamrongchai</h3>
                        <p>Co-Founder & Civil Engineer</p>
                    </div>
                </div>
            </section>


            <!-- <div class="team-section-wrapper">
                <div class="team-section">
                    <h4> <strong>Meet Our Team</strong></h4>

                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            
                            <div class="swiper-slide">
                                <img src="/HOMESPECTOR/img/staff/Charnthawat_120.webp" alt="Charnthawat"
                                    class="member-image">
                                <div class="team-name">Charnthawat</div>
                                <div class="team-role">Engineering Manager</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/HOMESPECTOR/img/staff/Charnthawat_240.webp" alt="Jennie Roberts"
                                    class="member-image">
                                <div class="team-name">Charnthawat</div>
                                <div class="team-role">Senior Inspector</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/HOMESPECTOR/img/staff/Waroj_240.webp" alt="Ann Richmond"
                                    class="member-image">
                                <div class="team-name">Waroj</div>
                                <div class="team-role">Senior Inspector</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/HOMESPECTOR/img/staff/Supapat_240.webp" alt="Supapat"
                                    class="member-image">
                                <div class="team-name">Supapat</div>
                                <div class="team-role">Inspector</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/HOMESPECTOR/img/staff/Chonsawat_240.webp" alt="Chonsawat"
                                    class="member-image">
                                <div class="team-name">Chonsawat</div>
                                <div class="team-role">Phonthewa</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/HOMESPECTOR/img/staff/Phonthewa_240.webp" alt="Phonthewa"
                                    class="member-image">
                                <div class="team-name">Phonthewa</div>
                                <div class="team-role">Inspector</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/HOMESPECTOR/img/staff/Watanon_240.webp" alt="Watanon"
                                    class="member-image">
                                <div class="team-name">Watanon</div>
                                <div class="team-role">Inspector</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Jennie Roberts"
                                    class="member-image">
                                <div class="team-name">Jennie Roberts</div>
                                <div class="team-role">Creative Director</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://randomuser.me/api/portraits/women/13.jpg" alt="Ann Richmond"
                                    class="member-image">
                                <div class="team-name">Ann Richmond</div>
                                <div class="team-role">Lead Developer</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://randomuser.me/api/portraits/men/14.jpg" alt="James Oliver"
                                    class="member-image">
                                <div class="team-name">James Oliver</div>
                                <div class="team-role">Marketing Director</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://randomuser.me/api/portraits/women/15.jpg" alt="Sophia Chen"
                                    class="member-image">
                                <div class="team-name">Sophia Chen</div>
                                <div class="team-role">UX Designer</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://randomuser.me/api/portraits/men/16.jpg" alt="Michael Johnson"
                                    class="member-image">
                                <div class="team-name">Michael Johnson</div>
                                <div class="team-role">Product Manager</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://randomuser.me/api/portraits/men/16.jpg" alt="Michael Johnson"
                                    class="member-image">
                                <div class="team-name">Michael Johnson</div>
                                <div class="team-role">Product Manager</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://randomuser.me/api/portraits/men/16.jpg" alt="Michael Johnson"
                                    class="member-image">
                                <div class="team-name">Michael Johnson</div>
                                <div class="team-role">Product Manager</div>
                            </div>
                            <div class="swiper-slide">
                                <img src="https://randomuser.me/api/portraits/men/16.jpg" alt="Michael Johnson"
                                    class="member-image">
                                <div class="team-name">Michael Johnson</div>
                                <div class="team-role">Product Manager</div>
                            </div>
                        </div>

                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div> -->

            <section class="team-section-wrapper">
                <div class="team-container">
                    <?php echo getContent('team'); ?>
                </div>
            </section>

            <!-- Swiper JS -->
            <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

            <!-- Swiper Configuration -->
            <script>
                var swiper = new Swiper(".mySwiper", {
                    loop: true,
                    grabCursor: true,
                    spaceBetween: 30,
                    centeredSlides: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
                        0: { slidesPerView: 1 },
                        640: { slidesPerView: 2 },
                        768: { slidesPerView: 2 },
                        1024: { slidesPerView: 3 },
                        1200: { slidesPerView: 4 }
                    }
                });
            </script>

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
    <!-- <script src="/HOOMESPECTOR/JS/dropdown.js"></script> -->
    <script src="/HOMESPECTOR/JS/ourteam.js"></script>
    <script src="/HOMESPECTOR/JS/search_ham.js"></script>
    <script src="/HOMESPECTOR/JS/footer.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
