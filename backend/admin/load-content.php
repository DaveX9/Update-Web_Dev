<?php
$file = 'carousel-images.json';

if (file_exists($file)) {
    $images = file_get_contents($file);
    echo $images;
} else {
    echo json_encode([]); // Return an empty array if no images exist
}

//why_choose_us//
$data = file_get_contents('why_choose_us.json');
echo $data;
?>
