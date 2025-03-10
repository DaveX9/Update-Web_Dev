<?php
if ($_FILES['file']['name']) {
    // Define the correct upload directory
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/HOMESPECTOR/backend/panel/uploads/";
    
    // Generate a unique filename with timestamp
    $filename = time() . "_" . basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $filename;

    // Move the uploaded file to the designated folder
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // Return the correct path for display (relative to your website root)
        $public_path = "/HOMESPECTOR/backend/panel/uploads/" . $filename;
        echo json_encode(['link' => $public_path]);
    } else {
        echo json_encode(['error' => 'File upload failed.']);
    }
}
?>
