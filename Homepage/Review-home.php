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
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/Review-home.css">
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

            <div class="contact-container1">
                <a id="phone-link" href="#" class="contact-item1" data-aos="fade-up-left">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <span id="phone-text">โทร ...</span>
                </a>

                <a id="line-link" href="#" target="_blank" class="contact-item1" data-aos="fade-up-right">
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

            <!-- Main Content -->
            <div class="review-page" data-aos="fade-up">
                <h1>รีวิวบ้าน</h1>
                <p>
                    พาทัวร์บ้านรูปแบบใหม่ ไม่ซ้ำใคร ที่แรกและที่เดียว เพราะเราพาดูงานระบบของบ้านในโครงการต่าง ๆ<br>
                    ไม่ว่าจะเป็นงานสถาปัตย์ ระบบไฟฟ้า ระบบสุขาภิบาล หรืองานหลังคา ซึ่งไม่มีที่ไหนทำมาก่อน
                </p>

                <!-- Categories Section -->
                <div class="categories" data-aos="fade-up" data-aos-duration="1500">
                    <button class="category-btn active" data-category="all">All</button>
                    <button class="category-btn" data-category="Land and House">Land and House</button>
                    <button class="category-btn" data-category="Sansiri">Sansiri</button>
                    <button class="category-btn" data-category="SC Asset">SC Asset</button>
                    <button class="category-btn" data-category="Ap Thai">Ap Thai</button>
                    <button class="category-btn" data-category="Property Profect">Property Profect</button>
                    <button class="category-btn" data-category="MQDC">MQDC</button>
                    <button class="category-btn" data-category="QHouse">QHouse</button>
                    <button class="category-btn" data-category="Others">Others</button>
                </div>

                <div class="review-cards" id="review-container">
                    <!-- cards will be inserted dynamically -->
                </div>
                <script>
                    fetch('/HOMESPECTOR/backend/panel/api_reviews.php')
                        .then(res => res.json())
                        .then(data => {
                            const container = document.querySelector(".review-cards");
                            renderCards(data);

                            document.querySelectorAll('.category-btn').forEach(btn => {
                                btn.addEventListener('click', () => {
                                    const cat = btn.dataset.category;
                                    document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
                                    btn.classList.add('active');

                                    const filtered = cat === 'all' ? data : data.filter(r => r.category === cat);
                                    container.innerHTML = '';
                                    renderCards(filtered);
                                });
                            });

                            function renderCards(reviews) {
                                reviews.reverse().forEach(review => {
                                    const card = document.createElement('a');
                                    card.className = "card";
                                    card.setAttribute("data-category", review.category || "Others");
                                    card.href = review.url;
                                    card.innerHTML = `
                                        <img src="${review.thumbnail}" alt="${review.headline}">
                                        <p>${review.headline}</p>
                                    `;
                                    container.appendChild(card);
                                });
                            }
                        });
                </script>

                <!-- Review Cards -->
                <div class="review-cards">
                    <a href="/HOMESPECTOR/Homepage/after_review_home.html" class="card" data-category="Land and House">
                        <img src="/HOMESPECTOR/img/after_review/bugaan-bg.jpg" alt="House Review 1">
                        <p>บูก้าน กรุงเทพกรีฑา</p>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/after_review_home1.html" class="card" data-category="Sansiri">
                        <img src="/HOMESPECTOR/img/after_review/vie-bg.jpg" alt="House Review 2">
                        <p>Vie ทางด่วนรามอินทรา-วงแหวน</p>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/after_review_home2.html" class="card" data-category="SC Asset">
                        <img src="/HOMESPECTOR/img/after_review/GrandBangkok-bg.jpg" alt="House Review 3">
                        <p>Grand Bangkok Boulevard ยาร์ด บางนา</p>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/after_review_home3.html" class="card" data-category="Land and House">
                        <img src="/HOMESPECTOR/img/after_review/sarangsiri-bg.png" alt="House Review 4">
                        <p>สราญสิริ แกรนเด พุทธมณฑล สาย 3 </p>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/after_review_home4.html" class="card" data-category="QHouse">
                        <img src="/HOMESPECTOR/img/after_review/thecity-bg.jpg" alt="House Review 5">
                        <p>The City จรัญฯ – ปิ่นเกล้า </p>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/after_review_home5.html" class="card" data-category="Ap Thai">
                        <img src="/HOMESPECTOR/img/after_review/sevres.jpg" alt="House Review 6">
                        <p>คอนนาเซอร์ พัฒนาการ</p>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/after_review_home6.html" class="card"
                        data-category="Property Profect">
                        <img src="/HOMESPECTOR/img/after_review/review-bg7.jpg" alt="House Review 7">
                        <p>เศรษฐสิริ ราชพฤกษ์-สาย1 </p>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/after_review_home7.html" class="card" data-category="MQDC">
                        <img src="/HOMESPECTOR/img/after_review/review-bg8.jpg" alt="House Review 8">
                        <p>แกรนด์ บางกอก บูเลอวาร์ด แจ้งวัฒนะ-ราชพฤกษ์</p>
                    </a>
                    <a href="/HOMESPECTOR/Homepage/after_review_home8.html" class="card" data-category="Others">
                        <img src="/HOMESPECTOR/img/after_review/review-bg9.jpg" alt="House Review 9">
                        <p>บางกอก บูเลอวาร์ด ซิกเนเจอร์ แจ้งวัฒนะ-ราชพฤกษ์</p>
                    </a>
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
    <script src="/HOMESPECTOR/JS/dropdown.js"></script>
    <script src="/HOMESPECTOR/JS/footer.js"></script>
    <script src="/HOMESPECTOR/JS/footer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="/HOMESPECTOR/JS/search_ham.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>