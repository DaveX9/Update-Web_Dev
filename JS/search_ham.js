const hamburgerIcon = document.getElementById('hamburger-icon');
const closeIcon = document.getElementById('close-icon');
const fullscreenMenu = document.getElementById('fullscreen-menu');
const searchBar = document.getElementById('search-bar');
const searchIcon = document.getElementById('search-icon');

// Function to toggle the full-screen menu
function toggleMenu(action) {
    if (action === 'open') {
        fullscreenMenu.classList.add('active');
    } else if (action === 'close') {
        fullscreenMenu.classList.remove('active');
    }
}

// Function to toggle the search bar visibility
function toggleSearch() {
    if (searchBar) {
        const isVisible = searchBar.style.display === 'block';
        searchBar.style.display = isVisible ? 'none' : 'block';
    }
}

// Function to simulate search functionality
function searchFunction() {
    alert('Search functionality not implemented yet.');
}

// Attach event listeners for menu functionality
if (hamburgerIcon && closeIcon && fullscreenMenu) {
    hamburgerIcon.addEventListener('click', () => toggleMenu('open')); // Open the menu
    closeIcon.addEventListener('click', () => toggleMenu('close')); // Close the menu

    // Optional: Close menu when clicking outside the content area
    fullscreenMenu.addEventListener('click', (event) => {
        if (event.target === fullscreenMenu) {
            toggleMenu('close');
        }
    });
}

// Attach event listener for search icon functionality
if (searchIcon && searchBar) {
    searchIcon.addEventListener('click', toggleSearch);
}