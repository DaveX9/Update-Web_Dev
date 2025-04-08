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
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/articles_view.css">
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

            <?php
                include __DIR__ . '/../backend/panel/db.php';

                $id = $_GET['id'] ?? null;
                if (!$id) {
                    echo "<h2>ไม่พบรหัสบทความ</h2>";
                    exit;
                }

                $stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $article = $stmt->get_result()->fetch_assoc();
                $stmt->close();

                if (!$article) {
                    echo "<h2>ไม่พบบทความที่ต้องการ</h2>";
                    exit;
                }
            ?>

            <style>
            .article-section {
                padding: 20px;
            }

            .article-title {
                font-size: 32px;
                font-weight: bold;
                text-align: center;
                color: #333;
                margin-bottom: 10px;
            }


            .main-image-container {
                text-align: center;
                margin-bottom: 20px;
            }

            .main-image-caption {
                font-size: 14px;
                color: #555;
                font-weight: bold;
                text-align: center;
                margin-top: 8px;
            }

            .article-content {
                font-size: 16px;
                color: #333;
                line-height: 1.8;
                margin-top: 20px;
                word-wrap: break-word;
            }

            .article-content img {
                max-width: 100%;
                height: auto;
                margin: 10px auto;
                display: block;
                border-radius: 8px;
            }

            /* Tags */
            .tag-section {
                margin-top: 30px;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }

            .tag-btn {
                padding: 8px 16px;
                text-decoration: none;
                border-radius: 20px;
                background: transparent;
                font-size: 14px;
                color: #0056b3;
                cursor: pointer;
                transition: all 0.3s ease-in-out;
            }

            .tag-btn:hover {
                background: #0056b3;
                color: white;
            }

            /* Responsive Layout */
            @media (max-width: 768px) {
                .article-title {
                    font-size: 24px;
                }

                .upload-date {
                    font-size: 14px;
                }

                .article-content {
                    font-size: 15px;
                }

                .main-image {
                    max-width: 100%;
                }

                .tag-btn {
                    font-size: 13px;
                    padding: 6px 12px;
                }
            }
            </style>
            <div class="article-section">
                <h2 class="article-title"><?= htmlspecialchars($article['title']) ?></h2>
                <p class="upload-date"><?= htmlspecialchars($article['article_date']) ?></p>

                <?php if (!empty($article['thumbnail'])): ?>
                <div class="main-image-container">
                    <img src="/HOMESPECTOR/backend/panel/<?= htmlspecialchars($article['thumbnail']) ?>"
                        class="main-image" alt="Main Image">
                </div>
                <?php endif; ?>

                <?php if (!empty($article['caption_main'])): ?>
                <p class="main-image-caption"><?= htmlspecialchars($article['caption_main']) ?></p>
                <?php endif; ?>

                <div class="article-content">
                    <?= !empty($article['full_content']) ? $article['full_content'] : '<p style="color:red">⚠️ ไม่พบเนื้อหาบทความ</p>' ?>
                </div>

                <?php if (!empty($article['tags'])): ?>
                <div class="tag-section">
                    <?php foreach (explode(',', $article['tags']) as $tag): ?>
                    <?php $tag = trim($tag); ?>
                    <a href="/HOMESPECTOR/backend/panel/articles_by_tag.php?tag=<?= urlencode($tag) ?>" class="tag-btn">
                        <?= htmlspecialchars($tag) ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <!-- Social Share Section -->
                <div class="social-share">
                    <span>SHARE :</span>
                    <a href="https://www.facebook.com/t.homeinspector/?locale=th_TH">
                        <img src="/HOMESPECTOR/icon/ICON/Fb.png" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/t.homeinspector/">
                        <img src="/HOMESPECTOR/icon/ICON/IG.png" alt="Instagram">
                    </a>
                    <a href="https://page.line.me/t.home?openQrModal=true">
                        <img src="/HOMESPECTOR/icon/ICON/line.png" alt="Line">
                    </a>
                    <a href="#" id="share-icon">
                        <i class="fa-solid fa-share" aria-label="Share"></i>
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <section class="carousel-content" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <h2>Other Articles</h2>
                <div class="content-carousel-container">
                    <button class="carousel-btn prev-btn">❮</button>
                    <div class="content-carousel" id="other-carousel"></div>
                    <button class="carousel-btn next-btn">❯</button>
                </div>
            </section>


            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const container = document.getElementById("other-carousel");
                
                    fetch("/HOMESPECTOR/backend/panel/api_articles.php")
                        .then(res => res.ok ? res.json() : Promise.reject("API error"))
                        .then(data => {
                            // ✅ static article ที่ฝังไว้ใน DOM หรือ define ตรงนี้
                            const staticCards = [
                                {
                                    id: 0,
                                    title: "สิ่งที่ต้องรู้เกี่ยวกับ EV Charger",
                                    thumbnail: "/HOMESPECTOR/img/ev-charger.jpg",
                                    article_date: "2025-01-01",
                                    category: "Plumbing System",
                                    url: "/HOMESPECTOR/Homepage/articles_view6.html"
                                },
                                {
                                    id: 1,
                                    title: "การตรวจเช็คเครื่องปรับอากาศ",
                                    thumbnail: "/HOMESPECTOR/img/ac.jpg",
                                    article_date: "2025-01-03",
                                    category: "HVAC System",
                                    url: "/HOMESPECTOR/Homepage/articles_view9.html"
                                },
                                {
                                    id: 2,
                                    title: "แจกฟรี eBook ความรู้ระบบไฟฟ้าภายในบ้าน",
                                    thumbnail: "/HOMESPECTOR/img/knowladge.jpg",
                                    article_date: "2024-12-01",
                                    category: "Electrical System",
                                    url: "/HOMESPECTOR/Homepage/articles_view4.html"
                                }
                                // 👉 เพิ่มได้อีกตามต้องการ
                            ];
                
                            const allArticles = [...staticCards, ...data];
                
                            const shuffled = allArticles.sort(() => Math.random() - 0.5);
                            const selected = shuffled.slice(0, Math.floor(Math.random() * 3) + 6); // 6–8 ชิ้น
                
                            renderOtherArticlesCarousel(selected);
                        })
                        .catch(err => {
                            console.error("❌ Error loading other articles", err);
                            container.innerHTML = "<p class='text-danger'>ไม่สามารถโหลดบทความอื่น ๆ ได้</p>";
                        });
                
                    function renderOtherArticlesCarousel(articles) {
                        const container = document.getElementById("other-carousel");
                        container.innerHTML = "";
                
                        articles.forEach(article => {
                            const html = `
                                <a href="${article.url || '/HOMESPECTOR/Homepage/articles_view11.php?id=' + article.id}" class="content-carousel-item">
                                    <img src="${article.thumbnail}" alt="${article.title}">
                                    <div class="content-carousel-info">
                                        <h3>${article.title}</h3>
                                    </div>
                                </a>`;
                            container.insertAdjacentHTML("beforeend", html);
                        });
                
                        initCarouselScroll();
                    }
                
                    function initCarouselScroll() {
                        const container = document.querySelector('.content-carousel');
                        const nextBtn = document.querySelector('.next-btn');
                        const prevBtn = document.querySelector('.prev-btn');
                
                        nextBtn?.addEventListener('click', () => {
                            container.scrollBy({ left: 300, behavior: 'smooth' });
                        });
                
                        prevBtn?.addEventListener('click', () => {
                            container.scrollBy({ left: -300, behavior: 'smooth' });
                        });
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
    <script src="/HOMESPECTOR/JS/upload_date.js"></script>
    <script src="/HOMESPECTOR/JS/dropdown.js"></script>
    <script src="/HOMESPECTOR/JS/content_carousel.js"></script>
    <script src="/HOMESPECTOR/JS/article_tag.js"></script>
    <script src="/HOMESPECTOR/JS/search_ham.js"></script>
    <script src="/HOMESPECTOR/JS/footer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script src="/HOMESPECTOR/JS/share_icon.js"></script>

</body>

</html>