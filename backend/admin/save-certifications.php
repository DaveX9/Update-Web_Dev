<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $carouselData = [];

    // Save carousel images and text
    for ($i = 1; $i <= 2; $i++) { // Adjust the loop limit based on the number of slides
        $imagePath = $_POST["carousel_image_$i"] ?? "/HOMESPECTOR/img/thumbnail$i.jpg"; // Default image path

        if (isset($_FILES["carousel_image_$i"]) && $_FILES["carousel_image_$i"]['error'] === UPLOAD_ERR_OK) {
            $fileName = basename($_FILES["carousel_image_$i"]['name']);
            $imagePath = $uploadDir . $fileName;
            move_uploaded_file($_FILES["carousel_image_$i"]['tmp_name'], $imagePath);
        }

        $carouselData[] = [
            'image' => $imagePath,
            'title' => $_POST["carousel_title_$i"] ?? '',
            'description' => $_POST["carousel_description_$i"] ?? '',
        ];
    }

    // Save thumbnails
    $thumbnails = [];
    for ($i = 1; $i <= 2; $i++) { // Adjust the loop limit based on the number of thumbnails
        $thumbnailPath = $_POST["thumbnail_$i"] ?? "/HOMESPECTOR/img/thumbnail$i.jpg"; // Default thumbnail path

        if (isset($_FILES["thumbnail_$i"]) && $_FILES["thumbnail_$i"]['error'] === UPLOAD_ERR_OK) {
            $fileName = basename($_FILES["thumbnail_$i"]['name']);
            $thumbnailPath = $uploadDir . $fileName;
            move_uploaded_file($_FILES["thumbnail_$i"]['tmp_name'], $thumbnailPath);
        }

        $thumbnails[] = $thumbnailPath;
    }

    // Save data to JSON
    $data = [
        'carousel' => $carouselData,
        'thumbnails' => $thumbnails,
    ];

    file_put_contents('carousel-data.json', json_encode($data, JSON_PRETTY_PRINT));
    echo 'Carousel, Thumbnails, and Text saved successfully!';
}
?>
