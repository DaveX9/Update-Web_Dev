<?php
$token = $_GET['token'] ?? '';
$success = $_GET['success'] ?? null;
$error = $_GET['error'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('/HOMESPECTOR/img/admin_bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            max-width: 350px;
            width: 100%;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
        }

        .login-box input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .login-box button:hover {
            background: #0056b3;
        }

        .error-msg {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .success-msg {
            color: green;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .back-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>🔒 Reset Your Password</h2>

            <?php if ($success): ?>
                <div class="success-msg">✅ Password reset successful. <a href='login_form.php'>Login</a></div>
            <?php elseif (empty($token)): ?>
                <div class="error-msg">❌ Invalid reset link.</div>
            <?php else: ?>
                <?php if ($error === 'password_mismatch'): ?>
                    <div class="error-msg">❌ Passwords do not match.</div>
                <?php endif; ?>

                <form action="process_reset.php" method="POST">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <input type="password" name="new_password" placeholder="New Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <button type="submit">Reset Password</button>
                </form>
            <?php endif; ?>

            <a class="back-link" href="login_form.php">← Back to Login</a>
        </div>
    </div>
</body>
</html>
