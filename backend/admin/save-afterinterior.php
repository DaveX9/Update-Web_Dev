
<?php
header('Content-Type: application/json');

$uploadDir = 'uploads/';

// Create the uploads directory if not exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Function to handle image uploads
function uploadImage($file, $uploadDir) {
    if (!empty($file['name'])) {
        $filePath = $uploadDir . time() . "_" . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return $filePath;
        }
    }
    return '';
}

// Get form data
$contactPhone = $_POST['contact_phone'] ?? '';
$contactLine = $_POST['contact_line'] ?? '';
$contactEmail = $_POST['contact_email'] ?? '';
$reviewTitle = $_POST['review_title'] ?? '';
$reviewDescription = $_POST['review_description'] ?? '';

// Handle main review image upload
$reviewMainImage = '';
if (!empty($_FILES['review_main_image']['name'])) {
    $reviewMainImage = uploadImage($_FILES['review_main_image'], $uploadDir);
}

// Handle Froala Editor content for gallery images & descriptions
$galleryContent = $_POST['gallery_content'] ?? '';

// Extract image URLs and descriptions from Froala content
preg_match_all('/<img src="([^"]+)"[^>]*>/', $galleryContent, $imageMatches);
preg_match_all('/<p>([^<]*)<\/p>/', $galleryContent, $textMatches);

$galleryImages = [];
if (!empty($imageMatches[1])) {
    foreach ($imageMatches[1] as $index => $imageUrl) {
        $description = $textMatches[1][$index] ?? ''; // Get description or empty string
        $galleryImages[] = [
            'url' => $imageUrl,
            'description' => $description
        ];
    }
}

// Save data to JSON file
$data = [
    'contact' => [
        'phone' => $contactPhone,
        'line' => $contactLine,
        'email' => $contactEmail
    ],
    'review' => [
        'title' => $reviewTitle,
        'description' => $reviewDescription,
        'main_image' => $reviewMainImage,
        'gallery' => $galleryImages
    ]
];

file_put_contents('review_data.json', json_encode($data, JSON_PRETTY_PRINT));

echo json_encode(['success' => true, 'message' => 'Review Page Updated Successfully!', 'data' => $data]);
exit;
?>
