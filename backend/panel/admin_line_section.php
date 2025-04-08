<?php
include 'db.php';

// บันทึกข้อมูลเมื่อมีการส่งฟอร์ม
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $phone = $_POST['phone_number'];
    $line = $_POST['line_id'];

    $stmt = $conn->prepare("UPDATE line_section SET phone_number = ?, line_id = ? WHERE id = 1");
    $stmt->bind_param("ss", $phone, $line);
    $stmt->execute();
    $message = "อัปเดตข้อมูลเรียบร้อยแล้ว!";
}

// ดึงข้อมูลปัจจุบันจากฐานข้อมูล
$result = $conn->query("SELECT * FROM line_section WHERE id = 1");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขเบอร์โทรและ Line ID</title>
    <style>
        body {
            background: #f9f9f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .contact-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: linear-gradient(135deg, #fdfbfb, #ebedee);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .contact-form h2 {
            text-align: center;
            color: #fb8c00;
            margin-bottom: 25px;
        }

        .contact-form label {
            display: block;
            font-weight: 600;
            margin-top: 20px;
            margin-bottom: 8px;
            font-size: 16px;
        }

        .contact-form input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .contact-form input[type="text"]:focus {
            border-color: #ffa726;
            box-shadow: 0 0 0 3px rgba(255, 167, 38, 0.2);
            outline: none;
        }

        .contact-form button {
            margin-top: 30px;
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ffa726, #fb8c00);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .contact-form button:hover {
            background: linear-gradient(135deg, #fb8c00, #f57c00);
            transform: translateY(-2px);
        }

        .success-message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <form method="post" class="contact-form">
        <h2>แก้ไขข้อมูลติดต่อ</h2>

        <?php if (isset($message)): ?>
            <div class="success-message"><?= $message ?></div>
        <?php endif; ?>

        <label for="phone">เบอร์โทร:</label>
        <input type="text" id="phone" name="phone_number" value="<?= htmlspecialchars($row['phone_number']) ?>">

        <label for="line">Line ID:</label>
        <input type="text" id="line" name="line_id" value="<?= htmlspecialchars($row['line_id']) ?>">

        <button type="submit">บันทึก</button>
    </form>

</body>
</html>
