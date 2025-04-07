<?php
require_once 'config.php';

function db_connect() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function verify_admin($username, $password) {
    $conn = db_connect();
    
    $stmt = $conn->prepare("SELECT id, username, password FROM " . ADMIN_TABLE . " WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            return $admin;
        }
    }
    
    return false;
}

function is_admin_logged_in() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function redirect_if_logged_in() {
    if (is_admin_logged_in()) {
        header('Location: dashboard.php');
        exit;
    }
}

function require_admin_login() {
    if (!is_admin_logged_in()) {
        $_SESSION['login_error'] = 'Please login to access the admin dashboard';
        header('Location: login1.php');
        exit;
    }
}
?>