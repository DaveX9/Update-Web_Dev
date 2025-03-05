<?php
if ($_FILES['file']['name']) {
    $filename = time() . '_' . $_FILES['file']['name'];
    $filepath = "uploads/" . $filename;
    
    move_uploaded_file($_FILES['file']['tmp_name'], $filepath);

    echo json_encode([
        'link' => $filepath
    ]);
}
?>
