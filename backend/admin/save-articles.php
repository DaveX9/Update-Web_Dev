<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $reviewTitle = $_POST['review_title'] ?? 'บทความ';
    $reviewDescription = $_POST['review_description'] ?? 'ความรู้เกี่ยวกับ งานตรวจรับบ้านเเละคอนโดก่อนโอนกรรมสิทธิ์';
    $articles = json_decode($_POST['articles'], true) ?? [];

    $articleData = [];
    foreach ($articles as $index => $article) {
        $imagePath = '';

        if (isset($_FILES['article_images']['name'][$index])) {
            $imagePath = $uploadDir . basename($_FILES['article_images']['name'][$index]);
            move_uploaded_file($_FILES['article_images']['tmp_name'][$index], $imagePath);
        }

        $articleData[] = [
            'title' => $article['title'],
            'date' => $article['date'],
            'category' => $article['category'],
            'image' => $imagePath,
        ];
    }

    $dataToSave = [
        'review_title' => $reviewTitle,
        'review_description' => $reviewDescription,
        'articles' => $articleData,
    ];

    file_put_contents('review_data.json', json_encode($dataToSave, JSON_PRETTY_PRINT));

    echo json_encode(['success' => true, 'message' => 'Content updated successfully!', 'data' => $dataToSave]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid request.']);
exit;
?>
