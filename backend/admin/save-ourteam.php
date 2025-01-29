<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Directory for uploads
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Save Contact Information
    $contactPhone = $_POST['contact_phone'] ?? '';
    $contactLine = $_POST['contact_line'] ?? '';

    // Save About Content
    $aboutContent = $_POST['about_content'] ?? '';

    // Save YouTube Link
    $youtubeLink = $_POST['youtube_link'] ?? '';

    // Save Founder Information
    $founders = [];
    if (isset($_POST['founder_names'])) {
        foreach ($_POST['founder_names'] as $index => $name) {
            $founderImage = $_FILES['founder_images']['name'][$index] ?? null;
            $founderImagePath = null;

            if ($founderImage) {
                $founderImagePath = $uploadDir . basename($_FILES['founder_images']['name'][$index]);
                move_uploaded_file($_FILES['founder_images']['tmp_name'][$index], $founderImagePath);
            }

            $founders[] = [
                'name' => $name,
                'role' => $_POST['founder_roles'][$index] ?? '',
                'image' => $founderImagePath ?? '',
            ];
        }
    }

    // Save Team Members
    $teamMembers = [];
    if (isset($_POST['team_names'])) {
        foreach ($_POST['team_names'] as $index => $teamName) {
            $teamImage = $_FILES['team_images']['name'][$index] ?? null;
            $teamImagePath = null;

            if ($teamImage) {
                $teamImagePath = $uploadDir . basename($_FILES['team_images']['name'][$index]);
                move_uploaded_file($_FILES['team_images']['tmp_name'][$index], $teamImagePath);
            }

            $teamMembers[] = [
                'name' => $teamName,
                'image' => $teamImagePath ?? '',
            ];
        }
    }

    // Simulated Database Storage (Replace this with actual DB connection)
    $dataToSave = [
        'contact' => [
            'phone' => $contactPhone,
            'line' => $contactLine,
        ],
        'about_content' => $aboutContent,
        'youtube_link' => $youtubeLink,
        'founders' => $founders,
        'team_members' => $teamMembers,
    ];

    // Save Data to a JSON File (Replace this with a database query if needed)
    file_put_contents('about_data.json', json_encode($dataToSave, JSON_PRETTY_PRINT));

    echo json_encode(['success' => true, 'message' => 'Content updated successfully!', 'data' => $dataToSave]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid request.']);
exit;
?>
