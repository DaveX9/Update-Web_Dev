<?php
$conn = new mysqli("localhost", "root", "", "homespector");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch services content
$sql_services = "SELECT content FROM hconstruction WHERE section = 'services'";
$result_services = $conn->query($sql_services);
$row_services = $result_services->fetch_assoc();

// Fetch carousel content
$sql_carousel = "SELECT content FROM hconstruction WHERE section = 'carousel'";
$result_carousel = $conn->query($sql_carousel);
$row_carousel = $result_carousel->fetch_assoc();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/allservice.css">
</head>
<body>

    <!-- 🏠 Services Section -->
    <section class="services">
        <div class="services container">
            <div class="service-content">
                <?php echo $row_services['content']; ?>
            </div>
        </div>
    </section>

    <!-- 🎞️ Carousel Section -->
    <section class="carousel2 py-4">
            <div class="carousel slide">
                <div class="carousel-inner">
                    <?php echo $row_carousel['content']; ?>
                </div>
                <!-- Previous Button -->
                <button class="carousel-control-prev" type="button" data-bs-target="#customCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"
                        style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; width: 40px; height: 40px;"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                    <!-- Next Button -->
                <button class="carousel-control-next" type="button" data-bs-target="#customCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"
                        style="background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; width: 40px; height: 40px;"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
