<?php
session_start();
include '../header.php';

// Database Connection
try {
    $pdo = new PDO('mysql:host=localhost;dbname=homespector', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Update Story
        if (isset($_POST['story'])) {
            $stmt = $pdo->prepare("UPDATE our_story SET description = :description WHERE type = 'story'");
            $stmt->execute(['description' => $_POST['story']]);
        }

        // Update Vision
        if (isset($_POST['vision_title']) && isset($_POST['vision_description'])) {
            $stmt = $pdo->prepare("UPDATE our_story SET title = :title, description = :description WHERE type = 'vision'");
            $stmt->execute([
                'title' => $_POST['vision_title'],
                'description' => $_POST['vision_description']
            ]);
        }

        // Update Founders
        if (isset($_POST['founder_id'])) {
            foreach ($_POST['founder_id'] as $founder_id) {
                $stmt = $pdo->prepare("UPDATE our_story SET title = :title, description = :description WHERE id = :id");
                $stmt->execute([
                    'title' => $_POST['founder_name'][$founder_id],
                    'description' => $_POST['founder_description'][$founder_id],
                    'id' => $founder_id
                ]);

                // Handle Image Upload
                if (!empty($_FILES['founder_image']['name'][$founder_id])) {
                    $targetDir = "../uploads/";
                    $fileName = basename($_FILES["founder_image"]["name"][$founder_id]);
                    $targetFilePath = $targetDir . $fileName;
                    
                    if (move_uploaded_file($_FILES["founder_image"]["tmp_name"][$founder_id], $targetFilePath)) {
                        $stmt = $pdo->prepare("UPDATE our_story SET image_path = :image_path WHERE id = :id");
                        $stmt->execute([
                            'image_path' => $targetFilePath,
                            'id' => $founder_id
                        ]);
                    }
                }
            }
        }

        // Update Commitments
        if (isset($_POST['commitments'])) {
            $pdo->exec("DELETE FROM our_story WHERE type = 'commitment'");
            
            // Extract <li> content from Froala editor
            preg_match_all('/<li>(.*?)<\/li>/', $_POST['commitments'], $matches);
            foreach ($matches[1] as $commitment) {
                $stmt = $pdo->prepare("INSERT INTO our_story (type, description) VALUES ('commitment', :description)");
                $stmt->execute(['description' => $commitment]);
            }
        }

        // Return success response for AJAX
        echo "success";

    } else {
        echo "error: Invalid request";
    }
} catch (Exception $e) {
    echo "error: " . $e->getMessage();
}
?>
