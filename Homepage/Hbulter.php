<?php
$conn = new mysqli("localhost", "root", "", "homespector");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch services content
$sql_services = "SELECT content FROM hbulter WHERE section = 'services'";
$result_services = $conn->query($sql_services);
$row_services = $result_services->fetch_assoc();

// Fetch carousel content
$sql_carousel = "SELECT content FROM hbulter WHERE section = 'carousel'";
$result_carousel = $conn->query($sql_carousel);
$row_carousel = $result_carousel->fetch_assoc();
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
    <link rel="icon" type="image/x-icon" href="/HOMESPECTOR/img/favicon1.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/allservice.css">
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
                            <a href="/HOMESPECTOR/Homepage/index.php">
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
                        <li><a href="/HOMESPECTOR/Homepage/index.php" data-translate="nav.home">หน้าหลัก</a>
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
                                <li><a href="cal-electric.php" data-translate="nav.cal-electric">คำนวณไฟฟ้า</a>
                                </li>
                                <li><a href="checklist.php" data-translate="nav.checklist">เทียบสเปกบ้าน</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="/HOMESPECTOR/Homepage/articles.php" data-translate="nav.articles">บทความ</a></li>
                        <li><a href="/HOMESPECTOR/Homepage/Review-home.php"
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
                                <a href="/HOMESPECTOR/Homepage/index.php">
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
                                <li><a href="/HOMESPECTOR/Homepage/index.php" data-translate="nav.home">หน้าหลัก</a>
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
                                        <li><a href="cal-electric.php" data-translate="nav.cal-electric">คำนวณไฟฟ้า</a>
                                        </li>
                                        <li><a href="checklist.php" data-translate="nav.checklist">เทียบสเปกบ้าน</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="/HOMESPECTOR/Homepage/articles.php"
                                        data-translate="nav.articles">บทความ</a></li>
                                <li><a href="/HOMESPECTOR/Homepage/Review-home.php"
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

            <!-- Our Services Section -->
            <section class="services-container">
                <h1>Our Services</h1>
                <div class="service-banner">
                    <img src="/HOMESPECTOR/img/ourservice.png" alt="Service Banner">
                </div>
                <div class="service-cards">
                    <div class="service-card">
                        <img src="/HOMESPECTOR/img/s4.png" alt="Mobile Development Icon"
                            onclick="window.location.href='/HOMESPECTOR/Homepage/Hbulter.php'">
                        <h3>Home Butler</h3>
                    </div>
                </div>
            </section>
            <!-- Our Services Section -->
            <!-- <section class="services" data-aos="fade-up" data-aos-anchor-placement="top-center">
                <div class="service-container">
                    
                    <div class="image-container">
                        <div class="image-box">
                            <div class="image-bg"></div> 
                            <img src="/HOMESPECTOR/img/homebultter-bg.JPG" alt="Home Inspection">
                        </div>
                        <div class="call-box">
                            <i class="fa-solid fa-phone"></i> 082-045-6165
                        </div>
                    </div>

                    
                    <div class="text-container">
                        <h2 class="main-title">ต. ตรวจบ้าน รับตรวจรับบ้านและคอนโดก่อนโอนกรรมสิทธิ์</h2>
                        <p class="description">
                            ทำไมต้องเลือกเรา "ตรวจจริง เห็นกับตา ไปพร้อมลูกค้า" ตรวจบ้านและคอนโดโดยใช้อุปกรณ์จริง
                            (ไม่ได้ตรวจสอบด้วยตาเปล่า) และเทคโนโลยีที่ทันสมัย
                        </p>

                        <h2 class="contact-title">Requesting Services on the Telephone</h2>
                        <p><i class="fa-solid fa-user-tie"></i> 082-045-6165, 02-301-0283</p>
                        <p><i class="fa-solid fa-user"></i> 082-669-9666</p>
                        <p><i class="fa-solid fa-user"></i> 086-500-0019</p>
                        <p><i class="fa-solid fa-location-dot"></i> 2043 Soi Kanchanaphisek 008, Bangkae, Bangkae
                            Bangkok 10160 Thailand</p>

                        
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
                    </div>
                </div>
            </section>


            <section class="carousel2 py-4" data-aos="fade-up" data-aos-duration="3000">
                <div id="customCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    
                        <div class="carousel-item active">
                            <div class="carousel-content mx-auto text-center">
                                <div class="carousel-heading">ราคาค่าบริการตรวจบ้านทาวน์โฮม</div>
                                <img src="/HOMESPECTOR/img/servicecharge1.png" alt="Service Pricing 1"
                                    class="img-fluid">
                            </div>
                        </div>
                        
                        <div class="carousel-item">
                            <div class="carousel-content mx-auto text-center">
                                <div class="carousel-heading">ราคาค่าบริการตรวจบ้านทาวน์โฮม</div>
                                <img src="/HOMESPECTOR/img/servicecharge2.png" alt="Service Pricing 2"
                                    class="img-fluid">
                            </div>
                        </div>
                        
                        <div class="carousel-item">
                            <div class="carousel-content mx-auto text-center">
                                <div class="carousel-heading">ราคาค่าบริการตรวจบ้านทาวน์โฮม</div>
                                <img src="/HOMESPECTOR/img/servicecharge3.png" alt="Service Details" class="img-fluid">
                            </div>
                        </div>
                        
                        <div class="carousel-item">
                            <div class="carousel-content mx-auto text-center">
                                <div class="carousel-heading">ราคาค่าบริการตรวจบ้านทาวน์โฮม</div>
                                <img src="/HOMESPECTOR/img/servicecharge4.png" alt="Service Details" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#customCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"
                            style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; width: 40px; height: 40px;"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    
                    <button class="carousel-control-next" type="button" data-bs-target="#customCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"
                            style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; width: 40px; height: 40px;"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section> -->

            <!-- 🏠 Services Section -->
            <section class="services">
                <div class="services container">
                    <div class="service-content">
                        <?php echo $row_services['content']; ?>
                    </div>
                </div>
            </section>

            <!-- 🎞️ Carousel Section -->
            <section class="carousel2 py-4">
                    <div class="carousel slide">
                        <div class="carousel-inner">
                            <?php echo $row_carousel['content']; ?>
                        </div>
                        <!-- Previous Button -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#customCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"
                                style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; width: 40px; height: 40px;"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                            <!-- Next Button -->
                        <button class="carousel-control-next" type="button" data-bs-target="#customCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"
                                style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; width: 40px; height: 40px;"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
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
                            <li><a href="/HOMESPECTOR/Homepage/Hinspector.php">ต.ตรวจบ้าน</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/Hinterior.php">ต.ตงแต่ง</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/Hconstruction.php">ต.เติม</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/Hbulter.php">H.Bulter</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/cal-electric.php">ตรวจสอบระบบไฟฟ้า</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/app-inspector.php">ตรวจบ้านเอง</a></li>
                            <li><a href="/HOMESPECTOR/Homepage/checklist.php">เทียบสเปกบ้าน</a></li>
                        </ul>
                    </div>

                    <!-- Extra Section: Customer Help -->
                    <div class="footer-help">
                        <h2>ช่วยเหลือ <span class="toggle-icon">+</span></h2>
                        <ul>
                            <li><a href="/HOMESPECTOR/Homepage/index.php#faq">คำถามที่พบบ่อย (FAQ)</a></li>
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
    <script src="/HOMESPECTOR/JS/carousel.js"></script>
    <script src="/HOMESPECTOR/JS/carousel2.js"></script>
    <script src="/HOMESPECTOR/JS/carousel5.js"></script>
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