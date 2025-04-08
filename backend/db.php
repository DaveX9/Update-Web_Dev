<?php
date_default_timezone_set('Asia/Bangkok'); // ✅ ตั้งเวลาประเทศไทย

$conn = new mysqli("localhost", "root", "", "admin_auth"); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
