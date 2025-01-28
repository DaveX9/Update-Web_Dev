<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<?php
// Fetch existing data from database (Replace with actual database connection)
$default_contact_phone = "โทร 02-454-2043";
$default_contact_line = "@t.home";

$default_description = [
    "ส่วนลดพิเศษ 10% สำหรับร้านบุฟเฟ่ต์ BNP Cuisine",
    "โปรดแสดงคูปองส่วนลดนี้ให้พนักงานหน้าเคาน์เตอร์",
    "ส่วนลดพิเศษนี้สามารถใช้ได้ทันทีไม่มีขั้นต่ำ",
    "*เงื่อนไขเป็นไปตามที่บริษัทกำหนด"
];

$default_promotions = [
    ["title" => "รับสิทธิ์พิเศษ ต.ตกแต่ง ฟรี 3 รายการ", "image" => "/HOMESPECTOR/img/promotion1.jpg"],
    ["title" => "ตรวจบ้านสบายใจทำบุญบ้านได้ง่ายๆ", "image" => "/HOMESPECTOR/img/promotion2.jpg"],
    ["title" => "สำหรับลูกค้า ต.ตรวจบ้าน รับเลย!", "image" => "/HOMESPECTOR/img/promotion3.jpg"]
];

$default_carousel_images = [
    "/HOMESPECTOR/img/promotion3.jpg",
    "/HOMESPECTOR/img/promotion3.1.jpg",
    "/HOMESPECTOR/img/promotion3.2.jpg"
];
?>

<div class="form-container">
    <h1>Manage Promotions</h1>

    <!-- Contact Information -->
    <form id="contact-form">
        <h2>Contact Information</h2>
        <div class="form-group">
            <label for="contact-phone">Phone:</label>
            <input type="text" id="contact-phone" name="contact_phone" value="<?= $default_contact_phone ?>" />
        </div>
        <div class="form-group">
            <label for="contact-line">Line ID:</label>
            <input type="text" id="contact-line" name="contact_line" value="<?= $default_contact_line ?>" />
        </div>
    </form>

    <!-- Promotion Carousel Upload -->
    <form id="carousel-form" enctype="multipart/form-data">
        <h2>Promotion Carousel</h2>
        <div id="carousel-images">
            <?php foreach ($default_carousel_images as $index => $image): ?>
                <div class="form-group">
                    <label>Slide <?= $index + 1 ?>:</label>
                    <img src="<?= $image ?>" alt="Slide <?= $index + 1 ?>" style="max-width: 200px;" />
                    <input type="file" name="carousel_images[]" accept="image/*" />
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" id="add-slide-btn">Add New Slide</button>
    </form>

    <!-- Promotion Description -->
    <form id="description-form">
        <h2>Promotion Description</h2>
        <div id="service-features">
            <?php foreach ($default_description as $index => $desc): ?>
                <div class="form-group">
                    <label for="feature-<?= $index + 1 ?>">Feature <?= $index + 1 ?>:</label>
                    <input type="text" id="feature-<?= $index + 1 ?>" name="service_features[]" value="<?= $desc ?>" />
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" id="add-feature-btn">Add New Feature</button>
    </form>

    <!-- Promotion Cards -->
    <form id="promotion-cards-form" enctype="multipart/form-data">
        <h2>Promotion Cards</h2>
        <div id="promotion-cards">
            <?php foreach ($default_promotions as $index => $promotion): ?>
                <div class="form-group card-group">
                    <h3>Promotion <?= $index + 1 ?></h3>
                    <label for="promotion-title-<?= $index + 1 ?>">Title:</label>
                    <input type="text" id="promotion-title-<?= $index + 1 ?>" name="promotion_titles[]" value="<?= $promotion['title'] ?>" />
                    <label for="promotion-image-<?= $index + 1 ?>">Image:</label>
                    <img src="<?= $promotion['image'] ?>" alt="Promotion <?= $index + 1 ?>" style="max-width: 200px;" />
                    <input type="file" id="promotion-image-<?= $index + 1 ?>" name="promotion_images[]" accept="image/*" />
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" id="add-promotion-btn">Add New Promotion</button>
    </form>

    <div class="button-container">
        <button type="submit" id="save-btn" class="save-btn">Save Changes</button>
        <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
    </div>
</div>

<script>
// Add New Feature
document.getElementById('add-feature-btn').addEventListener('click', function () {
    const featureContainer = document.getElementById('service-features');
    const newFeatureIndex = featureContainer.children.length + 1;

    const newFeatureHTML = `
        <div class="form-group">
            <label for="feature-${newFeatureIndex}">Feature ${newFeatureIndex}:</label>
            <input type="text" id="feature-${newFeatureIndex}" name="service_features[]" placeholder="Enter feature description" />
        </div>
    `;
    featureContainer.insertAdjacentHTML('beforeend', newFeatureHTML);
});

// Add New Promotion
document.getElementById('add-promotion-btn').addEventListener('click', function () {
    const promotionContainer = document.getElementById('promotion-cards');
    const newCardIndex = promotionContainer.children.length + 1;

    const newCardHTML = `
        <div class="form-group card-group">
            <h3>Promotion ${newCardIndex}</h3>
            <label for="promotion-title-${newCardIndex}">Title:</label>
            <input type="text" id="promotion-title-${newCardIndex}" name="promotion_titles[]" placeholder="Enter promotion title" />
            <label for="promotion-image-${newCardIndex}">Image:</label>
            <input type="file" id="promotion-image-${newCardIndex}" name="promotion_images[]" accept="image/*" />
        </div>
    `;

    promotionContainer.insertAdjacentHTML('beforeend', newCardHTML);
    });

    // Save Data
    document.getElementById('save-btn').addEventListener('click', function (e) {
        e.preventDefault();

        const contactFormData = new FormData(document.getElementById('contact-form'));
        const carouselFormData = new FormData(document.getElementById('carousel-form'));
        const promotionFormData = new FormData(document.getElementById('promotion-cards-form'));
        const descriptionFormData = new FormData(document.getElementById('description-form'));

        for (const [key, value] of carouselFormData.entries()) {
            contactFormData.append(key, value);
        }
        for (const [key, value] of promotionFormData.entries()) {
            contactFormData.append(key, value);
        }
        for (const [key, value] of descriptionFormData.entries()) {
            contactFormData.append(key, value);
        }

        fetch('save-promo3.php', {
            method: 'POST',
            body: contactFormData,
        })
            .then((response) => response.json())
            .then((data) => {
                alert(data.message);
            })
            .catch((error) => {
                console.error('Error saving data:', error);
                alert('Failed to save changes.');
            });
    });
</script>

<?php include 'footer.php'; ?>
