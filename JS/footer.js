document.addEventListener("DOMContentLoaded", function () {
    const headers = document.querySelectorAll(".footer-center h2, .footer-right h2, .footer-help h2");

    headers.forEach(header => {
        const icon = header.querySelector(".toggle-icon");

        if (window.innerWidth <= 768) {
            header.addEventListener("click", function () {
                const list = this.nextElementSibling;

                if (list && list.tagName === "UL") {
                    const isVisible = list.style.display === "block";
                    list.style.display = isVisible ? "none" : "block";
                    icon.textContent = isVisible ? "+" : "-";
                    
                    // Ensure UL aligns correctly when shown
                    if (!isVisible) {
                        list.style.textAlign = "left";
                        list.style.paddingLeft = "0";
                    }
                }
            });
        }
    });
});