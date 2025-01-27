<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faqData = $_POST['faqs'] ?? [];

    // Save to JSON file
    $dataFile = 'faq-data.json';
    file_put_contents($dataFile, json_encode($faqData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo '<script>alert("FAQs updated successfully!"); window.location.href = "adminpanel.php";</script>';
} else {
    echo '<script>alert("Invalid request!"); window.location.href = "adminpanel.php";</script>';
}
?>
