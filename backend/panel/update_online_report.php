<?php
include 'db.php';

if (isset($_POST['online_report_link'])) {
    $online_report_link = trim($_POST['online_report_link']);

    if (!empty($online_report_link)) {
        $stmt = $conn->prepare("UPDATE thome SET image_path = ? WHERE section = 'reports'");
        $stmt->bind_param("s", $online_report_link);
        $stmt->execute();
    }
}

header("Location: s1.php");
exit();
?>
