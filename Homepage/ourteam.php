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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/ourteam.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <title>Header Design</title>
</head>
<style>
    .team-container {
        padding: 40px 20px;
        max-width: 1200px;
        margin: auto;
        border-radius: 12px;
        margin-bottom: 50px;
    }

    .heading {
        text-align: center;
        margin-bottom: 40px;
        font-size: 28px;
        color: #1a237e;
        font-weight: bold;
    }

    .team-member {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 50px;
        text-align: center;
        border-radius: 12px;
    }

    .team-member img {
        width: 100%;
        max-width: 250px;
        border-radius: 15px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        margin-bottom: 12px;
    }

    .team-member h4 {
        margin: 12px 0 6px;
        font-size: 20px;
        color: #0d47a1;
        text-align: center;
        font-weight: bold;
    }

    .team-member p {
        color: #444;
        font-size: 15px;
        font-weight: bold;
    }

    .team-groups {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 40px;
    }

    .team-group {
        flex: 1 1 45%;
    }

    .group-heading {
        font-size: 22px;
        font-weight: bold;
        color: #1a237e;
        margin-bottom: 20px;
        text-align: center;
    }

    .team-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
    }

    .team-card {
        flex: 1 1 230px;
        max-width: 230px;
        height: 348px;
        border-radius: 12px;
        padding: 15px;
        text-align: center;
    }


    .team-card:hover {
        transform: translateY(-5px);
    }

    .team-card img {
        width: 100%;
        max-width: 200px;
        height: 250px;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .team-card h4 {
        font-size: 17px;
        color: #0d47a1;
        margin: 8px 0 4px;
        font-weight: bold;
    }

    .team-card p {
        color: #666;
        font-size: 14px;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .team-groups {
            flex-direction: column;
            align-items: center;
        }

        .team-grid {
            flex-direction: column;
            align-items: center;
        }

        .team-member img {
            max-width: 90%;
        }

        .team-card {
            width: 90%;
            max-width: 90%;
        }
    }
</style>

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
            <section class="team-container">
                <div class="team-groups">
                    <?php 
                        echo getContent('team'); 
                    ?>
                </div>
            </section>
            <!-- <section class="our-founders">
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

            <!-- <div class="team-container">
                <h2 class="heading">Our Valuable Team Members</h2>

                <div class="team-member" data-aos="fade-up">
                    <img src="/HOMESPECTOR/img/staff/Sumes.jpg" alt="Sumes Chetthamrongchai" />
                    <h4>Sumes Chetthamrongchai</h4>
                    <p>Founder & Managing Director, NACHI Certified Inspector</p>
                </div>
                <div class="team-groups">
                    <div class="team-group">
                        <div class="team-grid">
                            <div class="team-card" data-aos="fade-up-right">
                                <img src="/HOMESPECTOR/img/staff/Co-founder.jpg" alt="Suthep J.">
                                <h4>Suthep J.</h4>
                                <p>Engineering Manager, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/Charnthawat.jpg" alt="Charnthawat">
                                <h4>Charnthawat C.</h4>
                                <p>Engineering Manage, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up-right">
                                <img src="/HOMESPECTOR/img/staff/Jakkarin.jpg" alt="Jakkarin">
                                <h4>Jakkarin S.</h4>
                                <p>Inspector, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/Phonthewa.JPG" alt="Phonthewa">
                                <h4>Phonthewa K.</h4>
                                <p>Inspector, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up-right">
                                <img src="/HOMESPECTOR/img/staff/Waroj.jpg" alt="Waroj">
                                <h4>Waroj T.</h4>
                                <p>Inspector, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/Chagkrit.jpg" alt="Chagkrit">
                                <h4>Chagkrit S.</h4>
                                <p>Inspector, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up-right">
                                <img src="/HOMESPECTOR/img/staff/Chonsawat.jpg" alt="Chonsawat">
                                <h4>Chonsawat C.</h4>
                                <p>Inspector, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/Watanon.JPG" alt="Watanon">
                                <h4>Watanon L.</h4>
                                <p>Inspector, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up-right">
                                <img src="/HOMESPECTOR/img/staff/peerapat.jpg" alt="Charnthawat">
                                <h4>Peerapat P.</h4>
                                <p>Inspector, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/cho.jpg" alt="Charnthawat">
                                <h4>Vatanyu T.</h4>
                                <p>Junior Inspector, T.Home Inspector</p>
                            </div>
                        </div>
                    </div>

                    <div class="team-group">
                        <div class="team-grid">
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/Punpun.JPG" alt="PunPun">
                                <h4>Punpun W.</h4>
                                <p>General Manager, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up-left">
                                <img src="/HOMESPECTOR/img/staff/Fongmany.JPG" alt="Fongmany">
                                <h4>Fongmany L.</h4>
                                <p>Marketing Manager, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/Nutnaree.JPG" alt="Nutnaree M.">
                                <h4>Nutnaree M.</h4>
                                <p>Admin, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up-left">
                                <img src="/HOMESPECTOR/img/staff/pun.JPG" alt="Puntharika A.">
                                <h4>Puntharika A.</h4>
                                <p>Creative Content Creator, T.Home Inspector</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/Sorawit.JPG" alt="Sorawit W.">
                                <h4>Sorawit W.</h4>
                                <p>Video Editor, T.Home Inspector</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-container">

                <div class="team-grid">
                    <div class="team-card" data-aos="fade-up-right">
                        <img src="/HOMESPECTOR/img/staff/Co-founder1.jpg" alt="Suthep">
                        <h4>Suthep J.</h4>
                        <p>Project Manager, T.Construction</p>
                    </div>
                    <div class="team-card" data-aos="fade-up">
                        <img src="/HOMESPECTOR/img/staff/sarayut.jpg" alt="Sarayut">
                        <h4>Sarayut T.</h4>
                        <p>Project Consultant, T.Construction</p>
                    </div>
                    <div class="team-card" data-aos="fade-up-left">
                        <img src="https://img.freepik.com/free-photo/smiling-asian-man-using-tablet-computer_1262-18324.jpg?t=st=1744191496~exp=1744195096~hmac=f62495ae433146723b2c2d5ce529d1d5da87c6712d087ef6c5af4fcacc603c56&w=996"
                            alt="Pikanet">
                        <h4>Pikanet P.</h4>
                        <p>Site Manager, T.Construction</p>
                    </div>
                </div>
            </div> -->

            <!-- <div class="team-container">
                <div class="team-groups">
                    <div class="team-group">
                        <div class="team-grid">
                            <div class="team-card" data-aos="fade-up-right">
                                <img src="/HOMESPECTOR/img/staff/akkarin.jpg" alt="Akkarin">
                                <h4>Akkarin S.</h4>
                                <p>Project Manager, T.Interior</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/nattawee.jpg" alt="Nattawee">
                                <h4>Nattawee K.</h4>
                                <p>Engineering, T.Interior</p>
                            </div>
                            <div class="team-card" data-aos="fade-up-right">
                                <img src="/HOMESPECTOR/img/staff/phattawat.png" alt="Phattawat">
                                <h4>Phattawat V.</h4>
                                <p>Foreman, T.Interior</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/pilaiwan.jpg" alt="Pilaiwan">
                                <h4>Pilaiwan P. </h4>
                                <p>Graphic, T.Interior</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/technic.jpg" alt="technic">
                                <h4>Technic K.</h4>
                                <p>Video Editor, T.Interior</p>
                            </div>
                        </div>
                    </div> -->

                    <!-- Right: Admin/Creative Team -->
                    <!-- <div class="team-group">
                        <div class="team-grid">
                            <div class="team-card" data-aos="fade-up">
                                <img src="https://img.freepik.com/free-photo/cheerful-asian-woman-sitting-desk-office-writing-posing-camera_1098-20494.jpg?t=st=1744251417~exp=1744255017~hmac=40806272eb9e24671b56271fdf838728f787967c14a48e48b7734c0eef75194a&w=740"
                                    alt="Srunraz">
                                <h4>Srunraz K.</h4>
                                <p>Designer Supervisor, T.Interior</p>
                            </div>
                            <div class="team-card" data-aos="fade-up-left">
                                <img src="/HOMESPECTOR/img/staff/vaitaya.png" alt="Vaitaya">
                                <h4>Vaitaya K.</h4>
                                <p>Interior Designer, T.Interior</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/watcharakorn.png" alt="Watcharakorn">
                                <h4>Watcharakorn S.</h4>
                                <p>Interior Designer, T.Interior</p>
                            </div>
                            <div class="team-card" data-aos="fade-up-left">
                                <img src="/HOMESPECTOR/img/staff/khanawat.png" alt="Khanawat">
                                <h4>Khanawat B.</h4>
                                <p>Interior Designer, T.Interior</p>
                            </div>
                            <div class="team-card" data-aos="fade-up">
                                <img src="/HOMESPECTOR/img/staff/kewalee.png" alt="Kewalee">
                                <h4>Kewalee P.</h4>
                                <p>Interior Designer, T.Interior</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->




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