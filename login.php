<?php
session_start();

// Eğer kullanıcı zaten giriş yapmışsa, doğrudan korumalı sayfaya yönlendir
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    header("Location: spiderverse.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $correct_password = "197346";  // Doğru şifre

    if ($password === $correct_password) {
        $_SESSION["logged_in"] = true;
        header("Location: spiderverse.php");  // Giriş başarılı, korumalı sayfaya yönlendir
        exit();
    } else {
        $error = "Hatalı şifre, lütfen tekrar deneyin.";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <style>
        body {
            background: #121212;
            color: #e0e0e0;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.5);
        }
        input[type="password"] {
            padding: 10px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            outline: none;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background: #f1c40f;
            color: #121212;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #d4ac0d;
        }
        .error {
            color: #ff6f61;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Giriş Yap</h1>
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <input type="password" name="password" placeholder="Şifrenizi girin" required>
        <button type="submit">Giriş Yap</button>
    </form>
</body>
</html>
