<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
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

        .login-box input[type="text"],
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

        .login-box a {
        display: block;
        margin-top: 10px;
        color: #007bff;
        font-size: 14px;
        text-decoration: none;
        }

        .login-box a:hover {
        text-decoration: underline;
        }

        .error-msg {
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
        }
    </style>
    </head>
    <body>
    <div class="login-container">
        <div class="login-box">
        <h2>🔒 Login</h2>

        <?php
            if (isset($_GET['error'])) {
            echo "<div class='error-msg'>" . htmlspecialchars($_GET['error']) . "</div>";
            }
        ?>

        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Enter your username" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <button type="submit">Log in</button>
        </form>

        <a href="forgot_password.php">Forgot Password?</a>
        </div>
    </div>
</body>
</html>
