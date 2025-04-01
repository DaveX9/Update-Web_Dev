<?php
$conn = new mysqli("localhost", "root", "", "homespector");

$id = $_POST['id'];
$content = $_POST['content'];

$stmt = $conn->prepare("UPDATE article_view1 SET content = ? WHERE id = ?");
$stmt->bind_param("si", $content, $id);
if ($stmt->execute()) {
    echo "✅ บันทึกเรียบร้อยแล้ว <a href='admin_article_view1.php?id=$id'>ย้อนกลับ</a>";
} else {
    echo "❌ เกิดข้อผิดพลาด: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
