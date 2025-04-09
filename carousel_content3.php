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
  <link rel="stylesheet" href="/HOMESPECTOR/CSS/carousel_content.css">
  <title>Header Design</title>
</head>

<body>
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
              <li><a href="/HOMESPECTOR/Homepage/ourstory.php" data-translate="nav.ourStory">ประวัติของเรา</a>
              </li>
              <li><a href="/HOMESPECTOR/Homepage/ourteam.php" data-translate="nav.ourTeam">ทีมงานของเรา</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="menu-item" data-translate="nav.service">
              บริการเสริม <span class="dropdown-icon"><i class="fa-solid fa-caret-down"></i></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/HOMESPECTOR/Homepage/app-inspector.php" data-translate="nav.app-inspector">ตรวจบ้านเอง</a>
              </li>
              <li><a href="cal-electric.html" data-translate="nav.cal-electric">คำนวณไฟฟ้า</a>
              </li>
              <li><a href="checklist.html" data-translate="nav.checklist">เทียบสเปกบ้าน</a>
              </li>
            </ul>
          </li>
          <li><a href="/HOMESPECTOR/Homepage/articles.html" data-translate="nav.articles">บทความ</a></li>
          <li><a href="/HOMESPECTOR/Homepage/Review-home.html" data-translate="nav.reviewHome">รีวิวบ้าน</a></li>
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
              <li><a href="/HOMESPECTOR/Homepage/service.php" data-translate="nav.services">บริการ</a></li>
              <li><a href="/HOMESPECTOR/Homepage/promotion.php" data-translate="nav.promotion">สิทธิพิเศษ</a></li>
              <li><a href="/HOMESPECTOR/Homepage/projects_media.html" data-translate="nav.projects">ผลงาน</a></li>

              <!-- Dropdown Menu -->
              <li class="dropdown1">
                <a href="#" class="menu-item1" data-translate="nav.aboutUs">
                  เกี่ยวกับเรา <span class="dropdown-icon1"><i class="fa-solid fa-caret-down"></i></span>
                </a>
                <ul class="dropdown-menu1">
                  <li><a href="/HOMESPECTOR/Homepage/ourstory.php" data-translate="nav.ourStory">ประวัติของเรา</a>
                  </li>
                  <li><a href="/HOMESPECTOR/Homepage/ourteam.php" data-translate="nav.ourTeam">ทีมงานของเรา</a></li>
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
              <li><a href="/HOMESPECTOR/Homepage/Review-home.html" data-translate="nav.reviewHome">รีวิวบ้าน</a></li>
              <li><a href="/HOMESPECTOR/Homepage/review_interior.php"
                  data-translate="nav.reviewInterior">บริการตกแต่งภายใน</a></li>
              <li><a href="/HOMESPECTOR/Homepage/joinwithus.php" data-translate="nav.joinUs">รวมงานกับเรา</a></li>
              <li><a href="/HOMESPECTOR/Homepage/Contactus.php" data-translate="nav.contact">ติดต่อเรา</a></li>
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

    <?php
            $pdo = new PDO("mysql:host=localhost;dbname=homespector;charset=utf8", "username", "password");

            // Fetch main section
            $main = $pdo->query("SELECT * FROM carousel_main_content3 WHERE id = 1")->fetch();

            // Fetch all episodes
            $episodes = $pdo->query("SELECT * FROM carousel_episodes3 ORDER BY created_at DESC")->fetchAll();
        ?>
    <div class="carousel_content">
      <section class="main-content">
        <!-- Left Side: Main Content -->
        <div class="left-image">
          <img src="<?= htmlspecialchars($main['thumbnail_url']) ?>" alt="Main Talk Image" class="main-image">
          <div class="left-content">
            <h1>
              <?= htmlspecialchars($main['title']) ?>
            </h1>
            <p class="main-description">
              <?= htmlspecialchars($main['description']) ?>
            </p>
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
          </div>
        </div>


        <!-- Right Side: Episodes -->
        <div class="right-episodes">
          <h2 class="section-title">All Episodes</h2>
          <div class="episodes-list">
            <?php foreach ($episodes as $ep): ?>
            <div class="episode">
              <div class="video-container">
                <iframe src="<?= htmlspecialchars($ep['youtube_url']) ?>" title="<?= htmlspecialchars($ep['title']) ?>"
                  allowfullscreen></iframe>
              </div>
              <div class="episode-info">
                <h3>
                  <?= htmlspecialchars($ep['title']) ?>
                </h3>
                <p>
                  <?= htmlspecialchars($ep['description']) ?>
                </p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
      <section class="tag-content">
        <!-- Tags Section -->
        <div class="tags-section">
          <div class="tags">
            <a href="#" class="tag" data-tag="SCASSET">SCASSET</a>
            <a href="#" class="tag" data-tag="ตตรวจบ้าน">ตตรวจบ้าน</a>
            <a href="#" class="tag" data-tag="รีวิวบ้าน">รีวิวบ้าน</a>
            <a href="#" class="tag" data-tag="GrandBangkokBoulevardPinklaoBoroma">GrandBangkokBoulevardPinklaoBorom</a>
            <a href="#" class="tag" data-tag="การตลาดวันละหลัง">การตลาดวันละหลัง</a>
          </div>
        </div>
        <div id="video-list" class="video-list">
          <!-- Filtered videos will appear here -->
        </div>
      </section>
    </div>


    <section class="carousel-content">
      <h2>Other Contents</h2>
      <div class="content-carousel-container">
        <button class="carousel-btn prev-btn">❮</button>
        <div class="content-carousel" id="carousel-wrapper">
          <!-- Cards will be injected here via JavaScript -->
        </div>
        <button class="carousel-btn next-btn">❯</button>
      </div>
    </section>


    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const wrapper = document.getElementById("carousel-wrapper");

        // Static content
        const staticContents = [
          {
            title: "รีวิวตรวจบ้านดารา เซเลบ อินฟลู",
            url: "/HOMESPECTOR/Homepage/carousel_content.php",
            image: "/HOMESPECTOR/img/thumbnail4.jpg",
            desc: "รีวิวการตรวจบ้านเดี่ยว พระเอกดัง!!"
          },
          {
            title: "ต.ตรวจบ้าน x การตลาดวันละตอน",
            url: "/HOMESPECTOR/Homepage/carousel_content1.php",
            image: "/HOMESPECTOR/img/carousel_thumb1.jpg",
            desc: "พาดูบ้านหรู 89 ล้าน!"
          },
          {
            title: "สุดพิเศษ! พาดูบ้านหรู",
            url: "/HOMESPECTOR/Homepage/carousel_content2.php",
            image: "/HOMESPECTOR/img/thumbnail3.jpg",
            desc: "รีวิวตรวจบ้านหรู 40ล้าน! CEO #บุญนำพา"
          },
          {
            title: "ตรวจบ้านก่อนโอน by ต.ตรวจบ้าน",
            url: "/HOMESPECTOR/Homepage/carousel_content3.php",
            image: "/HOMESPECTOR/img/carousel_thumb2.jpg",
            desc: "ตรวจบ้านก่อนโอน by ต.ตรวจบ้าน..."
          },
          {
            title: "ประกันภัยบ้าน แฮปปี้โฮม ธนชาต",
            url: "/HOMESPECTOR/Homepage/carousel_content4.php",
            image: "/HOMESPECTOR/img/warentty.jpg",
            desc: "ช่วงนี้หน้าฝน อย่ามองข้ามสิ่งนี้🏡⛈️"
          }
        ];

        // Fetch from API and merge with static
        fetch("/HOMESPECTOR/backend/panel/api_admin_content.php")
          .then(res => res.json())
          .then(({ contents }) => {
            const combined = [...staticContents, ...contents];
            const shuffled = combined.sort(() => 0.5 - Math.random());
            const selected = shuffled.slice(0, Math.floor(Math.random() * 4) + 5); // 5–8

            selected.forEach(item => {
              const card = document.createElement("a");
              card.className = "content-carousel-item";
              card.href = item.link_url || item.url;
              card.innerHTML = `
                  <img src="${item.image_url || item.image}" alt="${item.title}">
                  <div class="content-carousel-info">
                  <h3>${item.title}</h3>
                  <p>${item.desc || ""}</p>
                  </div>
              `;
              wrapper.appendChild(card);
            });
          });

        // Scroll controls
        document.querySelector(".prev-btn").onclick = () => {
          wrapper.scrollBy({ left: -300, behavior: 'smooth' });
        };
        document.querySelector(".next-btn").onclick = () => {
          wrapper.scrollBy({ left: 300, behavior: 'smooth' });
        };
      });
    </script>



    <footer class="footer">
      <div class="footer-container">
        <!-- Left Section: Social Media & Branding -->
        <div class="footer-left">
          <!-- <h2>HomeInspector</h2> -->
          <img src="/HOMESPECTOR/img/footer_logo.png" alt="HomeInspector Logo" class="footer-logo">
          <div class="social-icons">
            <a href="https://www.facebook.com/t.homeinspector/" target="_blank"><img src="/HOMESPECTOR/icon/ICON/Fb.png"
                alt="Facebook"></a>
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
  <script src="/HOMESPECTOR/JS/share_icon.js"></script>
  <script src="/HOMESPECTOR/JS/content_carousel.js"></script>
  <script src="/HOMESPECTOR/JS/search_ham.js"></script>
  <script src="/HOMESPECTOR/JS/tag.js"></script>
  <script src="/HOMESPECTOR/JS/footer.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>