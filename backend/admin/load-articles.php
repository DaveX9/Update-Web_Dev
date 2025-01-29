<?php
header('Content-Type: application/json');

$dataFile = 'review_data.json';

if (file_exists($dataFile)) {
    $jsonData = file_get_contents($dataFile);
    echo $jsonData;
} else {
    echo json_encode([
        'articles' => [
            ['title' => 'Review SEtthasiri', 'date' => '2024-12-10', 'category' => 'Roof', 'image' => '/HOMESPECTOR/img/carousel2.jpg'],
            ['title' => 'Review Ladawan', 'date' => '2024-12-08', 'category' => 'Roof', 'image' => '/HOMESPECTOR/img/project1.jpg'],
            ['title' => 'Review SC Asset', 'date' => '2024-12-07', 'category' => 'Electrical System', 'image' => '/HOMESPECTOR/img/project1.jpg'],
            ['title' => 'Review SC Asset', 'date' => '2024-12-07', 'category' => 'Electrical System', 'image' => '/HOMESPECTOR/img/project1.jpg'],
            ['title' => 'Review SC Asset', 'date' => '2024-12-03', 'category' => 'Electrical System', 'image' => '/HOMESPECTOR/img/carousel3.jpg'],
            ['title' => 'Review SC Asset', 'date' => '2025-01-07', 'category' => 'Electrical System', 'image' => '/HOMESPECTOR/img/carousel2.jpg'],
            ['title' => 'Review SC Asset', 'date' => '2025-01-17', 'category' => 'Electrical System', 'image' => '/HOMESPECTOR/img/carousel2.jpg'],
            ['title' => 'Review SC Asset', 'date' => '2024-12-30', 'category' => 'Electrical System', 'image' => '/HOMESPECTOR/img/project1.jpg'],
            ['title' => 'Review SC Asset', 'date' => '2025-12-19', 'category' => 'Electrical System', 'image' => '/HOMESPECTOR/img/carousel3.jpg']
        ]
    ]);
}
?>
