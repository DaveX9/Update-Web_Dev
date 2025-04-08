<?php
session_start();
require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();

  // ❌ ถ้าไม่ใช่ admin ห้ามเข้า
  if ($user['role'] !== 'admin') {
    header("Location: login_form.php?error=Access denied. Admins only.");
    exit();
  }

  // ✅ ตรวจรหัสผ่าน
  if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role']; // ✅ เพิ่มตรงนี้
    
    header("Location: dashboard1.php");
    exit();
  } else {
    header("Location: login_form.php?error=Incorrect password");
    exit();
  }
} else {
  header("Location: login_form.php?error=Username not found");
  exit();
}
