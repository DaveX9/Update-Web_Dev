<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $contactPhone = $_POST['contact_phone'] ?? '';
    $contactLine = $_POST['contact_line'] ?? '';
    $ourStory = $_POST['our_story'] ?? '';
    $visionMission = $_POST['vision_mission'] ?? '';
    $teamContent = $_POST['team_content'] ?? '';

    // Save data to a JSON file
    $data = [
        'contact_phone' => $contactPhone,
        'contact_line' => $contactLine,
        'our_story' => $ourStory,
        'vision_mission' => $visionMission,
        'team_content' => $teamContent,
    ];

    $file = 'story-data.json';
    if (file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT))) {
        echo json_encode(['success' => true, 'message' => 'Content saved successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save content.']);
    }
}
?>
