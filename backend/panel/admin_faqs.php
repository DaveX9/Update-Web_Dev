<?php
include 'db.php';

$edit_faq = null;

// เพิ่ม FAQ
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_faq'])) {
        $category = $_POST['category'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        $conn->query("INSERT INTO faqs (category, question, answer) VALUES ('$category', '$question', '$answer')");
        header("Location: admin_faqs.php");
        exit;
    }

    // แก้ไข FAQ
    if (isset($_POST['update_faq'])) {
        $id = (int)$_POST['id'];
        $category = $_POST['category'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        $conn->query("UPDATE faqs SET category='$category', question='$question', answer='$answer' WHERE id=$id");
        header("Location: admin_faqs.php");
        exit;
    }
}

// ลบ FAQ
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM faqs WHERE id=$id");
    header("Location: admin_faqs.php");
    exit;
}

// แก้ไข - โหลดข้อมูล
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $edit_faq = $conn->query("SELECT * FROM faqs WHERE id=$id")->fetch_assoc();
}

$faqs = $conn->query("SELECT * FROM faqs ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - FAQs</title>

    <!-- Froala Editor -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@4.1.4/css/froala_editor.pkgd.min.css">
    
    <!-- ✅ Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body { max-width: 900px; margin: auto; padding: 20px; font-family: sans-serif; background: #f9f9f9; }
        form, table { background: #fff; padding: 20px; border-radius: 10px; margin-bottom: 30px; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 10px; }
        input[type="submit"] { background: green; color: white; border: none; cursor: pointer; margin-top: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        .delete-btn, .edit-btn {
        text-decoration: none;
        font-weight: bold;
        margin-right: 10px;
        }
        .delete-btn { color: red; }
        .edit-btn { color: orange; }
    </style>
</head>
<body>

<h2><?= $edit_faq ? "✏️ แก้ไข FAQ" : "➕ เพิ่ม FAQ" ?></h2>
<form method="POST">
    <?php if ($edit_faq): ?>
        <input type="hidden" name="id" value="<?= $edit_faq['id'] ?>">
    <?php endif; ?>

    <label>หมวดหมู่ (category):</label>
    <select name="category" required>
        <?php
        $categories = ['plumbing', 'roof', 'pricing', 'process'];
        foreach ($categories as $cat) {
            $selected = ($edit_faq && $edit_faq['category'] === $cat) ? 'selected' : '';
            echo "<option value='$cat' $selected>$cat</option>";
        }
        ?>
    </select>

    <label>คำถาม (Question):</label>
    <input type="text" name="question" value="<?= $edit_faq['question'] ?? '' ?>" required>

    <label>คำตอบ (Answer):</label>
    <textarea name="answer" id="answer-editor"><?= $edit_faq['answer'] ?? '' ?></textarea>

    <input type="submit" name="<?= $edit_faq ? 'update_faq' : 'add_faq' ?>" value="<?= $edit_faq ? 'อัปเดต FAQ' : 'เพิ่ม FAQ' ?>">
</form>

<h2>📋 FAQ ทั้งหมด</h2>
<table>
    <tr><th>Category</th><th>Question</th><th>Action</th></tr>
    <?php while ($row = $faqs->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['category']) ?></td>
            <td><?= htmlspecialchars($row['question']) ?></td>
            <td>
                <!-- 🟠 Edit -->
                <a class="edit-btn" href="?edit=<?= $row['id'] ?>">
                    <i class="fas fa-edit"></i> 
                </a>

                <!-- 🔴 Delete -->
                <a class="delete-btn" href="?delete=<?= $row['id'] ?>" onclick="return confirm('ลบ FAQ นี้หรือไม่?')">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<!-- Froala JS -->
<script src="https://cdn.jsdelivr.net/npm/froala-editor@4.1.4/js/froala_editor.pkgd.min.js"></script>
<script>
    new FroalaEditor('#answer-editor', {
        height: 300,
        imageUploadURL: '/HOMESPECTOR/backend/panel/upload_faq_image.php'
    });
</script>

</body>
</html>
