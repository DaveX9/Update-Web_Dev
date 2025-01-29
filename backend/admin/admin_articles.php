<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<style>
    #save-btn {
    background-color: #007BFF; /* Blue color */
    color: white; /* White text */
    font-size: 16px;
    font-weight: bold;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    display: block;
    width: 100%;
    text-align: center;
    margin-top: 20px;
}

#save-btn:hover {
    background-color: #0056b3; /* Darker blue */
}

#save-btn:active {
    background-color: #00408a; /* Even darker blue */
}

</style>
<div class="form-container">
    <h1>Manage Review Articles</h1>

    <!-- Page Title & Description -->
    <form id="review-settings-form">
        <div class="form-group">
            <label for="review-title">Page Title:</label>
            <input type="text" id="review-title" name="review_title" value="บทความ">
        </div>
        <div class="form-group">
            <label for="review-description">Description:</label>
            <textarea id="review-description" name="review_description">ความรู้เกี่ยวกับ งานตรวจรับบ้านเเละคอนโดก่อนโอนกรรมสิทธิ์</textarea>
        </div>
    </form>

    <!-- Review Cards -->
    <h2>Manage Review Articles</h2>
    <div id="review-cards">
        <!-- Review Cards will be loaded dynamically -->
    </div>
    <button type="button" id="add-article-btn">Add New Article</button>

    <!-- Save Button -->
    <button type="submit" id="save-btn">Save Changes</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('load-articles.php')
        .then(response => response.json())
        .then(data => {
            // Load review cards
            const reviewContainer = document.getElementById('review-cards');
            reviewContainer.innerHTML = data.articles.map(article => `
                <div class="form-group article-group">
                    <input type="text" name="article_titles[]" value="${article.title}">
                    <input type="date" name="article_dates[]" value="${article.date}">
                    <input type="text" name="article_categories[]" value="${article.category}">
                    <img src="${article.image}" alt="Review Image" style="max-width: 100px;">
                    <input type="file" name="article_images[]" accept="image/*">
                    <button type="button" class="delete-article-btn">Delete</button>
                </div>
            `).join('');
        });
});

// Add Article
document.getElementById('add-article-btn').addEventListener('click', function () {
    const reviewContainer = document.getElementById('review-cards');
    const newArticle = `
        <div class="form-group article-group">
            <input type="text" name="article_titles[]" placeholder="Title">
            <input type="date" name="article_dates[]">
            <input type="text" name="article_categories[]" placeholder="Category">
            <input type="file" name="article_images[]" accept="image/*">
            <button type="button" class="delete-article-btn">Delete</button>
        </div>`;
    reviewContainer.insertAdjacentHTML('beforeend', newArticle);
});

// Save Data
document.getElementById('save-btn').addEventListener('click', function (e) {
    e.preventDefault();

    const formData = new FormData(document.getElementById('review-settings-form'));
    const articleInputs = document.querySelectorAll('.article-group');

    const articles = [];
    articleInputs.forEach(article => {
        articles.push({
            title: article.querySelector('input[name="article_titles[]"]').value,
            date: article.querySelector('input[name="article_dates[]"]').value,
            category: article.querySelector('input[name="article_categories[]"]').value,
        });
    });

    formData.append('articles', JSON.stringify(articles));

    fetch('save-articles.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Content updated successfully!');
            location.reload();
        } else {
            alert('Failed to update content.');
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>

<?php include 'footer.php'; ?>
