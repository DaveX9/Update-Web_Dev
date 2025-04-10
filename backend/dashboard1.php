<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Home Inspection</title>
</head>
<style>
    /* Global Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        display: flex;
        background: #f4f4f4;
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background: #2c3e50;
        color: #fff;
        padding: 20px;
        position: fixed;
        height: 100%;
        left: 0;
        top: 0;
        display: flex;
        flex-direction: column;
        justify-content: flex-start; /* Align content to the top */
    }

    /* User Profile */
    .user-profile {
        text-align: center;
        padding: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 10px;/*Reducespace*/;
    }

    .user-profile img{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
    }
    .user-profile p {
        font-size: 16px;
    }

    .user-profile strong {
        color: #f1c40f;
    }

    /* Sidebar Navigation */

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin-top: 10px; /* Adjust this to move the menu up */
    }

    .sidebar ul li {
        margin: 5px 0; /* Reduce spacing between items */
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #fff;
        display: block;
        padding: 10px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .sidebar ul li a:hover {
        background: #34495e;
    }

    /* Move Login & Logout Buttons Down */
    .auth-buttons {
        text-align: center;
        margin-top: auto; /* Push to bottom */
        padding-bottom: 20px; /* Ensure some spacing */
    }
    /* Dropdown Menu */
    .dropdown-menu {
        display: none;
        padding-left: 20px;
        list-style: none;
        background-color: rgb(0, 0, 0);
    }

    .dropdown-menu li a {
        display: block;
        padding: 8px 20px;
        font-size: 14px;
        text-decoration: none;
        color: #333;
        transition: 0.3s;
    }

    .dropdown-menu li a:hover {
        background: #007bff;
        color: #ffffff;
    }

    /* Arrow Icon */
    .arrow {
        font-size: 14px;
        transition: 0.3s;
    }

    .auth-buttons .btn-login,
    .auth-buttons .btn-logout {
        display: block;
        width: 80%;
        padding: 10px;
        margin: 5px auto;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        transition: 0.3s;
    }

    .btn-login {
        background: #27ae60;
        color: white;
    }

    .btn-login:hover {
        background: #2ecc71;
    }

    .btn-logout {
        background: #c0392b;
        color: white;
    }

    .btn-logout:hover {
        background: #e74c3c;
    }

    /* Main Content */
    .main-content {
        margin-left: 260px;
        padding: 20px;
        flex: 1;
    }

    /* Header */
    header {
        background: #fff;
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Hero Section */
    .hero {
        position: relative;
        background: #1e90ff;
        color: white;
        padding: 50px 20px;
        text-align: center;
        border-radius: 10px;
        overflow: hidden;
    }

    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/HOMESPECTOR/img/hero-bg1.jpg') center/cover no-repeat;
        opacity: 0.5;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero h1 {
        font-size: 32px;
        font-weight: bold;
    }

    .hero p {
        font-size: 18px;
        margin-top: 10px;
    }

    /* Services Section */
    .services {
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        margin-top: 20px;
    }

    .services-header h2 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .service-card {
        background: #f8f9fa;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .service-icon img {
        width: 80px;
        margin-bottom: 10px;
    }

    .stats-section {
        padding: 80px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        box-sizing: border-box;
        width: 100%;
    }

    .content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        gap: 20px;
        box-sizing: border-box;
    }

    .section-title {
        font-size: 2.5em;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .section-subtitle {
        font-size: 1.2em;
        color: #555;
        margin-bottom: 20px;
        line-height: 1.6;
    }



    .stats-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
    }


    .stat-box {
        background-color: #f0f8ff;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 150px;
        height: 200px;
    }

    .stat-box img {
        width: 40px;
        height: 40px;
        margin: 10px 0;
    }


    .stat-box h2 {
        font-size: 2.2em;
        color: #007bff;
        margin: 0;
    }


    .stat-box p {
        font-size: 1em;
        color: #555;
        margin-top: 5px;
    }

    /* FAQ Section */
    .faq {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        margin-top: 20px;
    }

    .faq-title {
        font-size: 22px;
        margin-bottom: 15px;
    }

    .faq-item {
        margin-bottom: 15px;
    }

    .faq-question {
        width: 100%;
        background: #3498db;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        text-align: left;
        border-radius: 5px;
    }

    .faq-question .icon {
        float: right;
        font-weight: bold;
    }

    .faq-answer {
        display: none;
        padding: 10px;
        background: #ecf0f1;
        border-radius: 5px;
        margin-top: 5px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .sidebar {
            width: 200px;
        }

        .main-content {
            margin-left: 210px;
        }

        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }
    }

    @media (max-width: 576px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .main-content {
            margin-left: 0;
        }

        .hero h1 {
            font-size: 24px;
        }

        .hero p {
            font-size: 16px;
        }

        .services-grid {
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        }
    }

</style>

<body>
    <!-- Sidebar (if any) -->
    <aside class="sidebar">
        <div class="user-profile">
            <img src="/HOMESPECTOR/icon/ICON/admin.png" alt="User Avatar">
            <p>Hi, <strong>Admin</strong></p>
        </div>
        <ul class="nav-list">
            <li class="nav-item"><a href="/HOMESPECTOR/backend/dashboard1.php" class="nav-link"><i class="fas fa-tools"></i>Dashboard</a>
            </li>
            <li class="nav-item"><a href="/HOMESPECTOR/backend/panel/admin_line_section.php" class="nav-link"><i class="fas fa-tools"></i>Line Id</a>
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
                        <a href="Hinterior.php">
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