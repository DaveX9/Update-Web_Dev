// document.addEventListener("DOMContentLoaded", () => {
//     fetch('/HOMESPECTOR/Homepage/articles.html')
//         .then(response => response.text())
//         .then(html => {
//             const parser = new DOMParser();
//             const doc = parser.parseFromString(html, 'text/html');

//             // Grab all article cards from #review-cards
//             const articleCards = Array.from(doc.querySelectorAll('#review-cards .card'));

//             // Sort by data from .upload-date (assumes format: YYYY-MM-DD | category)
//             const sortedCards = articleCards.sort((a, b) => {
//                 const dateA = new Date(a.querySelector('.upload-date')?.textContent?.split('|')[0]?.trim());
//                 const dateB = new Date(b.querySelector('.upload-date')?.textContent?.split('|')[0]?.trim());
//                 return dateB - dateA;
//             });

//             const articlesGrid = document.querySelector('.articles-grid');
//             articlesGrid.innerHTML = '';

//             sortedCards.slice(0, 6).forEach(card => {
//                 const clone = card.cloneNode(true);
//                 articlesGrid.appendChild(clone);
//             });
//         })
//         .catch(err => {
//             console.error("Error loading articles:", err);
//         });
// });

document.addEventListener("DOMContentLoaded", () => {
    const grid = document.querySelector(".articles-grid");

    // ดึง static cards จาก articles.html
    fetch("/HOMESPECTOR/Homepage/articles.html")
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, "text/html");
            const staticCards = Array.from(doc.querySelectorAll("#review-cards .card")).map(card => {
                return {
                    id: 0,
                    title: card.querySelector("p")?.innerText.trim(),
                    thumbnail: card.querySelector("img")?.src,
                    article_date: card.querySelector(".upload-date")?.textContent?.split("|")[0]?.trim(),
                    category: card.dataset.category,
                    url: card.href
                };
            });

            // ดึง dynamic cards จาก API
            fetch("/HOMESPECTOR/backend/panel/api_articles.php")
                .then(res => res.json())
                .then(dynamicCards => {
                    const allArticles = [...staticCards, ...dynamicCards];

                    // เรียงตามวันที่
                    allArticles.sort((a, b) => new Date(b.article_date) - new Date(a.article_date));

                    // แสดงเฉพาะ 6 อันดับแรก
                    const latestSix = allArticles.slice(0, 6);
                    grid.innerHTML = "";

                    latestSix.forEach(article => {
                        const html = `
                            <a href="${article.url || '/HOMESPECTOR/Homepage/articles_view11.php?id=' + article.id}" 
                                class="card" data-category="${article.category}">
                                <img src="${article.thumbnail}" alt="${article.title}">
                                <p>${article.title}</p>
                                <span class="upload-date">${article.article_date} | ${article.category}</span>
                            </a>
                        `;
                        grid.insertAdjacentHTML("beforeend", html);
                    });
                })
                .catch(err => {
                    console.error("❌ Error loading dynamic articles:", err);
                    grid.innerHTML = "<p class='text-danger'>โหลดบทความไม่สำเร็จ</p>";
                });
        })
        .catch(err => {
            console.error("❌ Error loading articles.html:", err);
            grid.innerHTML = "<p class='text-danger'>โหลดบทความไม่สำเร็จ</p>";
        });
});