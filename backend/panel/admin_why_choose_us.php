<?php
include 'db.php';

// ดึงข้อมูล content
$result = $conn->query("SELECT * FROM why_choose_us LIMIT 1");
$data = $result->fetch_assoc();

// บันทึกเมื่อมีการแก้ไข
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {
    $content = $_POST['content'];

    if ($data) {
        $conn->query("UPDATE why_choose_us SET content='" . $conn->real_escape_string($content) . "' WHERE id=1");
    } else {
        $conn->query("INSERT INTO why_choose_us (content) VALUES ('" . $conn->real_escape_string($content) . "')");
    }

    header("Location: admin_why_choose_us.php?success=1");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Why Choose Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@4.1.4/css/froala_editor.pkgd.min.css">
    <style>
        body { max-width: 900px; margin: auto; padding: 20px; font-family: sans-serif; }
        textarea { width: 100%; height: 300px; }
        .btn { padding: 10px 20px; background: green; color: white; border: none; }
    </style>
</head>
<body>
    <h2>🛠 แก้ไขเนื้อหา "ทำไมต้องเลือก ต.ตรวจบ้าน"</h2>
    <form method="POST">
        <textarea name="content" id="editor"><?= $data['content'] ?? '' ?></textarea>
        <br>
        <button class="btn" type="submit">บันทึก</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.1.4/js/froala_editor.pkgd.min.js"></script>
    <script>
        new FroalaEditor('#editor', {
            height: 900,
            imageUploadURL: '/HOMESPECTOR/backend/panel/upload_img_why_choose.php',
            toolbarButtons: {
                moreText: {
                    buttons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', 'textColor', 'backgroundColor', 'inlineClass', 'inlineStyle', 'clearFormatting']
                },
                moreParagraph: {
                    buttons: ['alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'formatOL', 'formatUL', 'paragraphFormat', 'paragraphStyle', 'lineHeight', 'outdent', 'indent', 'quote']
                },
                moreRich: {
                    buttons: ['insertLink', 'insertImage', 'insertVideo', 'insertTable', 'emoticons', 'fontAwesome', 'specialCharacters', 'embedly', 'insertFile', 'insertHR']
                },
                moreMisc: {
                    buttons: ['undo', 'redo', 'fullscreen', 'print', 'getPDF', 'spellChecker', 'selectAll', 'html']
                }
            },
            toolbarSticky: true
        });
    </script>
</body>
</html>
