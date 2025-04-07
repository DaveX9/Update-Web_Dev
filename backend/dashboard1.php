
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Home Inspection</title>
    <link rel="stylesheet" href="/HOMESPECTOR/backend/css/dashboard1.css">
</head>

<body>
    <!-- Sidebar (if any) -->
    <aside class="sidebar">
        <div class="user-profile">
            <img src="/HOMESPECTOR/icon/ICON/admin.png" alt="User Avatar">
            <p>Hi, <strong>Admin</strong></p>
        </div>
        <ul class="nav-list">
            <li class="nav-item"><a href="dashboard1.html" class="nav-link"><i class="fas fa-tools"></i>Dashboard</a>
            </li>

            <!-- Home Dropdown -->
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="toggleDropdown('homeDropdown')">
                    <i class="fas fa-home"></i> Home
                    <span class="arrow">&#9662;</span>
                </a>
                <ul class="dropdown-menu" id="homeDropdown">
                    <li><a href="/HOMESPECTOR/backend/panel/admin_index_hero.php">Hero Section</a></li>
                    <li><a href="/HOMESPECTOR/backend/panel/admin_index_service.php">Service Section</a></li>
                    <li><a href="/HOMESPECTOR/backend/panel/admin_why_choose_us.php">why-choose-us</a></li>
                    <li><a href="http://localhost/HOMESPECTOR/backend/panel/admin_index_reviews.php">Review Stats </a></li>
                    <li><a href="/HOMESPECTOR/backend/panel/admin_faqs.php">FAQs Section </a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="toggleDropdown('ContentDropdown')">
                    <i class="fas fa-users"></i> Content
                    <span class="arrow">&#9662;</span>
                </a>
                <ul class="dropdown-menu" id="ContentDropdown">
                    <li><a href="/HOMESPECTOR/backend/panel/admin_content_carousel.php" data-translate="nav.ourStory">Content Carousel</a>
                    </li>
                    <li><a href="/HOMESPECTOR/backend/panel/all_content.php" data-translate="nav.ourTeam">Content Section</a>
                    </li>
                </ul>
            </li>
            <!-- Services Dropdown -->
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="toggleDropdown('ServicesDropdown')">
                    <i class="fas fa-users"></i> Services
                    <span class="arrow">&#9662;</span>
                </a>
                <ul class="dropdown-menu" id="ServicesDropdown">
                    <li><a href="/HOMESPECTOR/backend/panel/admin_services.php"
                            data-translate="nav.services">Services</a>
                    </li>
                    <li><a href="/HOMESPECTOR/backend/panel/admin_service1.php" data-translate="nav.services">T. Home
                            Inspector</a>
                    </li>
                    <!-- <li><a href="/HOMESPECTOR/backend/panel/admin_Interior.php" data-translate="nav.services">T. Home Interior</a> -->
            </li>
            <li><a href="/HOMESPECTOR/backend/panel/admin_const.php" data-translate="nav.services">T. Home
                    Construction</a></li>
            <li><a href="/HOMESPECTOR/backend/panel/admin_hbulter.php" data-translate="nav.services">Home Butler</a>
            </li>
        </ul>
        </li>
        <li class="nav-item"><a href="/HOMESPECTOR/backend/panel/admin_promotion.php" class="nav-link"><i
                    class="fas fa-tags"></i> Promotion</a>
        </li>

        <!-- About Us Dropdown -->
        <li class="nav-item">
            <a href="#" class="nav-link" onclick="toggleDropdown('aboutDropdown')">
                <i class="fas fa-info-circle"></i> About Us
                <span class="arrow">&#9662;</span>
            </a>
            <ul class="dropdown-menu" id="aboutDropdown">
                <li><a href="/HOMESPECTOR/backend/panel/admin_ourstory.php">Our Story</a></li>
                <li><a href="/HOMESPECTOR/backend/panel/admin_ourteam.php">Our Team</a></li>
            </ul>
        </li>
        <!-- additional services Dropdown -->
        <li class="nav-item">
            <a href="#" class="nav-link" onclick="toggleDropdown('additional services Dropdown')">
                <i class="fas fa-plus-circle"></i> Additional Services
                <span class="arrow">&#9662;</span>
            </a>
            <ul class="dropdown-menu" id="additional services Dropdown">
                <li><a href="/HOMESPECTOR/backend/panel/admin_newapp.php">app-inspector</a></li>
                <li><a href="#">cal-electric</a></li>
                <li><a href="#">checklist</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="/HOMESPECTOR/backend/panel/admin_article.php" class="nav-link"><i
                    class="fas fa-newspaper"></i> Articles</a>
        </li>
        <li class="nav-item"><a href="/HOMESPECTOR/backend/panel/admin_reviews.php" class="nav-link"><i
                    class="fas fa-home"></i> House_Review</a></li>
        <li class="nav-item"><a href="/HOMESPECTOR/backend/panel/admin_interior1.php" class="nav-link"><i
                    class="fas fa-couch"></i> House_Interior</a></li>
        <!-- Join With Us Dropdown -->
        <li class="nav-item">
            <a href="#" class="nav-link" onclick="toggleDropdown('joinDropdown')">
                <i class="fas fa-users"></i> Join With Us
                <span class="arrow">&#9662;</span>
            </a>
            <ul class="dropdown-menu" id="joinDropdown">
                <li><a href="/HOMESPECTOR/backend/panel/admin_joinus.php" data-translate="nav.ourStory">รวมงานกับเรา</a>
                </li>
                <li><a href="/HOMESPECTOR/backend/panel/admin_job1.php" data-translate="nav.ourTeam">Job-details</a>
                </li>
                <li><a href="/HOMESPECTOR/backend/panel/admin_manage_jobs.php" data-translate="nav.ourTeam">Manage
                        Jobs</a></li>
            </ul>
        </li>

        <li class="nav-item"><a href="/HOMESPECTOR/backend/panel/admin_contact.php" class="nav-link"><i
                    class="fas fa-envelope"></i> Contact
                Us</a></li>
        </ul>
        <div class="auth-buttons">
            <!-- <a href="login.html" class="btn-login">Login</a> -->
            <a href="/HOMESPECTOR/backend/logout.php" class="btn-logout">Logout</a>
        </div>
    </aside>


    <!-- Main Content -->
    <main class="main-content">
        <header>
            <h1>Dashboard Overview</h1>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-bg" id="hero-bg"></div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 id="hero-title">Thailand’s No.1 <br><span></span></h1>
                <p id="hero-subtitle">Home Inspection Company.</p>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services">
            <div class="services-header" data-aos="fade-up">
                <h2>Our Services</h2>
            </div>
            <div class="services-grid">
                <div class="service-card" data-aos="fade-up-right">
                    <div class="service-icon">
                        <a href="service1.html">
                            <img src="/HOMESPECTOR/img/s1.png" alt="T. Home Inspector">
                        </a>
                    </div>
                    <h3>T. Home Inspector</h3>
                </div>
                <div class="service-card" data-aos="fade-up">
                    <div class="service-icon">
                        <a href="hinterior.html">
                            <img src="/HOMESPECTOR/img/s2.png" alt="T. Home Interior">
                        </a>
                    </div>
                    <h3>T. Home Interior</h3>
                </div>
                <div class="service-card" data-aos="fade-up">
                    <div class="service-icon">
                        <a href="/HOMESPECTOR/Hconstruction.html">
                            <img src="/HOMESPECTOR/img/s3.png" alt="T. Home Construction">
                        </a>
                    </div>
                    <h3>T. Home Construction</h3>
                </div>

                <!-- Service 4 -->
                <div class="service-card" data-aos="fade-up-left">
                    <div class="service-icon">
                        <a href="/HOMESPECTOR/Hbulter.html">
                            <img src="/HOMESPECTOR/img/s4-bg.png" alt="Home Butler">
                        </a>
                    </div>
                    <h3>Home Butler</h3>
                </div>
            </div>
        </section>


    </main>
    <script>
        function toggleDropdown(id) {
            let dropdown = document.getElementById(id);
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }

    </script>
</body>

</html>