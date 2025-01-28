<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<div class="form-container">
    <h1>Manage Services, Banner, and Carousel</h1>

    <!-- Services Section -->
    <form id="services-form">
        <h2>Services Details</h2>
        <div class="form-group">
            <label for="service-title">Service Title:</label>
            <input type="text" id="service-title" name="service_title" value="ต. ตรวจบ้าน รับตรวจรับบ้านและคอนโดก่อนโอนกรรมสิทธิ์" />
        </div>
        <div class="form-group">
            <label for="service-description">Description:</label>
            <textarea id="service-description" name="service_description">ต.ตกแต่ง ยินดีให้คำปรึกษา ... บิ้วอินเฟอร์นิเจอร์ ตกแต่งภายในทุกรูปแบบ...</textarea>
        </div>

        <!-- Editable List Items -->
        <h2>Service Features</h2>
        <div id="service-features">
            <div class="form-group">
                <label for="feature-1">Feature 1:</label>
                <input type="text" id="feature-1" name="service_features[]" value="งานออกแบบสวยงามและใช้งานได้จริง" />
            </div>
            <div class="form-group">
                <label for="feature-2">Feature 2:</label>
                <input type="text" id="feature-2" name="service_features[]" value="ออกแบบโดยยึดถือ lifestyle ของลูกค้าเป็นหลัก" />
            </div>
            <div class="form-group">
                <label for="feature-3">Feature 3:</label>
                <input type="text" id="feature-3" name="service_features[]" value="บริการด้วยใจพร้อมแบ่งปันความรู้" />
            </div>
        </div>
        <button type="button" id="add-feature-btn">Add New Feature</button>

        <!-- Contact Information -->
        <h2>Contact Information</h2>
        <div class="form-group">
            <label for="contact-admin">Admin Contact:</label>
            <input type="text" id="contact-admin" name="contact_admin" value="082-045-6165, 02-301-0283" />
        </div>
        <div class="form-group">
            <label for="contact-thep">Thep Contact:</label>
            <input type="text" id="contact-thep" name="contact_thep" value="082-669-9666" />
        </div>
        <div class="form-group">
            <label for="contact-mes">Mes Contact:</label>
            <input type="text" id="contact-mes" name="contact_mes" value="086-500-0019" />
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address">2043 Soi Kanchanaphisek 008, Bangkae, Bangkae Bangkok 10160 Thailand</textarea>
        </div>

        <!-- Social Links -->
        <h2>Social Links</h2>
        <div class="form-group">
            <label for="facebook-link">Facebook Link:</label>
            <input type="url" id="facebook-link" name="facebook_link" value="https://www.facebook.com/t.homeinspector/?locale=th_TH" />
        </div>
        <div class="form-group">
            <label for="instagram-link">Instagram Link:</label>
            <input type="url" id="instagram-link" name="instagram_link" value="https://www.instagram.com/t.homeinspector/" />
        </div>
        <div class="form-group">
            <label for="line-link">Line Link:</label>
            <input type="url" id="line-link" name="line_link" value="https://page.line.me/t.home?openQrModal=true" />
        </div>
    </form>

    <!-- Banner Section -->
    <form id="banner-form" enctype="multipart/form-data">
        <h2>Service Banner</h2>
        <div class="form-group">
            <label for="banner-upload">Banner Image:</label>
            <img src="/HOMESPECTOR/img/ourservice.png" alt="Service Banner" id="banner-preview" style="max-width: 300px;" />
            <input type="file" id="banner-upload" name="banner_image" accept="image/*" />
        </div>
    </form>

    <!-- Carousel Section -->
    <form id="carousel-form" enctype="multipart/form-data">
        <h2>Carousel Images</h2>
        <div id="carousel-images">
            <div class="form-group">
                <label>Slide 1:</label>
                <img src="/HOMESPECTOR/img/servicecharge1.png" alt="Slide 1" style="max-width: 200px;" />
                <input type="file" name="carousel_images[]" accept="image/*" />
            </div>
            <div class="form-group">
                <label>Slide 2:</label>
                <img src="/HOMESPECTOR/img/servicecharge2.png" alt="Slide 2" style="max-width: 200px;" />
                <input type="file" name="carousel_images[]" accept="image/*" />
            </div>
            <div class="form-group">
                <label>Slide 3:</label>
                <img src="/HOMESPECTOR/img/servicecharge3.png" alt="Slide 3" style="max-width: 200px;" />
                <input type="file" name="carousel_images[]" accept="image/*" />
            </div>
            <div class="form-group">
                <label>Slide 4:</label>
                <img src="/HOMESPECTOR/img/servicecharge4.png" alt="Slide 4" style="max-width: 200px;" />
                <input type="file" name="carousel_images[]" accept="image/*" />
            </div>
        </div>
        <button type="button" id="add-slide-btn">Add New Slide</button>
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
        const featureCount = featureContainer.children.length + 1;

        const newFeatureHTML = `
            <div class="form-group">
                <label for="feature-${featureCount}">Feature ${featureCount}:</label>
                <input type="text" id="feature-${featureCount}" name="service_features[]" value="" />
            </div>
        `;

        featureContainer.insertAdjacentHTML('beforeend', newFeatureHTML);
    });

    // Add New Carousel Slide
    document.getElementById('add-slide-btn').addEventListener('click', function () {
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

    // Save Changes
    document.getElementById('save-btn').addEventListener('click', function (e) {
        e.preventDefault();

        const servicesFormData = new FormData(document.getElementById('services-form'));
        const bannerFormData = new FormData(document.getElementById('banner-form'));
        const carouselFormData = new FormData(document.getElementById('carousel-form'));

        // Merge all form data
        for (const [key, value] of bannerFormData.entries()) {
            servicesFormData.append(key, value);
        }
        for (const [key, value] of carouselFormData.entries()) {
            servicesFormData.append(key, value);
        }

        fetch('save-service2.php', {
            method: 'POST',
            body: servicesFormData,
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
