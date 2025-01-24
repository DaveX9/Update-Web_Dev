<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://t4.ftcdn.net/jpg/01/05/72/61/360_F_105726195_r0MpL0Noxp2NeMh3RsRwCskbeL7ensjV.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container{
            font-size:30px;
        }
    </style>
</head>
<body>
    
    
    <div class="container">
        <?php if (isset($user)): ?>
                
                
                <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                <p><a href="logout.php">Log out</a></p>
                
            <?php else: ?>
                
                <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
                
            <?php endif; ?>
    </div>
    
</body>
</html>