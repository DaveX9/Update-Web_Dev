// Ensure the DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
    // Fetch articles.html
    fetch('/HOMESPECTOR/Homepage/articles.html')
        .then((response) => {
            if (!response.ok) {
                throw new Error('Failed to load articles.html');
            }
            return response.text(); // Parse as text
        })
        .then((html) => {
            // Create a temporary DOM parser to access elements in articles.html
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            // Select all article cards
            const articleCards = doc.querySelectorAll('.review-cards .card');

            // Convert NodeList to Array and sort by `data-date`
            const sortedCards = Array.from(articleCards).sort((a, b) => {
                const dateA = new Date(a.getAttribute('data-date'));
                const dateB = new Date(b.getAttribute('data-date'));
                return dateB - dateA; // Sort by latest date
            });

            // Populate the latest articles section
            const articlesGrid = document.querySelector('.articles-grid');
            articlesGrid.innerHTML = ''; // Clear existing content

            // Append top 6 articles
            sortedCards.slice(0, 6).forEach((card) => {
                const clone = card.cloneNode(true); // Clone the article card
                articlesGrid.appendChild(clone); // Append to the grid
            });
        })
        .catch((error) => {
            console.error('Error fetching articles:', error);
        });
});
