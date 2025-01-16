document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");

    function formatDate(date) {
        const months = [
            "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
            "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        ];
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear() + 543; // Convert to Buddhist calendar year
        return `${day} ${month} ${year}`;
    }

    cards.forEach(card => {
        const dataDate = card.getAttribute("data-date");
        const uploadDateSpan = card.querySelector(".upload-date");

        if (dataDate) {
            // Use the date from data-date
            const [year, month, day] = dataDate.split("-").map(Number);
            const formattedDate = formatDate(new Date(year, month - 1, day));
            uploadDateSpan.textContent = formattedDate;
        } else {
            // Use the current date for cards without data-date
            const currentDate = new Date();
            uploadDateSpan.textContent = formatDate(currentDate);
        }
    });
});