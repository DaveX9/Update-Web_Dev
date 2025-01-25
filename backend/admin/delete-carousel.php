<?php
$file = 'carousel-images.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];

    if (file_exists($file)) {
        $images = json_decode(file_get_contents($file), true);

        // Remove the selected image
        if (isset($images[$index])) {
            unlink($images[$index]); // Delete the file
            unset($images[$index]);

            // Reindex the array and save it back
            $images = array_values($images);
            file_put_contents($file, json_encode($images));
        }
    }

    echo 'Image deleted successfully!';
}
?>
