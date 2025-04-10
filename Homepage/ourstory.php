<?php
// Database Connection
$pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch latest content
$stmt = $pdo->prepare("SELECT content FROM ourstory WHERE page_name = 'ourstory'");
$stmt->execute();
$content = $stmt->fetchColumn();
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
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/ourstory.css">
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

            <!-- <section class="story-container">

                <div class="story-header">
                    <img src="/HOMESPECTOR/img/ourstoryimage1.png" alt="Building B" class="header-image">
                    <h1 class="header-title">OUR STORY</h1>
                </div>


                <section class="story-content">
                    <p>
                        ต.ตรวจบ้าน เริ่มต้นเมื่อปี 2015 โดยเจ้าของ คุณสุเมธ เจตธำรงชัย และคุณสุเทพ เจตธำรงชัย
                        เริ่มจากการที่รับตรวจบ้าน
                        และคอนโดให้กับกลุ่มพี่น้องและเพื่อนฝูงคนรู้จักจนได้รับการบอกต่อปากต่อปาก
                        จนกระทั่งเป็นที่รู้จักมากขึ้นทำให้ปัจจุบัน ต.ตรวจบ้าน
                        เป็นผู้นำด้านการตรวจบ้านอันดับต้นๆ ในประเทศไทยที่ลูกค้าบอกต่อมากที่สุด
                    </p>
                </section>
                <section class="vision-mission" data-aos="fade-up">
                    <h2>Our Vision and Mission</h2>
                    <div class="head" data-aos="fade-up">
                        <h2>“ผู้นำด้านการตรวจบ้าน”</h2><br>
                        <p>บริการตรวจสอบบ้านมือสองของบ้านและคอนโดก่อนโอนกรรมสิทธิ์ดีที่สุด อันดับ 1
                            ที่ลูกค้าเลือกมากที่สุดในประเทศไทย</p>
                    </div>
                    <div class="values">
                        <div class="value" data-aos="fade-up-right">
                            <img src="/HOMESPECTOR/icon/ICON/trusted.png" alt="Trust Icon">
                            <h3>TRUST</h3>
                            <p>การสร้างความเชื่อมั่นด้วยการตรวจสอบที่มีมาตรฐาน</p>
                        </div>
                        <div class="value" data-aos="fade-up">
                            <img src="/HOMESPECTOR/icon/ICON/future.png" alt="Tech Icon">
                            <h3>TECH</h3>
                            <p>บริการตรวจสอบคุณภาพบ้านโดยใช้เทคโนโลยีใหม่</p>
                        </div>
                        <div class="value" data-aos="fade-up-left">
                            <img src="/HOMESPECTOR/icon/ICON/group.png" alt="Team Icon">
                            <h3>TEAM</h3>
                            <p>ทีมงานคุณภาพพร้อมให้บริการลูกค้า</p>
                        </div>
                    </div>
                </section>

                <section class="our-founders" data-aos="fade-up">
                    <h2>Our Founders</h2>
                    <div class="founders-container">
                        <div class="founder" data-aos="fade-right">
                            <img src="/HOMESPECTOR/img/staff/CEO.jpg" alt="Sumes Chetthamrongchai"
                                class="founder-photo">
                            <h3>Sumes Chetthamrongchai</h3>
                            <p>Founder & Managing Director, NACHI Certified Inspector</p>
                        </div>
                        <div class="founder" data-aos="fade-left">
                            <img src="/HOMESPECTOR/img/staff/Co-founder.jpg" alt="Suthep Chetthamrongchai"
                                class="founder-photo">
                            <h3>Suthep Chetthamrongchai</h3>
                            <p>Co-Founder & Civil Engineer</p>
                        </div>
                    </div>
                </section>
                <section class="commitment" data-aos="fade-up">
                    <h2>Our Commitment to the Client</h2>
                    <div class="commitment-content">
                        <ul class="centered-list" data-aos="fade-up-left">
                            <li>ซื่อสัตย์และโปร่งใส
                                ไม่ใช่คนในบริษัทอสังหาริมทรัพย์ออกมารับงานเองหรือตรวจงานโครงการตัวเอง</li>
                            <li>ตรวจครบทุกฟังก์ชันการใช้งานหลัก ใช้เทคโนโลยีที่ทันสมัยเข้ามาใช้ในการตรวจเพื่อความแม่นยำ
                            </li>
                            <li>ตรวจบ้านทุกวันเป็น "อาชีพหลัก ไม่ใช่งานเสริม"</li>
                            <li>ตรวจด้วยช่างผู้เชี่ยวชาญงานจริง ไม่ใช้คำว่าวิศวกรมาหากิน</li>
                            <li>ไม่เน้นล่ารายการดีเฟคเพื่อให้เล่มรายงานดูเยอะ</li>
                            <li>บริษัทรับงานเองและไม่มีการส่งงานต่อให้ซับกินค่าหัวคิว</li>
                            <li>คติของเรา “ตรวจจริง เห็นกับตา ไปพร้อมลูกค้า”</li>
                        </ul>
                    </div>
                </section>
            </section> -->
            
                <div class="our-story-content" id="story-content">
                    <?php echo $content ? html_entity_decode($content) : "<p>No content available.</p>"; ?>
                </div>

                <script>
                    // Check for updated content in Local Storage
                    $(document).ready(function() {
                        var latestContent = localStorage.getItem("latestContent");
                        if (latestContent) {
                            $("#story-content").html(latestContent);
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
                                <a href="https://www.facebook.com/t.homeinspector/" target="_blank"><img src="/HOMESPECTOR/icon/ICON/Fb.png" alt="Facebook"></a>
                                <a href="https://www.instagram.com/t.homeinspector/" target="_blank"><img src="/HOMESPECTOR/icon/ICON/IG.png" alt="Instagram"></a>
                                <a href="https://page.line.me/t.home?openQrModal=true" target="_blank"><img src="/HOMESPECTOR/icon/ICON/line.png" alt="Line"></a>
                                <a href="https://www.tiktok.com/@thomeinspector" target="_blank"><img src="/HOMESPECTOR/icon/ICON/Tiktok.png" alt="TikTok"></a>
                                <a href="https://www.youtube.com/channel/UC1BPUCVPBW4-ml7MrxQWjug" target="_blank"><img src="/HOMESPECTOR/icon/ICON/YB.png" alt="YouTube"></a>
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
    <!-- <script src="/HOOMESPECTOR/JS/dropdown.js"></script> -->
    <script src="/HOMESPECTOR/JS/carousel.js"></script>
    <script src="/HOMESPECTOR/JS/carousel2.js"></script>
    <script src="/HOMESPECTOR/JS/footer.js"></script>
    <script src="/HOMESPECTOR/JS/search_ham.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>

</html>