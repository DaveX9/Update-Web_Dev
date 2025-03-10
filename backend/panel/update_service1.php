<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sections = ['services', 'pricing', 'reports'];
    foreach ($sections as $section) {
        if (isset($_POST[$section . '_content']) && !empty(trim($_POST[$section . '_content']))) {
            $content = $_POST[$section . '_content'];

            // Prepare SQL statement
            $stmt = $conn->prepare("UPDATE thome SET content = ? WHERE section = ?");
            $stmt->bind_param("ss", $content, $section);
            
            if (!$stmt->execute()) {
                echo "Update failed: " . $stmt->error;
                exit();
            }
        }
    }
    
    echo "success"; // Send "success" response to AJAX
}
?>
