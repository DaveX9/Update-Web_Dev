<?php
session_start();
require_once 'auth.php';

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page with logout message
$_SESSION['login_message'] = 'You have been successfully logged out';
header('Location: login1.php');
exit;
?>