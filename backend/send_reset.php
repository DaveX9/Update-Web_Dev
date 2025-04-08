<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'db.php';

// ✅ โหลด .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // ✅ ใช้ __DIR__ ตรงกับที่คุณวาง .env
$dotenv->load();

// ✅ ตรวจสอบ และกรองอีเมล
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);

if (!$email) {
    echo "❌ Invalid or missing email address.";
    exit();
}

// ✅ ตรวจสอบว่าเป็น admin จริง
$sql = "SELECT * FROM users WHERE email = ? AND role = 'admin'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $token = bin2hex(random_bytes(50));
    $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

    $conn->query("DELETE FROM password_resets WHERE email = '$email'");
    $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $token, $expires);
    $stmt->execute();

    $reset_link = "http://localhost/HOMESPECTOR/backend/reset_password.php?token=$token";

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['MAIL_USERNAME'];
        $mail->Password   = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port       = $_ENV['MAIL_PORT'];
        $mail->setFrom($_ENV['MAIL_USERNAME'], $_ENV['MAIL_FROM_NAME']);
        $mail->addAddress($email);
        $mail->Subject = 'Reset Your Password';
        $mail->Body    = "Click this link to reset your password:\n$reset_link\n\nThis link will expire in 1 hour.";
        $mail->send();

        echo "✅ Reset link sent to your email.";
    } catch (Exception $e) {
        echo "❌ Mail error: {$mail->ErrorInfo}";
    }
} else {
    echo "❌ Email not found or not an admin.";
}
?>
