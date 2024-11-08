<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["name"]) || !isset($_SESSION["role"]) || !isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quran Surah Menu</title>
  <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <style>
      body{
        font-family: "Urbanist", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
      }
  .about-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #0F1035;
    background: linear-gradient(135deg, #7FC7D9, #DCF2F1);
    border-radius: 15px;
    margin: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: left;
  }
  .toggler-icon {
    width: 30px;
    height: 3px;
    background: #0F1035;
    display: block;
    transition: all 0.2s;
  }
  .middle-bar {
    margin: 5px auto;
  }

  .navbar-toggler .top-bar {
    transform: rotate(45deg);
    transform-origin: 10% 10%;
  }

  .navbar-toggler .middle-bar {
    opacity: 0;
  }

  .navbar-toggler .bottom-bar {
    transform: rotate(-45deg);
    transform-origin: 10% 90%;
  }

  .navbar-toggler.collapsed .top-bar,
  .navbar-toggler.collapsed .bottom-bar {
    transform: rotate(0);
  }

  .navbar-toggler.collapsed .middle-bar {
    opacity: 1;
  }

  .navbar-toggler.collapsed .toggler-icon {
      background: #0F1035;
  }
  .section {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .main-wrapper {
    height: 100vh;
  }
  .backbody {
      background-color: linear-gradient(135deg, #7FC7D9, #DCF2F1);
      color: #333;
      direction: rtl;
      text-align: right;
  }
  header, footer {
      background-color: #365486;
  }
  nav a.nav-link {
      color: #0F1035;
  }
  .nav-link:hover {
    transform: scale(1.02);
    color: #d1e7dd;
  }
h1 {
    padding: 20px;
    font-size: 2em;
    color: #006699;
}
.container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 10px;
    padding: 20px;
    max-width: 1000px;
    margin: auto;
    text-align: right;
    direction: ltr;
}
.surah-content {
  display: flex;
  align-items: center;
}
.surah-card {
    background-color: #7FC7D9;
    padding: 15px;
    border: 1px solid #365486;
    border-radius: 8px;
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
}
.surah-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.surah-name {
    font-weight: bold;
    color: #006699;
    margin-bottom: 5px;
    margin-right: 10px;
}
@font-face {
  font-family: 'PDMS_Saleem_QuranFont';
  src: url('PDMS_Saleem_QuranFont_shipped.ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}
.surah-name-arabic {
    font-size: 1.5em;
    color: #333;
    font-family: 'PDMS_Saleem_QuranFont', sans-serif;
    src: url('PDMS_Saleem_QuranFont_shipped.ttf') format('truetype');
}
.surah-link {
    color: inherit;
    text-decoration: none;
}
.surah-audio-link .audio-player {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 10;
}
.surah-link:hover .audio-player {
display: flex;
flex-direction: column;
align-items: left;
justify-content: left;
direction: rtl;
}
</style>
</head>
<body>
<header>
    <div class="container-fluid"></div>
        <nav class="navbar navbar-expand-lg navbar-light navbar navbar-light ">
        <div class="container-fluid">
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
          </button>
          <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="Homepage"></a>
          <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="login.php">login</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="signup.php">signup</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="bookpage.php">Library</a></li>
                </ul>
          </div>
        <li class="nav-item d-flex justify-content-left"><a style="color:aliceblue;" class="nav-link" href="profil.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
        <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="distroy.php">Log out</a></li>
        </div>
      </nav>
    </div>
</header>
<div class="p-5 rounded-4 backbody container-fluid" style="background: linear-gradient(135deg, #7FC7D9, #DCF2F1);">
<h1 class=" d-flex justify-content-center">Quran Surahs</h1>
<div class="container col-8" id="surah-container">
<script>
    const surahs = [
  { name: "Al-Fatihah" }, { name: "Al-Baqarah" }, { name: "Aali Imran" }, { name: "An-Nisa" },
  { name: "Al-Ma'idah" }, { name: "Al-An'am" }, { name: "Al-A'raf" }, { name: "Al-Anfal" },
  { name: "At-Tawbah" }, { name: "Yunus" }, { name: "Hud" }, { name: "Yusuf" },
  { name: "Ar-Ra'd" }, { name: "Ibrahim" }, { name: "Al-Hijr" }, { name: "An-Nahl" },
  { name: "Al-Isra" }, { name: "Al-Kahf" }, { name: "Maryam" }, { name: "Ta-Ha" },
  { name: "Al-Anbiya" }, { name: "Al-Hajj" }, { name: "Al-Mu'minun" }, { name: "An-Nur" },
  { name: "Al-Furqan" }, { name: "Ash-Shu'ara" }, { name: "An-Naml" }, { name: "Al-Qasas" },
  { name: "Al-Ankabut" }, { name: "Ar-Rum" }, { name: "Luqman" }, { name: "As-Sajda" },
  { name: "Al-Ahzab" }, { name: "Saba" }, { name: "Fatir" }, { name: "Ya-Sin" },
  { name: "As-Saffat" }, { name: "Sad" }, { name: "Az-Zumar" }, { name: "Ghafir" },
  { name: "Fussilat" }, { name: "Ash-Shura" }, { name: "Az-Zukhruf" }, { name: "Ad-Dukhan" },
  { name: "Al-Jathiyah" }, { name: "Al-Ahqaf" }, { name: "Muhammad" }, { name: "Al-Fath" },
  { name: "Al-Hujurat" }, { name: "Qaf" }, { name: "Adh-Dhariyat" }, { name: "At-Tur" },
  { name: "An-Najm" }, { name: "Al-Qamar" }, { name: "Ar-Rahman" }, { name: "Al-Waqi'a" },
  { name: "Al-Hadid" }, { name: "Al-Mujadila" }, { name: "Al-Hashr" }, { name: "Al-Mumtahina" },
  { name: "As-Saff" }, { name: "Al-Jumu'a" }, { name: "Al-Munafiqun" }, { name: "At-Taghabun" },
  { name: "At-Talaq" }, { name: "At-Tahrim" }, { name: "Al-Mulk" }, { name: "Al-Qalam" },
  { name: "Al-Haqqah" }, { name: "Al-Ma'arij" }, { name: "Nuh" }, { name: "Al-Jinn" },
  { name: "Al-Muzzammil" }, { name: "Al-Muddathir" }, { name: "Al-Qiyamah" }, { name: "Al-Insan" },
  { name: "Al-Mursalat" }, { name: "An-Naba" }, { name: "An-Nazi'at" }, { name: "Abasa" },
  { name: "At-Takwir" }, { name: "Al-Infitar" }, { name: "Al-Mutaffifin" }, { name: "Al-Inshiqaq" },
  { name: "Al-Buruj" }, { name: "At-Tariq" }, { name: "Al-A'la" }, { name: "Al-Ghashiyah" },
  { name: "Al-Fajr" }, { name: "Al-Balad" }, { name: "Ash-Shams" }, { name: "Al-Lail" },
  { name: "Ad-Duha" }, { name: "Ash-Sharh" }, { name: "At-Tin" }, { name: "Al-Alaq" },
  { name: "Al-Qadr" }, { name: "Al-Bayyina" }, { name: "Az-Zalzalah" }, { name: "Al-Adiyat" },
  { name: "Al-Qari'a" }, { name: "At-Takathur" }, { name: "Al-Asr" }, { name: "Al-Humazah" },
  { name: "Al-Fil" }, { name: "Quraish" }, { name: "Al-Ma'un" }, { name: "Al-Kawthar" },
  { name: "Al-Kafirun" }, { name: "An-Nasr" }, { name: "Al-Masad" }, { name: "Al-Ikhlas" },
  { name: "Al-Falaq" }, { name: "An-Nas" }
];


    const surahContainer = document.getElementById('surah-container');
surahs.forEach((surah, index) => {
    const surahCard = document.createElement('div');
    surahCard.className = 'surah-card';

    const surahLink = document.createElement('a');
    const formattedNumber = (index + 1).toString().padStart(3, '0');
    surahLink.href = `https://quran.com/${formattedNumber}`;
    surahLink.className = 'surah-link';

    const surahContent = document.createElement('div');
    surahContent.className = 'surah-content';

    const surahName = document.createElement('div');
    surahName.className = 'surah-name-arabic';
    surahName.textContent = surah.name;
  
surahContent.appendChild(surahName);

surahLink.appendChild(surahContent);

surahCard.appendChild(surahLink);
surahContainer.appendChild(surahCard);
});
</script></div>
</div>

<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <ul class="navbar-nav nav-underline">
                <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="login.php">login</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="signup.php">signup</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                </ul>
                <hr style="color:aliceblue;" class="featurette-divider">
                <p style="color:aliceblue;">&copy; 2024 جميع الحقوق محفوظة</p>
            </ul>
      </div>
    </div>
  </div>
</footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>