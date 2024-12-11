const hamburgerIcon = document.getElementById('hamburger-icon');
const navLinks = document.querySelector('.nav-links');
const searchIcon = document.getElementById('search-icon');
const searchBar = document.querySelector('.search-bar');

// Toggle navigation menu (Hamburger icon)
hamburgerIcon.addEventListener('click', () => {
  navLinks.classList.toggle('active');
});

// Toggle search bar (Search icon)
searchIcon.addEventListener('click', () => {
  searchBar.classList.toggle('active');
  navLinks.classList.add('active'); // Ensure the navigation stays visible
});