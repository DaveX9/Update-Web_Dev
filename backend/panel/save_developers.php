<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $developers = $_POST["developers"];

    foreach ($developers as $dev) {
        if ($dev["id"]) {
            $query = "UPDATE developers1 SET name_en=?, position=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sii", $dev["name_en"], $dev["position"], $dev["id"]);
        } else {
            $query = "INSERT INTO developers1 (name_en, position) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $dev["name_en"], $dev["position"]);
        }
        $stmt->execute();
    }
    echo "✅ Changes Saved!";
}
?>
