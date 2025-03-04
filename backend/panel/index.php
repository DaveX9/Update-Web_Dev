<?php
include 'db.php';

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
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/ourteam.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <title>Document</title>
</head>
<body>
<section class="about">
    <div class="about-container">
        <?php echo getContent('about'); ?>
    </div>
</section>

<section class="our-founders">
    <div class="founders-container">
        <?php echo getContent('founders'); ?>
    </div>
</section>

<section class="team-section">
    <div class="team-container">
        <?php echo getContent('team'); ?>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const carousel = document.getElementById("carousel");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");
            const teamMembers = document.querySelectorAll(".team-member");
            const visibleItems = 4;
            let currentIndex = 0;

            function updateCarousel() {
                const offset = -(currentIndex * teamMembers[0].offsetWidth + 20 * currentIndex);
                carousel.style.transform = `translateX(${offset}px)`;
            }

            prevBtn.addEventListener("click", () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateCarousel();
                }
            });

            nextBtn.addEventListener("click", () => {
                if (currentIndex < teamMembers.length - visibleItems) {
                    currentIndex++;
                    updateCarousel();
                }
            });
        });
    </script>
</body>
</html>

