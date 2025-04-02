<?php
session_start();

// Şifre kontrolü: form gönderildiğinde kontrol et
if(isset($_POST['password'])){
    // NOT: Gerçek projelerde şifreyi sabit kodlamak yerine güvenli bir yöntemle (örn. veritabanı, env dosyası vb.) saklayın.
    if($_POST['password'] === '197346'){
        $_SESSION['authorized'] = true;
    } else {
        $error = "Yanlış şifre. Lütfen tekrar deneyin.";
    }
}

// Eğer kullanıcı henüz yetkilendirilmemişse, şifre giriş formunu göster
if(!isset($_SESSION['authorized'])){
    ?>
    <!DOCTYPE html>
    <html lang="tr">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Şifre Girişi</title>
      <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
      <style>
        body {
          background: #121212;
          font-family: 'Orbitron', sans-serif;
          color: white;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          margin: 0;
        }
        .password-box {
          text-align: center;
        }
        input[type="password"] {
          padding: 10px;
          font-size: 1.2rem;
          border-radius: 5px;
          border: none;
          margin-right: 10px;
        }
        button {
          padding: 10px 20px;
          font-size: 1.2rem;
          border: none;
          border-radius: 5px;
          background: #ff6f61;
          color: white;
          cursor: pointer;
        }
        .error {
          margin-top: 10px;
          color: red;
        }
        .info {
          margin-top: 15px;
          font-size: 0.9rem;
          color: #ccc;
        }
      </style>
    </head>
    <body>
      <div class="password-box">
        <h1>Şifre Giriniz</h1>
        <form method="post">
          <input type="password" name="password" placeholder="Şifre">
          <button type="submit">Giriş</button>
        </form>
        <?php if(isset($error)){ echo '<div class="error">'.$error.'</div>'; } ?>
        <div class="info">Not: Şifre her ayın 1'inde değiştirilecektir.</div>
      </div>
    </body>
    </html>
    <?php
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comics - Sugut</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
  <style>
    body {
      background: #121212;
      font-family: 'Orbitron', sans-serif;
      margin: 0;
      padding: 0;
      color: white;
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background: rgba(0, 0, 0, 0.9);
    }
    .logo h1 {
      margin: 0;
      font-size: 2rem;
      color: #ff6f61;
    }
    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 15px;
      padding: 15px;
    }
    .card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      width: 200px;
      height: 400px;
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
    }
    .card:hover {
      transform: scale(1.1);
      box-shadow: 0 0 15px #ff6f61;
    }
    .img-container {
      width: 200px;
      height: 450px;
      background: #000;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }
    .img-container img {
      width: 100%;
      height: 100%;
      transition: transform 0.3s;
    }
    .card:hover .img-container img {
      transform: scale(1.05);
    }
    .summary {
      padding: 10px;
      font-size: 1rem;
      background: rgba(0, 0, 0, 0.85);
      color: #f0f0f0;
      text-align: center;
      width: 100%;
      flex-grow: 1;
    }
    footer {
      text-align: center;
      padding: 15px;
      background: rgba(0, 0, 0, 0.9);
      margin-top: 15px;
    }
    .warning {
      text-align: center;
      padding: 10px;
      background: #ff6f61;
      color: white;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <h1>SUGUT</h1>
    </div>
  </header>
  <div class="warning">
    Dikkat: Reklam sayfası açılabilir. 24 saatte bir kısaltılmış link reklamı çıkmaktadır. Kartlara her tıklandığında ise reklam sayfası açılmaktadır!
  </div>
  <main>
    <section class="card-container">
      <div class="card" onclick="openLinks(event, 'doom_2099.html', 'https://povaique.top/4/9154201')">
        <div class="img-container">
          <img src="doom_2099/doom2099-01.webp" alt="doom_2099">
        </div>
        <div class="summary">
          ⚡DOOM 2099
        </div>
      </div>
      <div class="card" onclick="openLinks(event, 'PulseForge.html', 'https://povaique.top/4/9154201')">
        <div class="img-container">
          <img src="arka_plan_PulseForge.jpg" alt="PulseForge">
        </div>
        <div class="summary">
          ⚡ John Parker, kinetik enerjiyi manipüle edebilen genç bir kahramandır. Güçlerini kontrol etmeyi öğrenirken büyük bir tehditle karşı karşıya kalır.
        </div>
      </div>
    </section>
  </main>
  <footer>
    &copy; 2025 SUGUT
  </footer>
  <script>
    function openLinks(event, page, adUrl) {
      event.preventDefault();
      window.open(adUrl, "_blank");
      window.location.href = page;
    }
  </script>
</body>
</html>
