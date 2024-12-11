document.addEventListener("DOMContentLoaded", () => {
    // Function to animate numbers
    const animateValue = (id, start, end, duration) => {
      const element = document.getElementById(id);
      let current = start;
      const increment = (end - start) / (duration / 50); // Animation step
      const step = () => {
        current += increment;
        if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
          element.textContent = Math.round(end); // Final value
        } else {
          element.textContent = Math.round(current);
          requestAnimationFrame(step); // Continue animation
        }
      };
      step();
    };
  
    // Fetch data from API
    const fetchData = () => {
      fetch("https://checker.thomeinspector.com/adminreport/summary", {
        method: "GET",
        headers: {
          "Authorization": "Basic " + btoa("yourusername:yourpassword"), // Replace with your username:password
          "Content-Type": "application/json"
        }
      })
        .then(response => {
          if (!response.ok) throw new Error("Failed to fetch API data");
          return response.json();
        })
        .then(data => {
          // Animate values once data is loaded
          animateValue("developerCount", 0, data.developerCount, 2000);
          animateValue("projectCount", 0, data.projectCount, 2000);
          animateValue("houseCount", 0, data.houseCount, 2000);
        })
        .catch(error => {
          console.error("Error fetching data:", error);
          alert("Failed to load data. Please try again later.");
        });
    };
  
    // Trigger fetch and animation on scroll
    let animated = false;
    window.addEventListener("scroll", () => {
      const statsSection = document.querySelector(".stats-section");
      if (statsSection && !animated && window.scrollY + window.innerHeight > statsSection.offsetTop) {
        fetchData();
        animated = true;
      }
    });
  });