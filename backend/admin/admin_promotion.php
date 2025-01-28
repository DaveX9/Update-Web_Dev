<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<div class="form-container">
    <h1>Manage Promotions</h1>

    <!-- Promotion Header Section -->
    <form id="promotion-header-form">
        <h2>Promotion Header</h2>
        <div class="form-group">
            <label for="promotion-title">Title:</label>
            <input type="text" id="promotion-title" name="promotion_title" value="สิทธิพิเศษ" />
        </div>
        <div class="form-group">
            <label for="promotion-subtitle">Subtitle:</label>
            <input type="text" id="promotion-subtitle" name="promotion_subtitle" value="สิทธิพิเศษสำหรับลูกค้าที่ตรวจบ้าน/คอนโด กับเรา" />
        </div>
    </form>

    <!-- Promotion Cards Section -->
    <form id="promotion-cards-form" enctype="multipart/form-data">
        <h2>Promotion Cards</h2>
        <div id="promotion-cards">
            <!-- Card 1 -->
            <div class="form-group card-group">
                <h3>Promotion 1</h3>
                <label for="promotion-title-1">Title:</label>
                <input type="text" id="promotion-title-1" name="promotion_titles[]" value="รับสิทธิ์พิเศษ ต.ตกแต่ง ฟรี 3 รายการ" />
                <label for="promotion-image-1">Image:</label>
                <img src="/HOMESPECTOR/img/promotion1.jpg" alt="Promotion 1" style="max-width: 200px;" />
                <input type="file" id="promotion-image-1" name="promotion_images[]" accept="image/*" />
            </div>

            <!-- Card 2 -->
            <div class="form-group card-group">
                <h3>Promotion 2</h3>
                <label for="promotion-title-2">Title:</label>
                <input type="text" id="promotion-title-2" name="promotion_titles[]" value="ตรวจบ้านสบายใจทำบุญบ้านได้ง่ายๆ" />
                <label for="promotion-image-2">Image:</label>
                <img src="/HOMESPECTOR/img/promotion2.jpg" alt="Promotion 2" style="max-width: 200px;" />
                <input type="file" id="promotion-image-2" name="promotion_images[]" accept="image/*" />
            </div>

            <!-- Card 3 -->
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

    document.getElementById('save-btn').addEventListener('click', function (e) {
        e.preventDefault();

        const headerFormData = new FormData(document.getElementById('promotion-header-form'));
        const cardsFormData = new FormData(document.getElementById('promotion-cards-form'));

        // Combine all form data
        for (const [key, value] of cardsFormData.entries()) {
            headerFormData.append(key, value);
        }

        fetch('save-promotion.php', {
            method: 'POST',
            body: headerFormData,
        })
            .then((response) => response.json())
            .then((data) => {
                alert(data.message);
            })
            .catch((error) => {
                console.error('Error saving promotions:', error);
                alert('Failed to save changes.');
            });
    });

</script>

<?php include 'footer.php'; ?>
