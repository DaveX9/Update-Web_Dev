// Dynamically adjust carousel size if needed
window.addEventListener("resize", () => {
    const carousel = document.querySelector(".custom-carousel2");
    if (window.innerWidth < 768) {
      carousel.style.height = "400px"; // Adjust height for smaller screens
    } else {
      carousel.style.height = "300px"; // Default height for larger screens
    }
  });
  