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
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/articles.css">
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
            <div class="review-page" data-aos="fade-up">
                <h1>บทความ</h1>
                <p>
                    ความรู้เกี่ยวกับ งานตรวจรับบ้านเเละคอนโดก่อนโอนกรรมสิทธิ์
                </p>

                <!-- Categories Section -->
                <div class="categories" data-aos="fade-up" data-aos-duration="1500">
                    <button class="category-btn active" data-category="all">All</button>
                    <button class="category-btn" data-category="Roof">Roof</button>
                    <button class="category-btn" data-category="Electrical System">Electrical System</button>
                    <button class="category-btn" data-category="Plumbing System">Plumbing System</button>
                    <button class="category-btn" data-category="HVAC System">HVAC System</button>
                </div>

                <div class="review-cards" id="review-cards"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        let allArticles = [];

                        const container = document.getElementById("review-cards");

                        fetch("/HOMESPECTOR/backend/panel/api_articles.php")
                            .then(res => res.json())
                            .then(data => {
                                allArticles = data;

                                // ✅ รวม static articles ที่อยู่ใน DOM (articles ที่สร้างจาก HTML)
                                const staticCards = Array.from(document.querySelectorAll("#review-cards .card")).map(card => ({
                                    id: 0, // หรือใช้ id เฉพาะ เช่น 9999-
                                    title: card.querySelector("p")?.innerText,
                                    thumbnail: card.querySelector("img")?.src,
                                    article_date: card.querySelector(".upload-date")?.innerText.split("|")[0]?.trim(),
                                    category: card.dataset.category,
                                    url: card.href
                                }));

                                // ✅ รวม static + dynamic และ sort ตามวันที่
                                allArticles = [...staticCards, ...allArticles].sort((a, b) => new Date(b.article_date) - new Date(a.article_date));

                                renderArticles(allArticles);
                            })
                            .catch(err => {
                                console.error("Fetch error:", err);
                                container.innerHTML += "<p class='text-danger'>❌ โหลดบทความไม่สำเร็จ</p>";
                            });

                        function renderArticles(articles) {
                            container.innerHTML = ""; // ล้างของเก่า
                            if (articles.length === 0) {
                                container.innerHTML = "<p class='text-danger'>❗ ไม่พบบทความ</p>";
                                return;
                            }

                            articles.forEach(article => {
                                const html = `
                                <a href="${article.url || '/HOMESPECTOR/Homepage/articles_view11.php?id=' + article.id}" 
                                    class="card" data-category="${article.category}">
                                    <img src="${article.thumbnail}" alt="${article.title}">
                                    <p>${article.title}</p>
                                    <span class="upload-date">${article.article_date} | ${article.category || ''}</span>
                                </a>`;
                                container.insertAdjacentHTML("beforeend", html);
                            });
                        }

                        const buttons = document.querySelectorAll(".category-btn");
                        buttons.forEach(btn => {
                            btn.addEventListener("click", function () {
                                buttons.forEach(b => b.classList.remove("active"));
                                btn.classList.add("active");

                                const selected = btn.dataset.category.toLowerCase();
                                const cards = document.querySelectorAll("#review-cards .card");

                                cards.forEach(card => {
                                    const category = card.dataset.category?.toLowerCase() || "";
                                    card.style.display = selected === "all" || category === selected ? "block" : "none";
                                });
                            });
                        });
                    });
                </script>



                <!-- Review Cards -->
                <div class="review-cards" id="review-cards">
                    <a href="/HOMESPECTOR/Homepage/articles_view.html" class="card" data-category="Roof">
                        <img src="/HOMESPECTOR/img/article1.1.jpg" alt="House Review 1">
                        <p>สรุป!! จักรวาลการออกแบบสาย LAN ตามบ้าน </p>
                        <span class="upload-date">2025-02-10 | Roof</span>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/articles_view2.html" class="card" data-category="Roof">
                        <img src="/HOMESPECTOR/img/releted2.jpg" alt="House Review 2">
                        <p>เราต่างจากที่อื่นอย่างไร What Makes US Different? </p>
                        <span class="upload-date">2025-02-08 | Roof</span>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/articles_view3.html" class="card" data-category="Electrical System">
                        <img src="/HOMESPECTOR/img/articles_releted.jpg" alt="House Review 3">
                        <p>ซื้อบ้านใหม่ ติดเครื่องทำน้ำอุ่นยังไง </p>
                        <span class="upload-date">2025-02-07 | Electrical System</span>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/articles_view4.html" class="card" data-category="Electrical System">
                        <img src="/HOMESPECTOR/img/ebook.jpg" alt="House Review 4">
                        <p>แจกฟรี!!! ebook ความรู้ระบบไฟฟ้าภายในบ้าน </p>
                        <span class="upload-date">2024-12-07 | Electrical System</span>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/articles_view5.html" class="card" data-category="Electrical System">
                        <img src="/HOMESPECTOR/img/review5.1.jpg" alt="House Review 5">
                        <p>ทำอย่างไร เมื่อสายดินหลุดออกจากหลักดิน ? </p>
                        <span class="upload-date">2024-12-06 | Electrical System</span>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/articles_view6.html" class="card" data-category="Plumbing System">
                        <img src="/HOMESPECTOR/img/ev-charger.jpg" alt="House Review 6">
                        <p>สิ่งที่ต้องรู้เกี่ยวกับ EV Charger </p>
                        <span class="upload-date">2024-12-05 | Plumbing System</span>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/articles_view7.html" class="card" data-category="Plumbing System">
                        <img src="/HOMESPECTOR/img/tou.jpg" alt="House Review 7">
                        <p>ความแตกต่างระหว่างมิเตอร์ปกติกับมิเตอร์ TOU</p>
                        <span class="upload-date">2024-12-03 | Plumbing System</span>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/articles_view8.html" class="card" data-category="HVAC System">
                        <img src="/HOMESPECTOR/img/review8.1.jpg" alt="House Review 8">
                        <p>การตรวจสอบสาย LAN </p>
                        <span class="upload-date">2024-12-02 | HVAC System</span>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/articles_view9.html" class="card" data-category="HVAC System">
                        <img src="/HOMESPECTOR/img/ac.jpg" alt="House Review 9">
                        <p>การตรวจเช็คเครื่องปรับอากาศ </p>
                        <span class="upload-date">2025-02-01 | HVAC System</span>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/articles_view10.html" class="card" data-category="Roof">
                        <img src="/HOMESPECTOR/img/articles10.png" alt="House Review 10">
                        <p>Grand Bangkok Boulevard Yard Bangna </p>
                        <span class="upload-date">2025-01-01 | Roof</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

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
    <script src="/HOMESPECTOR/JS/filter.js"></script>
    <script src="/HOMESPECTOR/JS/article.js"></script>
    <script src="/HOMESPECTOR/JS/upload_date.js"></script>
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
    <!-- JavaScript for Category Filtering -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const categoryButtons = document.querySelectorAll(".category-btn");
            const articles = document.querySelectorAll(".review-cards .card");

            categoryButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const selectedCategory = this.getAttribute("data-category");

                    // Remove "active" class from all buttons
                    categoryButtons.forEach(btn => btn.classList.remove("active"));
                    // Add "active" class to clicked button
                    this.classList.add("active");

                    // Show or hide articles based on selected category
                    articles.forEach(article => {
                        const articleCategory = article.getAttribute("data-category");
                        if (selectedCategory === "all" || articleCategory === selectedCategory) {
                            article.style.display = "block"; // Show matching category
                        } else {
                            article.style.display = "none"; // Hide non-matching category
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>