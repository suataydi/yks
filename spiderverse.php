<!DOCTYPE html>
<html lang="tr">
<head>
  <link rel="icon" href="s.png" type="image/png">
  <meta charset="UTF-8">
  <title>Spider-verse Comic</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #f1c40f;
      --secondary: #d4ac0d;
      --bg: #121212;
      --header-bg: #1e1e1e;
      --text: #e0e0e0;
    }
    body {
      margin: 0;
      padding: 0;
      background: var(--bg);
      font-family: 'Montserrat', sans-serif;
      color: var(--text);
      overflow-x: hidden;
    }
    /* Header: Gradient arka plan, modern düzen, sabit konum */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 30px;
      background: linear-gradient(135deg, var(--header-bg), #333);
      box-shadow: 0 4px 8px rgba(0,0,0,0.5);
      position: sticky;
      top: 0;
      z-index: 100;
    }
    /* Sol tarafta SUGUT amblemi */
    .emblem {
      font-size: 2.8rem;
      font-weight: 700;
      letter-spacing: 5px;
      text-transform: uppercase;
      background: linear-gradient(45deg, var(--primary), var(--secondary));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: shimmer 3s infinite;
    }
    @keyframes shimmer {
      0%, 100% { filter: brightness(1); }
      50% { filter: brightness(1.3); }
    }
    /* Header'ın ortasındaki metin */
    .header-center {
      font-size: 1.5rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 3px;
      color: var(--primary);
      text-shadow: 0 0 10px rgba(241, 196, 15, 0.8), 
                   0 0 20px rgba(241, 196, 15, 0.6), 
                   0 0 30px rgba(241, 196, 15, 0.4);
      animation: glow 2.5s infinite alternate;
    }
    @keyframes glow {
      0% { text-shadow: 0 0 10px rgba(241, 196, 15, 0.8), 
                   0 0 20px rgba(241, 196, 15, 0.6), 
                   0 0 30px rgba(241, 196, 15, 0.4); }
      100% { text-shadow: 0 0 15px rgba(241, 196, 15, 1), 
                      0 0 25px rgba(241, 196, 15, 0.8), 
                      0 0 35px rgba(241, 196, 15, 0.6); }
    }
    /* Home Butonu: Modern, akıcı hover efekti */
    .home-btn {
      padding: 12px 28px;
      background: var(--primary);
      color: var(--bg);
      text-decoration: none;
      font-weight: 700;
      border-radius: 30px;
      transition: transform 0.3s, background 0.3s, box-shadow 0.3s;
      box-shadow: 0 4px 8px rgba(0,0,0,0.4);
      position: relative;
      overflow: hidden;
    }
    .home-btn:before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(120deg, transparent, rgba(255,255,255,0.4), transparent);
      transition: all 650ms;
    }
    .home-btn:hover {
      transform: translateY(-3px) scale(1.05);
      background: var(--secondary);
      box-shadow: 0 6px 12px rgba(0,0,0,0.6);
    }
    .home-btn:hover:before {
      left: 100%;
    }
    /* Comic Sayfa: Resimler alt alta sıralanacak */
    .comic-page {
      padding: 0;
      margin: 0;
      display: block; /* Alt alta sıralama için */
    }

    .comic-container {
      display: block; /* her resim alt alta sıralanacak */
      width: 100%; /* Her resim ekranın tamamını kaplasın */
      margin-bottom: 20px; /* Sayfa arasına boşluk */
    }

    .comic-page img {
      width: 100%; /* Ekran genişliğine sığdır */
      height: auto; /* Yüksekliği orantılı şekilde ayarla */
      display: block;
      transition: transform 0.4s, box-shadow 0.4s;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 0.8s forwards;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="emblem">SUGUT</div>
    <div class="header-center">Spider Verse #1</div>
    <a class="home-btn" href="index.html">Home</a>
  </div>
  <div class="comic-page" id="comic"></div>

  <script>
    const comicDiv = document.getElementById('comic');
    for (let i = 1; i <= 20; i++) {
      let imgNumber = i.toString().padStart(2, '0');
      
      let img = document.createElement('img');
      img.style.animationDelay = `${i * 0.1}s`;
      img.src = `spider-verse/${imgNumber}.webp`;
      img.alt = `spider-verse Comic Page ${i}`;
      
      let container = document.createElement('div');
      container.className = 'comic-container';
      container.appendChild(img);

      comicDiv.appendChild(container);
    }
  </script>

  <script>
    document.addEventListener("contextmenu", function (event) {
        event.preventDefault();
    });
    
    document.addEventListener("keydown", function (event) {
        if (event.ctrlKey && (event.key === "U" || event.key === "S" || event.key === "I" || event.key === "J" || event.key === "C" || event.key === "K")) {
            event.preventDefault();
        }
    });
  </script>
  <script>
    document.addEventListener("keydown", function (event) {
        if (event.key === "F12") {
            event.preventDefault();
        }
    });

    (function() {
        var devtools = false;
        var element = new Image();
        Object.defineProperty(element, 'id', { 
            get: function() { 
                devtools = true;
                window.location.href = "about:blank"; 
            } 
        });
        console.log('%c', element);
    })();
  </script>
  <script>
    (function() {
      var devtools = false;
      var element = new Image();
      Object.defineProperty(element, 'id', { 
        get: function() { 
          devtools = true;
          alert("Geliştirici araçlarını kapatın!");
          window.location.href = "about:blank"; 
          } 
        });
        console.log('%c', element);
      })();
  </script>
  <script>
    if (window.outerWidth - window.innerWidth > 160 || window.outerHeight - window.innerHeight > 160) {
        document.body.innerHTML = "<h1>Geliştirici araçları kapatılmadan bu sayfa görüntülenemez!</h1>";
        setTimeout(function(){ window.location.href = "about:blank"; }, 2000);
    }
  </script>
  <script>
    setInterval(function() {
        if (window.outerWidth - window.innerWidth > 160 || window.outerHeight - window.innerHeight > 160) {
            alert("Geliştirici araçları kapatılmadan devam edemezsiniz!");
            window.location.href = "about:blank";
        }
    }, 1000);
  </script>
</body>
</html>
