document.addEventListener("DOMContentLoaded", () => {
    const uploadDates = document.querySelectorAll(".upload-date"); // Select all upload-date elements
    const thaiMonths = [
      "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
      "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    ];
  
    const now = new Date();
    const day = now.getDate();
    const month = thaiMonths[now.getMonth()];
    const year = now.getFullYear() + 543; // Convert to the Thai Buddhist calendar
  
    uploadDates.forEach((element) => {
      element.textContent = `${day} ${month} ${year}`; // Set the date for each element
    });
  });
  