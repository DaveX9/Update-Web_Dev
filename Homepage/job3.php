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
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/header.css">
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <title>Header Design</title>
</head>

<style>
    .apply-job {
        max-width: 900px;
        margin: 50px auto;
        background: #ffffff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .job-container {
        margin-top: 20px;
    }

    .job-listing {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        background: #fff;
    }

    .job-listing p {
        font-size: 16px;
        color: #333;
    }

    @media (max-width: 768px) {
        .apply-job {
            width: 95%;
            padding: 15px;
        }
    }
    .apply-btn {
    display: block;
    width: 150px;
    text-align: center;
    background:var(--font2-color);
    color: white;
    padding: 10px;
    font-size: 16px;
    border-radius: 8px;
    text-decoration: none;
    margin-top: 10px;
    }

    .apply-btn:hover {
        background:var(--hover-color);
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
                        <li><a href="/HOMESPECTOR/Homepage/service.html" data-translate="nav.services">บริการ</a></li>
                        <li><a href="/HOMESPECTOR/Homepage/promotion.html" data-translate="nav.promotion">สิทธิพิเศษ</a>
                        </li>
                        <li><a href="/HOMESPECTOR/Homepage/projects_media.html" data-translate="nav.projects">ผลงาน</a>
                        </li>

                        <!-- Dropdown Menu -->
                        <li class="dropdown">
                            <a href="#" class="menu-item" data-translate="nav.aboutUs">
                                เกี่ยวกับเรา <span class="dropdown-icon"><i class="fa-solid fa-caret-down"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/HOMESPECTOR/Homepage/ourstory.html"
                                        data-translate="nav.ourStory">ประวัติของเรา</a>
                                </li>
                                <li><a href="/HOMESPECTOR/Homepage/ourteam.html"
                                        data-translate="nav.ourTeam">ทีมงานของเรา</a></li>
                            </ul>
                        </li>

                        <li><a href="/HOMESPECTOR/Homepage/articles.html" data-translate="nav.articles">บทความ</a></li>
                        <li><a href="/HOMESPECTOR/Homepage/Review-home.html"
                                data-translate="nav.reviewHome">รีวิวบ้าน</a></li>
                        <li><a href="/HOMESPECTOR/Homepage/review_interior.html"
                                data-translate="nav.reviewInterior">รีวิวตกแต่งบ้าน</a></li>
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
                                <li><a href="/HOMESPECTOR/Homepage/service.html"
                                        data-translate="nav.services">บริการ</a></li>
                                <li><a href="/HOMESPECTOR/Homepage/promotion.html"
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
                                        <li><a href="/HOMESPECTOR/Homepage/ourstory.html"
                                                data-translate="nav.ourStory">ประวัติของเรา</a>
                                        </li>
                                        <li><a href="/HOMESPECTOR/Homepage/ourteam.html"
                                                data-translate="nav.ourTeam">ทีมงานของเรา</a></li>
                                    </ul>
                                </li>

                                <li><a href="/HOMESPECTOR/Homepage/articles.html"
                                        data-translate="nav.articles">บทความ</a></li>
                                <li><a href="/HOMESPECTOR/Homepage/Review-home.html"
                                        data-translate="nav.reviewHome">รีวิวบ้าน</a></li>
                                <li><a href="/HOMESPECTOR/Homepage/review_interior.html"
                                        data-translate="nav.reviewInterior">รีวิวตกแต่งบ้าน</a></li>
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
                <a href="tel:02-454-2043" class="contact-item" data-aos="fade-up-left">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <span>โทร 02-454-2043</span>
                </a>
                <a href="https://line.me/R/ti/p/@t.home" target="_blank" class="contact-item" data-aos="fade-up-right">
                    <div class="icon">
                        <i class="fa-brands fa-line" style="color: #00a347;"></i>
                    </div>
                    <span>@t.home</span>
                </a>
            </div>
            <?php
            // Database Connection
                $pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Fetch job descriptions and IDs from job_listings table
                $stmt = $pdo->prepare("SELECT id, job_description FROM job_listings ORDER BY created_at DESC");
                $stmt->execute();
                $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <!-- Job Descriptions Section -->
            <div class="apply-job" data-aos="fade-up">
                <h2 class="text-center">Job Descriptions</h2>

                <div class="job-container" data-aos="fade-up-right">
                    <?php if (!empty($jobs)): ?>
                        <?php foreach ($jobs as $job): ?>
                            <div class="job-listing" data-aos="fade-up">
                                <p><?php echo htmlspecialchars_decode($job['job_description']); ?></p>
                                <a href="/HOMESPECTOR/Homepage/apply.php?job_id=<?php echo $job['id']; ?>" class="apply-btn">Apply Now</a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">No job descriptions available at the moment.</p>
                    <?php endif; ?>
                </div>
            </div>

            <section class="footer">
                <footer class="footer">
                    <div class="footer-container">
                        <div class="footer-left">
                            <h2 class="footer-title">
                                <img src="/HOMESPECTOR/img/footer_logo.png" alt="logo" class="footer-logo">
                            </h2>
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
                                <a href="https://www.tiktok.com/@thomeinspector">
                                    <img src="/HOMESPECTOR/icon/ICON/Tiktok.png" alt="TikTok">
                                </a>
                                <a href="https://www.youtube.com/channel/UC1BPUCVPBW4-ml7MrxQWjug">
                                    <img src="/HOMESPECTOR/icon/ICON/YB.png" alt="YouTube">
                                </a>
                            </div>
                        </div>
                        <div class="footer-center">
                            <h3 class="toggle-menu" onclick="toggleFooterMenu('nav-menu')">
                                Navigation <span class="toggle-icon">+</span>
                            </h3>
                            <ul id="nav-menu" class="footer-menu">
                                <li><a href="index.html">หน้าหลัก</a></li>
                                <li><a href="service.html">บริการ</a></li>
                                <li><a href="promotion.html">สิทธิพิเศษ</a></li>
                                <li><a href="projects_media.html">ผลงาน</a></li>
                                <li><a href="articles.html">บทความ</a></li>
                                <li><a href="Contactus.php">ติดต่อเรา</a></li>
                            </ul>
                        </div>

                        <!-- บทความ -->
                        <div class="footer-center">
                            <h3 class="toggle-menu" onclick="toggleFooterMenu('article-menu')">
                                บทความ <span class="toggle-icon">+</span>
                            </h3>
                            <ul id="article-menu" class="footer-menu">
                                <li><a href="#">ไฟฟ้า</a></li>
                                <li><a href="#">อุปกรณ์</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                        </div>
                        <div class="footer-right">
                            <h3>We Accept</h3>
                            <div class="payment-logos">
                                <img src="/HOMESPECTOR/img/visacard.png" alt="Visa">
                                <img src="/HOMESPECTOR/img/Mastercard.webp" alt="MasterCard">

                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <p>© 2024 T.HOME INSPECTOR. All rights reserved.</p>
                    </div>
                </footer>
            </section>

        </div>
    </div>


    <script src="/HOMESPECTOR/JS/Toggle_Navbar.js"></script>
    <script src="/HOOMESPECTOR/JS/dropdown.js"></script>
    <script src="/HOMESPECTOR/JS/carousel.js"></script>
    <script src="/HOMESPECTOR/JS/carousel2.js"></script>
    <script src="/HOMESPECTOR/JS/carousel5.js"></script>
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