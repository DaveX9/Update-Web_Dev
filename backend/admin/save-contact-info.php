<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $phoneNumber = $_POST['phone_number'] ?? '02-454-2043';
    $lineId = $_POST['line_id'] ?? '@t.home';

    // Save data to a JSON file (or database if required)
    $data = [
        'phone_number' => $phoneNumber,
        'line_id' => $lineId,
    ];

    file_put_contents('contact-info.json', json_encode($data, JSON_PRETTY_PRINT));
    echo 'Contact Info saved successfully!';
}
?>
