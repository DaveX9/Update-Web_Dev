
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Home Reviews</title>
    <link rel="stylesheet" href="/CSS/Review-home.css">
</head>
<body>

    <h2>🏡 Latest Home Reviews</h2>
    <div id="reviews-container">
        <!-- Reviews will be loaded here dynamically -->
    </div>

    <script>
        async function fetchReviews() {
            try {
                const response = await fetch("fetch_reviews.php");
                const reviews = await response.json();

                const reviewsContainer = document.getElementById("reviews-container");
                reviewsContainer.innerHTML = ""; // Clear previous content

                if (reviews.error) {
                    reviewsContainer.innerHTML = `<p>Error: ${reviews.error}</p>`;
                    return;
                }

                reviews.forEach(review => {
                    const reviewCard = document.createElement("div");
                    reviewCard.className = "review-card";
                    reviewCard.innerHTML = `
                        <h3>${review.headline}</h3>
                        <p>${review.short_detail}</p>
                        ${review.thumbnail ? `<img src="${review.thumbnail}" alt="Thumbnail" class="thumbnail">` : ''}
                        <div class="review-content">${review.review_detail}</div>
                        <br>
                        <a href="edit_review.php?id=${review.id}" class="edit-btn">✏️ Edit</a> |
                        <a href="delete_review.php?id=${review.id}" class="delete-btn" onclick="return confirm('Are you sure?')">❌ Delete</a>
                    `;
                    reviewsContainer.appendChild(reviewCard);
                });
            } catch (error) {
                console.error("Error fetching reviews:", error);
            }
        }

        // Fetch reviews when the page loads
        fetchReviews();

        // Auto-refresh reviews every 10 seconds
        setInterval(fetchReviews, 10000);
    </script>

</body>
</html>
