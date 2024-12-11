// API URL
const apiURL = "https://www.manoottangwai.com/"; // Replace with your API endpoint

// Function to Fetch and Populate Articles
async function fetchArticles() {
  try {
    const response = await fetch(apiURL);
    const articles = await response.json();

    // Container for articles
    const articlesContainer = document.getElementById("articles-container");

    // Iterate through articles and create cards
    articles.forEach(article => {
      // Create Card Container
      const articleCard = document.createElement("div");
      articleCard.className = "article-card";

      // Article Image
      const articleImage = document.createElement("img");
      articleImage.className = "article-image";
      articleImage.src = article.image; // Image URL from API
      articleImage.alt = article.title;

      // Article Content
      const articleContent = document.createElement("div");
      articleContent.className = "article-content";

      // Article Title
      const articleTitle = document.createElement("h3");
      articleTitle.className = "article-title";
      articleTitle.textContent = article.title;

      // Article Description
      const articleDescription = document.createElement("p");
      articleDescription.className = "article-description";
      articleDescription.textContent = article.description;

      // Append Content to Card
      articleContent.appendChild(articleTitle);
      articleContent.appendChild(articleDescription);
      articleCard.appendChild(articleImage);
      articleCard.appendChild(articleContent);

      // Append Card to Container
      articlesContainer.appendChild(articleCard);
    });
  } catch (error) {
    console.error("Error fetching articles:", error);
  }
}

// Load Articles on Page Load
window.onload = fetchArticles;
