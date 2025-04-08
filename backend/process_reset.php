<?php
require 'db.php';

$token = $_POST['token'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if (empty($token)) {
    header("Location: reset_password.php?error=invalid_token");
    exit();
}

if ($new_password !== $confirm_password) {
    $token = urlencode($token);
    header("Location: reset_password.php?token=$token&error=password_mismatch");
    exit();
}

$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// ตรวจสอบ token
$sql = "SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW()";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $email = $row['email'];

    // อัปเดตรหัสผ่าน
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashed_password, $email);
    $stmt->execute();

    // ลบ token
    $stmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    header("Location: reset_password.php?success=1");
    exit();
} else {
    header("Location: reset_password.php?error=expired_token");
    exit();
}
?>
