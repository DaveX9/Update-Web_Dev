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
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/joinwithus.css">
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
            <div class="contact-container1">
                <a href="tel:02-454-2043" class="contact-item1" data-aos="fade-up-left">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <span>โทร 02-454-2043</span>
                </a>
                <a href="https://line.me/R/ti/p/@t.home" target="_blank" class="contact-item1" data-aos="fade-up-right">
                    <div class="icon">
                        <i class="fa-brands fa-line" style="color: #00a347;"></i>
                    </div>
                    <span>@t.home</span>
                </a>
            </div>
            
            <!-- <div class="join-us-container">
                <div class="join-us-content">
                    <h1 data-translate="join-title">JOIN US !</h1>
                    <p data-translate="join-description">
                        Join us to be a part of the professional consulting team, providing extraordinary
                        level of expertise on services and solutions of the ever growing industry.
                    </p>
                    <a href="mailto:admin@thomeinspector.com" class="btn" data-translate="join-button">Join Us</a>
                </div>

                <div class="join-us-image">
                    <img src="/HOMESPECTOR/img/joinwithus2.png" alt="Join Us Illustration">
                </div>
            </div>


            <div class="apply-job" data-aos="fade-up">
                <h1>We're Hiring!</h1>
                <p>Join our team and grow your career with us. Check out our latest job openings below</p>
                
                <div class="job-container" data-aos="fade-up-right">
                    <div class="job-listing">
                        <h2>Admin</h2>
                        <p><strong>Location:</strong> Office</p>
                        <p><strong>Requirements:</strong> Experience with office management, scheduling, and communication skills.</p>
                        <a href="/HOMESPECTOR/Homepage/job1.php" class="apply-btn">Apply Now</a>
                    </div>
                    
                    <div class="job-listing" data-aos="fade-up">
                        <h2>Civil Engineer</h2>
                        <p><strong>Location:</strong> On-site </p>
                        <p><strong>Requirements:</strong> Experience with structural analysis, CAD software, and construction management.</p>
                        <a href="/HOMESPECTOR/Homepage/job2.php" class="apply-btn">Apply Now</a>
                    </div>
                    
                    <div class="job-listing" data-aos="fade-up-left">
                        <h2>Intern Student</h2>
                        <p><strong>Location:</strong> On-site</p>
                        <p><strong>Requirements:</strong> Currently enrolled in a relevant degree program, eager to learn, and strong analytical skills.</p>
                        <a href="/HOMESPECTOR/Homepage/job3.html" class="apply-btn">Apply Now</a>
                    </div> 
                </div>
            </div> -->
            <?php
                // Database Connection
                $pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Fetch ONLY the latest content from the database
                $stmt = $pdo->prepare("SELECT content FROM pages WHERE page_name = 'joinwithus' ORDER BY id DESC LIMIT 1");
                $stmt->execute();
                $content = $stmt->fetchColumn();

                // Clear any previous output before displaying the new content
                ob_clean();
                echo $content;
            ?>
            <?php
                // Fetch job listings
                $stmt = $pdo->prepare("SELECT * FROM job_listings ORDER BY date_posted DESC");
                $stmt->execute();
                $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <div class="container mt-5">
                    <div class="row">
                        <?php foreach ($jobs as $job): ?>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo htmlspecialchars($job['title']); ?></h4>
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($job['company_name']); ?></h6>
                                        <p><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></p>
                                        <p><strong>Job Type:</strong> <?php echo htmlspecialchars($job['job_type']); ?></p>
                                        <p><strong>Salary:</strong> <?php echo htmlspecialchars($job['salary']); ?></p>
                                        <a href="job_details.php?id=<?php echo $job['id']; ?>" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <style>
                    /* Job Apply Section */
                    .apply-job {
                        width: 90%;
                        max-width: 1200px;
                        margin: auto;
                        overflow: hidden;
                        background: #fff;
                        padding: 40px 20px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        border-radius: 10px;
                        text-align: center;
                        margin-top: 30px;
                        margin-bottom: 30px;
                    }

                    h1 {
                        color: #002e6d;
                        text-align: center;
                        font-weight: bold;
                        font-size: 32px;
                    }

                    /* Job Container */
                    .job-container {
                        display: flex;
                        justify-content: center; /* Centers items horizontally */
                        flex-wrap: wrap;
                        gap: 20px;
                        padding: 10px;
                    }

                    /* Job Listings */
                    .job-listing {
                        padding: 20px;
                        background: #e0f7ff;
                        border-radius: 15px;
                        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                        text-align: center;
                        position: relative;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        width: 280px; /* Fixed width for better centering */
                    }

                    /* Apply Button */
                    .apply-btn {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #002e6d;
                        color: white;
                        text-decoration: none;
                        border-radius: 15px;
                        transition: 0.3s;
                        margin-top: 15px;
                    }

                    .apply-btn:hover {
                        background: #001a4d;
                    }

                    /* Responsive Design */
                    @media (max-width: 1024px) {
                        .job-container {
                            flex-direction: row;
                            justify-content: center;
                        }
                    }

                    @media (max-width: 768px) {
                        .job-container {
                            flex-direction: column;
                            align-items: center;
                        }
                    }

                    @media (max-width: 480px) {
                        h1 {
                            font-size: 24px;
                        }
                        .job-listing {
                            width: 100%;
                            max-width: 300px;
                        }
                        .apply-btn {
                            font-size: 16px;
                            padding: 12px;
                        }
                    }
                </style>
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