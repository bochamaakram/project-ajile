<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["name"]) || !isset($_SESSION["role"]) || !isset($_SESSION["email"])) {
    header("Location: loginAr.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>سور القرآن</title>
  <link rel="icon" href="Logo.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&display=swap" rel="stylesheet">

    <style>
      .amiri-regular {
  font-family: "Amiri", serif;
  font-weight: 400;
  font-style: normal;
}
body{
  font-family: "Amiri", serif;
  font-weight: 400;
  font-style: normal;
}
  header, footer {
      background-color: #C4DFDF;
  }
  nav a.nav-link {
      color: #0F1035;
  }
  .nav-link:hover {
    transform: scale(1.02);
    color: #d1e7dd;
  }
  .about-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #0F1035;
    background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
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
    h1 {
      padding: 20px;
      font-size: 2em;
      color: #006699;
    }
    @font-face {
      font-family: 'PDMS_Saleem_QuranFont';
      src: url('PDMS_Saleem_QuranFont_shipped.ttf') format('truetype');
      font-weight: normal;
      font-style: normal;
    }
    .surah-list {
      max-width: 1000px;
      margin: auto;
      padding: 20px;
      list-style-type: none;
    }
    .surah-item {
      background-color: #DCF2F1;
      padding: 15px;
      border: 1px solid #365486;
      border-radius: 8px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: transform 0.2s, box-shadow 0.2s;
      margin-bottom: 10px;
    }
    .surah-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .surah-name-arabic {
      font-size: 2em;
      color: #333;
      font-family: 'PDMS_Saleem_QuranFont', sans-serif;
      text-align: right;
    }
    .audio-player {
      height: 40px;
      width: 600px;
      margin-right: auto;
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
              <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="distroy.php">تسجيل الخروج</a></li>
              <li class="nav-item d-flex justify-content-left"><a style="color:black;" class="nav-link" href="profilAr.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="quran.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">القرآن</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="quran.php#audio">تسجيل الصوت</a></li>
                  <li><a class="dropdown-item" href="quran.php#juze">أجزاء القرآن</a></li>
                  <li><a class="dropdown-item" href="quran.php#sura">سور القرآن</a></li>
                </ul>
              </li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                </ul>
            </div>
          <a class="logo" href="welcomAr.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="الصفحة الرئيسية"></a>
        </div>
      </nav>
    </div>
</header>
<div class="p-5 rounded-4 backbody container-fluid" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
<h1 class=" d-flex justify-content-center">سور القرآن</h1>
<div class="container">
  <ul class="surah-list" id="surah-list">
    <!-- JavaScript will populate this list -->
  </ul>
</div>
<script>
    const surahs = [
    { name: "الفاتحة" }, { name: "البقرة" }, { name: "آل عمران" }, { name: "النساء" },{ name: "المائدة" }, { name: "الأنعام" }, { name: "الأعراف" }, { name: "الأنفال" },
    { name: "التوبة" }, { name: "يونس" }, { name: "هود" }, { name: "يوسف" },{ name: "الرعد" }, { name: "إبراهيم" }, { name: "الحجر" }, { name: "النحل" },
    { name: "الإسراء" }, { name: "الكهف" }, { name: "مريم" }, { name: "طه" },{ name: "الأنبياء" }, { name: "الحج" }, { name: "المؤمنون" }, { name: "النور" },
    { name: "الفرقان" }, { name: "الشعراء" }, { name: "النمل" }, { name: "القصص" },{ name: "العنكبوت" }, { name: "الروم" }, { name: "لقمان" }, { name: "السجدة" },
    { name: "الأحزاب" }, { name: "سبأ" }, { name: "فاطر" }, { name: "يس" },{ name: "الصافات" }, { name: "ص" }, { name: "الزمر" }, { name: "غافر" },
    { name: "فصلت" }, { name: "الشورى" }, { name: "الزخرف" }, { name: "الدخان" },{ name: "الجاثية" }, { name: "الأحقاف" }, { name: "محمد" }, { name: "الفتح" },
    { name: "الحجرات" }, { name: "ق" }, { name: "الذاريات" }, { name: "الطور" },{ name: "النجم" }, { name: "القمر" }, { name: "الرحمن" }, { name: "الواقعة" },
    { name: "الحديد" }, { name: "المجادلة" }, { name: "الحشر" }, { name: "الممتحنة" },{ name: "الصف" }, { name: "الجمعة" }, { name: "المنافقون" }, { name: "التغابن" },
    { name: "الطلاق" }, { name: "التحريم" }, { name: "الملك" }, { name: "القلم" },{ name: "الحاقة" }, { name: "المعارج" }, { name: "نوح" }, { name: "الجن" },
    { name: "المزمل" }, { name: "المدثر" }, { name: "القيامة" }, { name: "الإنسان" },{ name: "المرسلات" }, { name: "النبأ" }, { name: "النازعات" }, { name: "عبس" },
    { name: "التكوير" }, { name: "الإنفطار" }, { name: "المطففين" }, { name: "الإنشقاق" },{ name: "البروج" }, { name: "الطارق" }, { name: "الأعلى" }, { name: "الغاشية" },
    { name: "الفجر" }, { name: "البلد" }, { name: "الشمس" }, { name: "الليل" },{ name: "الضحى" }, { name: "الشرح" }, { name: "التين" }, { name: "العلق" },
    { name: "القدر" }, { name: "البينة" }, { name: "الزلزلة" }, { name: "العاديات" },{ name: "القارعة" }, { name: "التكاثر" }, { name: "العصر" }, { name: "الهمزة" },
    { name: "الفيل" }, { name: "قريش" }, { name: "الماعون" }, { name: "الكوثر" },{ name: "الكافرون" }, { name: "النصر" }, { name: "المسد" }, { name: "الإخلاص" },
    { name: "الفلق" }, { name: "الناس"}];

  const surahList = document.getElementById('surah-list');

  surahs.forEach((surah, index) => {
    // Create list item
    const listItem = document.createElement('li');
    listItem.className = 'surah-item';

    // Audio link
    const formattedNumber = (index + 1).toString().padStart(3, '0');
    const audioSrc = `https://server6.mp3quran.net/thubti/${formattedNumber}.mp3`;

    // Audio player
    const audioPlayer = document.createElement('audio');
    audioPlayer.controls = true;
    audioPlayer.src = audioSrc;
    audioPlayer.className = 'audio-player';

    // Create link for Surah
    const surahLink = document.createElement('p');
    surahLink.textContent = surah.name;
    surahLink.className = 'surah-name-arabic';

    // Append elements
    listItem.appendChild(audioPlayer);
    listItem.appendChild(surahLink);
    surahList.appendChild(listItem);
  });
</script>
</div>

<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <ul class="navbar-nav">
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="quranAr.php">القرآن</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                </ul>
                <hr style="color:black;" class="featurette-divider">
                <p style="color:black;"> <a style="color:black;" class="nav-link" class="nav-link"  href="https://github.com/bochamaakram"> &copy;جميع الحقوق محفوظة 2024</a></p>
            </ul>
      </div>
    </div>
  </div>
</footer>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
