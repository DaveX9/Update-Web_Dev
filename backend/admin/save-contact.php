<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // Retrieve data from POST request
    $adminPhone = $_POST['admin_phone'] ?? '';
    $adminEmail = $_POST['admin_email'] ?? '';
    $officeAddress = $_POST['office_address'] ?? '';
    $facebookLink = $_POST['facebook_link'] ?? '';
    $instagramLink = $_POST['instagram_link'] ?? '';
    $lineLink = $_POST['line_link'] ?? '';

    // Save data to a JSON file (you can replace this with database saving logic)
    $data = [
        'admin_phone' => $adminPhone,
        'admin_email' => $adminEmail,
        'office_address' => $officeAddress,
        'facebook_link' => $facebookLink,
        'instagram_link' => $instagramLink,
        'line_link' => $lineLink,
    ];

    $file = 'contact-data.json';
    if (file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT))) {
        echo json_encode(['success' => true, 'message' => 'Contact section updated successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save contact section.']);
    }
}
?>
