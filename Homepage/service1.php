<?php
include __DIR__ . '/../backend/panel/db.php';

// Fetch content from the database
$result = $conn->query("SELECT * FROM thome");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['section']] = $row;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/service1.css">
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

            <!-- <section class="hero-section" data-lang="hero">
                <div class="hero-overlay">
                    <h1 data-lang="hero-title">ตรวจความเรียบร้อยของบ้านก่อนโอนกรรมสิทธิ์</h1>
                </div>
            </section>
            <section class="services-section">
                <div class="service-overlay"></div>
                <div class="service-content">
                    <div class="service-text" data-aos="fade-right">
                        <h2 class="service-heading">บริการตรวจบ้านของเรา</h2>
                        <p>
                            ต.ตรวจบ้านให้บริการ ตรวจบ้าน ตรวจคอนโดเพื่อช่วยลูกค้า <br>
                            ในการตรวจสอบสภาพของบ้านที่กำลังต้องการซื้อ<br>
                            เพื่อให้สามารถตัดสินใจได้ถูกต้องและมั่นใจ ก่อนที่จะดำเนินโอนกรรมสิทธิ์
                        </p>
                    </div>
                    <div class="service-video" data-aos="fade-left">
                        <iframe width="460" height="215"
                            src="https://www.youtube.com/embed/oAPAWQvzN6Y?si=6fRBM9caU3FAmB_K"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                        <p class="video-caption"><strong>ตรวจบ้านก่อนโอน ตรวจอะไรบ้าง</strong></p>
                    </div>
                </div>
            </section>

            
            <section class="pricing-section">
                <h2 class="pricing-heading" data-aos="fade-up">ค่าบริการตรวจสอบของเรา</h2>
                <div class="pricing-container">
                    <div class="pricing-card" data-aos="fade-right">
                        <img src="/HOMESPECTOR/img/servicecharge1.png" alt="Pricing Chart">
                    </div>
                    <div class="card-container" data-aos="fade-left">
                        <div class=" guarantee-card">
                            <div class="card-front">
                                <i class="fa-solid fa-clock"></i>
                                <h3>ตรวจบ้านก่อนหมดประกัน 1 ปี</h3>
                                <p>ตรวจสอบและเช็กรายละเอียดของบ้านก่อนรับโอนกรรมสิทธิ์</p>
                            </div>
                            <div class="card-back">
                                <h3>ห้ามพลาด</h3>
                                <p>
                                    ผู้รับเหมาก่อสร้างเสนอการรับประกัน 1 ปีสำหรับระบบและส่วนประกอบหลัก
                                    การตรวจสอบระบบเหล่านี้ก่อนหมดอายุการรับประกันสามารถช่วยประหยัดค่าใช้จ่ายในการซ่อมแซมในอนาคตได้
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="reports-section" data-lang="reports">
                <h2 class="reports-heading" data-lang="reports-heading" data-aos="fade-up">Our Reports</h2>
                <div class="reports-container">
                    <div class="report-card" data-lang="report-pdf" data-aos="fade-right">
                        <div class="report-thumbnail">
                            <img src="/HOMESPECTOR/img/pdf.png" alt="PDF Report" data-lang="pdf-image">
                        </div>
                        <div class="report-button">
                            <a href="https://www.songtham.ac.th/managefiles/file/alisa/pdffile.pdf" class="btn"
                                data-lang="pdf-button">ดูตัวอย่างรายงาน (PDF)</a>
                        </div>
                    </div>
                    <div class="report-card" data-lang="report-online" data-aos="fade-left">
                        <div class="report-thumbnail">
                            <img src="/HOMESPECTOR/img/gg.jpg" alt="Online Report" data-lang="online-image">
                        </div>
                        <div class="report-button">
                            <a href="#" class="btn" data-lang="online-button">ดูตัวอย่างรายงานออนไลน์</a>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- Services Section -->
            <section id="services-section">
                <?= $data['services']['content'] ?? '<p>No content available.</p>' ?>
            </section>

            <!-- Pricing Section -->
            <section id="pricing-section">
                <?= $data['pricing']['content'] ?? '<p>No content available.</p>' ?>
            </section>

            <!-- Reports Section -->
            <section id="reports-section">
                <?= $data['reports']['content'] ?? '<p>No content available.</p>' ?>
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