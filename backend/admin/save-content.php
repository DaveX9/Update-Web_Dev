<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $headlineTH = $_POST['headline_th'];
    $headlineEN = $_POST['headline_en'];
    $trust = $_POST['trust'];
    $tech = $_POST['tech'];
    $team = $_POST['team'];

    // Example: Save to a file (You can replace this with database saving)
    $data = [
        'headline_th' => $headlineTH,
        'headline_en' => $headlineEN,
        'trust' => $trust,
        'tech' => $tech,
        'team' => $team,
    ];

    file_put_contents('why_choose_us.json', json_encode($data, JSON_PRETTY_PRINT));
    echo 'Content saved successfully!';
}
?>
