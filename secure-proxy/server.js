// Import required modules
const dotenv = require("dotenv");
const express = require("express");
const fetch = require("node-fetch");
const cors = require("cors");

// Load environment variables
dotenv.config(); 

// Constants
const username = process.env.API_USERNAME; // Fetch username from .env
const password = process.env.API_PASSWORD; // Fetch password from .env
const PORT = process.env.PORT || 3000; // Default port

// Create Express app
const app = express();

// Enable CORS for frontend requests
app.use(cors({
    origin: "https://checker.thomeinspector.com/adminreport/summary", // Replace with your frontend's URL
}));

// Test the credentials (Optional, for debugging purposes)
console.log(`Username: ${username}, Password: ${password}`);

// Endpoint to fetch data securely
app.get("/api/summary", async (req, res) => {
    try {
        const response = await fetch("https://checker.thomeinspector.com/adminreport/summary", {
            method: "GET",
            headers: {
                "Authorization": "Basic " + Buffer.from(`${username}:${password}`).toString("base64"), // Encode username:password
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) throw new Error("Failed to fetch data");

        const data = await response.json();
        res.json(data); // Send data to the frontend
    } catch (error) {
        console.error("Error fetching data:", error);
        res.status(500).send("Error fetching data");
    }
});

// Start the server
app.listen(PORT, () => console.log(`Server running on http://localhost:${PORT}`));
