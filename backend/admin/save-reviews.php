<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Directory for uploads
    $uploadDir = 'uploads/reviews/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $reviewsData = [];
    foreach ($_POST as $key => $value) {
        if (preg_match('/review_image_(\d+)/', $key, $matches)) {
            $index = $matches[1];
            $reviewsData[$index]['image'] = $value;
        }

        if (preg_match('/section_title/', $key)) {
            $reviewsData['section_title'] = $value;
        }

        if (preg_match('/section_subtitle/', $key)) {
            $reviewsData['section_subtitle'] = $value;
        }

        if (preg_match('/developer_count/', $key)) {
            $reviewsData['developer_count'] = (int) $value;
        }

        if (preg_match('/project_count/', $key)) {
            $reviewsData['project_count'] = (int) $value;
        }

        if (preg_match('/house_count/', $key)) {
            $reviewsData['house_count'] = (int) $value;
        }
    }

    foreach ($_FILES as $key => $file) {
        if (preg_match('/review_image_(\d+)/', $key, $matches)) {
            $index = $matches[1];
            if ($file['error'] === UPLOAD_ERR_OK) {
                $filePath = $uploadDir . basename($file['name']);
                move_uploaded_file($file['tmp_name'], $filePath);
                $reviewsData[$index]['image'] = $filePath;
            }
        }
    }

    file_put_contents('reviews-data.json', json_encode($reviewsData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo json_encode(['status' => 'success', 'message' => 'Reviews updated successfully!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
