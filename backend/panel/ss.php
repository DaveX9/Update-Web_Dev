<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homespector";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all sections
$result = $conn->query("SELECT * FROM services");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['section']] = htmlspecialchars_decode($row['content']);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Inspector</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- FontAwesome (For Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="/HOMESPECTOR/CSS/service.css">

    <!-- Bootstrap JS (for Carousel) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <!-- Services Section -->
    <section class="services1">
        <div class="services-container">
            <?php echo $data['services']; ?>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="carousel2 py-4">
        <div class="carousel slide">
            <div class="carousel-inner">
                <?php echo $data['carousel']; ?>
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

</body>
</html>
