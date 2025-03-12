<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);

    // Prevent duplicate entries
    $checkQuery = "SELECT * FROM developers1 WHERE name = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "❌ Developer already exists!";
    } else {
        $query = "INSERT INTO developers1 (name) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $name);
        
        if ($stmt->execute()) {
            echo "✅ Developer added successfully!";
        } else {
            echo "❌ Error adding developer.";
        }
    }
}
?>
