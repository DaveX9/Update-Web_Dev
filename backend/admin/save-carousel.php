<?php
$uploadDir = 'uploads/'; // Directory to store uploaded images
$file = 'carousel-images.json';

// Ensure the upload directory exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Fetch existing images
$images = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// Process each uploaded image
if (!empty($_FILES['images']['name'][0])) {
    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($tmpName, $targetFile)) {
            $images[] = $targetFile;
        }
    }

    // Save the updated images array
    file_put_contents($file, json_encode($images));
}

echo 'Images saved successfully!';
?>
