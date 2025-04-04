<?php
include 'db.php';

$sql = "SELECT content FROM newapp_content WHERE id = 1";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    echo $row['content'];
} else {
    echo "ยังไม่มีเนื้อหาใหม่";
}
?>
