require("dotenv").config(); // Load .env variables
const express = require("express");
const cors = require("cors"); // Import CORS middleware
const fetch = (...args) => import('node-fetch').then(({ default: fetch }) => fetch(...args)); // Import node-fetch

const app = express();
const PORT = 3000;

// Enable Cross-Origin Resource Sharing (CORS)
app.use(cors());

// Environment variables for sensitive data
console.log("Access Token:", process.env.ACCESS_TOKEN);
console.log("Page ID:", process.env.PAGE_ID);

// Root route for testing
app.get("/", (req, res) => {
    res.send("Server is running! Access /albums to view the albums.");
});


app.get("/albums", async (req, res) => {
    try {
        const url = `https://graph.facebook.com/v12.0/${process.env.PAGE_ID}/albums?fields=id,name,cover_photo&access_token=${process.env.ACCESS_TOKEN}`;
        const response = await fetch(url);
        const data = await response.json();

        const albumsWithCoverPhotos = await Promise.all(
            data.data.map(async (album) => {
                let coverPhotoUrl = null;
                if (album.cover_photo) {
                    // Fetch the cover photo URL
                    const coverPhotoResponse = await fetch(
                        `https://graph.facebook.com/v12.0/${album.cover_photo.id}?fields=images&access_token=${process.env.ACCESS_TOKEN}`
                    );
                    const coverPhotoData = await coverPhotoResponse.json();
                    coverPhotoUrl = coverPhotoData.images[0]?.source; // Use highest resolution
                }

                return {
                    id: album.id,
                    name: album.name,
                    coverPhotoUrl: coverPhotoUrl,
                };
            })
        );

        res.json(albumsWithCoverPhotos);
    } catch (error) {
        console.error("Error fetching albums:", error.message);
        res.status(500).send("Error fetching albums");
    }
});

app.get("/albums/:albumId/photos", async (req, res) => {
    try {
        const albumId = req.params.albumId;
        const url = `https://graph.facebook.com/v12.0/${albumId}/photos?fields=images,name&access_token=${process.env.ACCESS_TOKEN}`;
        const response = await fetch(url);
        if (!response.ok) {
            const errorData = await response.json();
            console.error("Error from Facebook API:", errorData);
            return res.status(500).send(`Facebook API Error: ${errorData.error.message}`);
        }
        const data = await response.json();
        res.json(data);
    } catch (error) {
        console.error("Error fetching album photos:", error.message);
        res.status(500).send("Error fetching album photos");
    }
});


// Start the server
app.listen(PORT, () => {
    console.log(`Server is running at http://localhost:${PORT}`);
});
