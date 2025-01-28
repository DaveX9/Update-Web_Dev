<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<div class="form-container">
    <h1>Manage Promotions</h1>

    <!-- Contact Information -->
    <form id="contact-form">
        <h2>Contact Information</h2>
        <div class="form-group">
            <label for="contact-phone">Phone:</label>
            <input type="text" id="contact-phone" name="contact_phone" value="โทร 02-454-2043" />
        </div>
        <div class="form-group">
            <label for="contact-line">Line ID:</label>
            <input type="text" id="contact-line" name="contact_line" value="@t.home" />
        </div>
    </form>

    <!-- Promotion Carousel -->
    <form id="carousel-form" enctype="multipart/form-data">
        <h2>Promotion Carousel</h2>
        <div id="carousel-images">
            <div class="form-group">
                <label>Slide 1:</label>
                <img src="/HOMESPECTOR/img/promotion1.jpg" alt="Slide 1" style="max-width: 200px;" />
                <input type="file" name="carousel_images[]" accept="image/*" />
            </div>
            <div class="form-group">
                <label>Slide 2:</label>
                <img src="/HOMESPECTOR/img/promotion1.1.jpg" alt="Slide 2" style="max-width: 200px;" />
                <input type="file" name="carousel_images[]" accept="image/*" />
            </div>
            <div class="form-group">
                <label>Slide 3:</label>
                <img src="/HOMESPECTOR/img/promotion1.2.jpg" alt="Slide 3" style="max-width: 200px;" />
                <input type="file" name="carousel_images[]" accept="image/*" />
            </div>
        </div>
        <button type="button" id="add-carousel-btn">Add New Slide</button>
    </form>

    <!-- Description Section -->
    <form id="description-form">
        <h2>Promotion Description</h2>
        <div id="service-features">
            <div class="form-group">
                <label for="feature-1">Feature 1:</label>
                <input type="text" id="feature-1" name="service_features[]" value="โปรดแสดงหน้าจอนี้ต่อพนักงาน หรือ แจ้งทาง Line ด้วยการสแกนโค้ด เพื่อใช้สิทธิพิเศษพิเศษ" />
            </div>
            <div class="form-group">
                <label for="feature-2">Feature 2:</label>
                <input type="text" id="feature-2" name="service_features[]" value="รับสิทธิพิเศษ ต.ตกแต่ง ฟรี 3 รายการ" />
            </div>
            <div class="form-group">
                <label for="feature-3">Feature 3:</label>
                <input type="text" id="feature-3" name="service_features[]" value="(ทำแบบ 3D ให้ฟรีทันที 3 รูป / บริการวัดหน้างานฟรี / ส่วนลดค่าเฟ้น และฟิล์ม 10%)" />
            </div>
            <div class="form-group">
                <label for="feature-4">Feature 4:</label>
                <input type="text" id="feature-4" name="service_features[]" value="สิทธิพิเศษนี้ใช้ได้เมื่อ เข้าใช้บริการกับ ต.ตกแต่ง" />
            </div>
        </div>
    </form>

    <!-- Promotion Cards -->
    <form id="promotion-cards-form" enctype="multipart/form-data">
        <h2>Promotion Cards</h2>
        <div id="promotion-cards">
            <div class="form-group card-group">
                <h3>Promotion 1</h3>
                <label for="promotion-title-1">Title:</label>
                <input type="text" id="promotion-title-1" name="promotion_titles[]" value="รับสิทธิ์พิเศษ ต.ตกแต่ง ฟรี 3 รายการ" />
                <label for="promotion-image-1">Image:</label>
                <img src="/HOMESPECTOR/img/promotion1.jpg" alt="Promotion 1" style="max-width: 200px;" />
                <input type="file" id="promotion-image-1" name="promotion_images[]" accept="image/*" />
            </div>

            <div class="form-group card-group">
                <h3>Promotion 2</h3>
                <label for="promotion-title-2">Title:</label>
                <input type="text" id="promotion-title-2" name="promotion_titles[]" value="ตรวจบ้านสบายใจทำบุญบ้านได้ง่ายๆ" />
                <label for="promotion-image-2">Image:</label>
                <img src="/HOMESPECTOR/img/promotion2.jpg" alt="Promotion 2" style="max-width: 200px;" />
                <input type="file" id="promotion-image-2" name="promotion_images[]" accept="image/*" />
            </div>

            <div class="form-group card-group">
                <h3>Promotion 3</h3>
                <label for="promotion-title-3">Title:</label>
                <input type="text" id="promotion-title-3" name="promotion_titles[]" value="สำหรับลูกค้า ต.ตรวจบ้าน รับเลย!" />
                <label for="promotion-image-3">Image:</label>
                <img src="/HOMESPECTOR/img/promotion3.jpg" alt="Promotion 3" style="max-width: 200px;" />
                <input type="file" id="promotion-image-3" name="promotion_images[]" accept="image/*" />
            </div>
        </div>
        <button type="button" id="add-promotion-btn">Add New Promotion</button>
    </form>

    <div class="button-container">
        <button type="submit" id="save-btn" class="save-btn">Save Changes</button>
        <button type="button" class="cancel-btn" onclick="window.location.reload();">Cancel</button>
    </div>
</div>

<script>
    // Add New Carousel Slide
    document.getElementById('add-carousel-btn').addEventListener('click', function () {
        const carouselContainer = document.getElementById('carousel-images');
        const newSlideIndex = carouselContainer.children.length + 1;

        const newSlideHTML = `
            <div class="form-group">
                <label>Slide ${newSlideIndex}:</label>
                <input type="file" name="carousel_images[]" accept="image/*" />
            </div>
        `;

        carouselContainer.insertAdjacentHTML('beforeend', newSlideHTML);
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

    // Save Promotions
    document.getElementById('save-btn').addEventListener('click', function (e) {
        e.preventDefault();
        const formData = new FormData(document.getElementById('promotion-cards-form'));
        fetch('save-promo1.php', { method: 'POST', body: formData })
            .then(response => response.json())
            .then(data => alert(data.message))
            .catch(error => alert('Failed to save changes.'));
    });
</script>

<?php include 'footer.php'; ?>
