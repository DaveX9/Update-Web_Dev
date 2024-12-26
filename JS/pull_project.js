// // Fetch albums and their photos, and show the latest 6 images
// async function fetchLatestPhotosAndRenderProjects() {
//     try {
//       const response = await fetch("http://localhost:3000/albums");
//       if (!response.ok) {
//         throw new Error(`Error fetching albums: ${response.status}`);
//       }

//       const albums = await response.json();
//       const projectsGrid = document.getElementById("project-cards");
//       projectsGrid.innerHTML = ""; // Clear existing cards

//       let allPhotos = [];

//       // Fetch photos from each album
//       for (const album of albums) {
//         const photosResponse = await fetch(`http://localhost:3000/albums/${album.id}/photos`);
//         if (!photosResponse.ok) {
//           throw new Error(`Error fetching photos for album ${album.id}: ${photosResponse.status}`);
//         }

//         const photos = await photosResponse.json();
//         if (photos.data && photos.data.length > 0) {
//           photos.data.forEach(photo => {
//             allPhotos.push({
//               source: photo.images[0].source, // Highest resolution image
//               albumName: album.name,
//               description: album.description || "No description available",
//               uploadTime: new Date(photo.uploadTime || Date.now()), // Ensure we have a Date object
//             });
//           });
//         }
//       }

//       // Sort all photos by upload time (latest first)
//       allPhotos.sort((a, b) => b.uploadTime - a.uploadTime);

//       // Take the latest 6 photos
//       const latestPhotos = allPhotos.slice(0, 9);

//       // Render project cards
//       latestPhotos.forEach((photo, index) => {
//         const projectCard = document.createElement("div");
//         projectCard.className = "project-card";

//         const link = document.createElement("a");
//         link.href = `/project-details/${photo.albumName.replace(/\s+/g, '-').toLowerCase()}.html`; // Dynamic link generation

//         const img = document.createElement("img");
//         img.src = photo.source;
//         img.alt = photo.albumName;
//         link.appendChild(img);

//         const projectInfo = document.createElement("div");
//         projectInfo.className = "project-info";

//         const projectTitle = document.createElement("h3");
//         projectTitle.textContent = `REVIEW ${photo.albumName.toUpperCase()}`;
//         projectInfo.appendChild(projectTitle);

//         const projectDescription = document.createElement("p");
//         projectDescription.textContent = photo.description;
//         projectInfo.appendChild(projectDescription);

//         link.appendChild(projectInfo);
//         projectCard.appendChild(link);
//         projectsGrid.appendChild(projectCard);
//       });
//     } catch (error) {
//       console.error("Error rendering project cards:", error.message);
//     }
//   }

//   // Load the latest photos on page load
//   window.onload = fetchLatestPhotosAndRenderProjects;


// Fetch albums and their photos, and show the latest 6 images
async function fetchAlbumsAndRenderProjects() {
  try {
    const response = await fetch("http://localhost:3000/albums");
    if (!response.ok) {
      throw new Error(`Error fetching albums: ${response.status}`);
    }

    const albums = await response.json();
    const projectsGrid = document.getElementById("project-cards");
    projectsGrid.innerHTML = ""; // Clear existing cards

    // Take the first 6 albums
    const firstSixAlbums = albums.slice(0, 6);

    // Render project cards
    firstSixAlbums.forEach((album) => {
      const projectCard = document.createElement("div");
      projectCard.className = "project-card";

      const link = document.createElement("a");
      link.href = `/project-details/${album.name.replace(/\s+/g, '-').toLowerCase()}.html`; // Dynamic link generation

      const img = document.createElement("img");
      img.src = album.coverPhotoUrl || "https://via.placeholder.com/250x150?text=No+Image";
      img.alt = album.name;
      link.appendChild(img);

      const projectInfo = document.createElement("div");
      projectInfo.className = "project-info";

      const projectTitle = document.createElement("h3");
      projectTitle.textContent = `REVIEW ${album.name.toUpperCase()}`;
      projectInfo.appendChild(projectTitle);

      const projectDescription = document.createElement("p");
      projectDescription.textContent = album.description || "No description available";
      projectInfo.appendChild(projectDescription);

      link.appendChild(projectInfo);
      projectCard.appendChild(link);
      projectsGrid.appendChild(projectCard);
    });
  } catch (error) {
    console.error("Error rendering project cards:", error.message);
  }
}

// Load the albums on page load
window.onload = fetchAlbumsAndRenderProjects;