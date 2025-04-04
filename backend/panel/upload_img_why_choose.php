<?php
$targetDir = "uploads/";
$uploadPath = __DIR__ . "/" . $targetDir;
if (!file_exists($uploadPath)) mkdir($uploadPath, 0755, true);

$fileName = time() . "_" . basename($_FILES["file"]["name"]);
$targetFile = $uploadPath . $fileName;
$webPath = "/HOMESPECTOR/backend/panel/uploads/" . $fileName;

if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    echo json_encode(["link" => $webPath]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Upload failed"]);
}
?>
