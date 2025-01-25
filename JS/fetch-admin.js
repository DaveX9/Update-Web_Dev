//line
// Fetch and render updated contact info dynamically
fetch('contact-info.json')
    .then((response) => response.json())
    .then((data) => {
        document.getElementById('contact-phone').href = `tel:${data.phone_number}`;
        document.getElementById('phone-number-display').textContent = `โทร ${data.phone_number}`;
        document.getElementById('contact-line').href = `https://line.me/R/ti/p/${data.line_id}`;
        document.getElementById('line-id-display').textContent = data.line_id;
    })
    .catch((error) => console.error('Error loading Contact Info:', error));

//carousel 1
$.get('load-carousel.php', function (data) {
    const images = JSON.parse(data);
    const carouselContainer = $('#carousel-items');
    carouselContainer.empty();

    images.forEach(image => {
        carouselContainer.append(`
            <div class="carousel_item">
                <img src="${image}" alt="Carousel Image">
            </div>
        `);
    });
});
//why choose us
// Fetch saved content and populate the section
$.get('load-content.php', function (data) {
    const content = JSON.parse(data);

    // Populate content dynamically
    $('.why-choose-us .section-title').text(content.headline_th);
    $('[data-translate="trust-details"]').html(content.trust);
    $('[data-translate="tech-details"]').html(content.tech);
    $('[data-translate="team-details"]').html(content.team);
});

//infection
// Fetch and render updated content dynamically
fetch('inspection-info.json')
    .then((response) => response.json())
    .then((data) => {
        document.getElementById('inspection-image').src = data.image;
        document.getElementById('inspection-title').textContent = data.title;
        document.getElementById('inspection-description').textContent = data.description;
        document.getElementById('button-text').textContent = data.button_text;
    })
    .catch((error) => console.error('Error loading Inspection Info:', error));


