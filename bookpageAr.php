<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["name"]) || !isset($_SESSION["role"]) || !isset($_SESSION["email"])) {
    header("Location: loginAr.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en"  >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akram Manga </title>
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
      .about-container {
          font-family: "Urbanist", sans-serif;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          color: #0F1035;
          background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
          border-radius: 15px;
          margin: auto;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
          text-align: center;
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
      .backbody {
          background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
          color: #333;
          text-align: center;
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
      .card-M {
          transition: all 0.3s;
          opacity: .9;
      }
      .card-M:hover {
          scale: 1.05;
          color: #835ef1;
          opacity: 1;
      }
        .navbar-toggler:focus{
            box-shadow: none !important;
            
        }
        .navbar-toggler{
            border: none !important;
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
          <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="quran.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">القرآن</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="quran.php#audio">تسجيل الصوت</a></li>
                  <li><a class="dropdown-item" href="quran.php#juze">أجزاء القرآن</a></li>
                  <li><a class="dropdown-item" href="quran.php#sura">سور القرآن</a></li>
                </ul>
              </li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                </ul>
          </div>
          <a class="logo" href="welcomAr.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="الصفحة الرئيسية"></a>
        </div>
      </nav>
    </div>
</header>
<!--page-->

<div class="p-5 rounded-4 backbody container-fluid" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
    <hr class="featurette-divider">

    <div data-bs-spy="scroll" data-bs-target="#gotop" class="row featurette">
      <div id="topbar" class="col">
        <div class="row d-flex justify-content-center ">
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/1KZUEauZ_38OpkGtgi_YZws27KEi4wgMM/view?usp=drive_link"><img class="card-M" src="IMGG/img (8).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;" >أحاديث الأذكار و الأدعية</h2>
            </div>
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/10WgZ9sL6acn3UBwBoWJd_rBacW8lPh3y/view?usp=drive_link"><img class="card-M" src="IMGG/img (6).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">السنة لابن ابي العاصم</h2>
            </div>
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/1eQr_B2jJ_3HVD53GoVBuQS4waxDKpGs3/view?usp=drive_link"><img class="card-M" src="IMGG/img (4).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">السنن  للإمام أبي داود</h2>
            </div>
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/1G_8QJeHLrPB5RKo88is3NdVvanq6_4SH/view?usp=drive_link"><img class="card-M" src="IMGG/img (2).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">الموطأ برواية أبي مصعب الزهر برواية الليثي</h2>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row d-flex justify-content-center ">
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/1pN5p0MYc78UIvbGBRGSMyZaWugFgF3sR/view?usp=drive_link"><img class="card-M" src="IMGG/img (3).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">الوجيز في أحكام الصيام</h2>
            </div>
            <div class="col text-center">
                <a href="PDFs/تفسير_الموطأ_لأبي_المطرف_الأندلسي.pdf"><img class="card-M" src="IMGG/img (10).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">تفسير الموطأ لأبي المطرف الأندلسي</h2>
            </div>
            <div class="col text-center">
                <a href="PDFs/سنن_الترمذي_وهو_الجامع_الكبير_ط_التأصيل.pdf"><img class="card-M" src="IMGG/img (1).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">سنن الترمذي</h2>
            </div>
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/1qAMQ7HPJx3HDKys5FaioKV1_u7hg4rUZ/view?usp=drive_link"><img class="card-M" src="IMGG/img (7).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">شرح الأصول الثلاثة للغنيمان</h2>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row d-flex justify-content-center ">
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/12jbO3S2IZtsjeC-1dfQtMNryBVJv0oUg/view?usp=drive_link"><img class="card-M" src="IMGG/img (9).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">شرح كشف الشبهات</h2>
            </div>
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/15riOTOjdUJlhhiJxXomjfd_8iqsy_Oh7/view?usp=drive_link"><img class="card-M" src="IMGG/img (5).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">صحيح البخاري</h2>
            </div>
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/1oaxXNsN4dAn2DgEZ7FUxvMLZXe0vctP4/view?usp=drive_link"><img class="card-M" src="IMGG/img (12).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">صحيح مسلم</h2>
            </div>
            <div class="col text-center">
                <a href="https://drive.google.com/file/d/1IUZEWUCFbG9yEmG0TZ8j6ljhDrdbu5QA/view?usp=drive_link"><img class="card-M" src="IMGG/img (11).jpg" height="350px" width="250px" alt=""></a>
                <h2 class="" style="color:black;">كتاب التوحيد</h2>
            </div>
        </div>
        <hr class="featurette-divider">
        </div>
    </div>
    <hr class="featurette-divider">
<div class="container py-5 section right col-xs-9"><a href="#"><img src="IMGG/up.png" alt=""></a></div>
</div>
</div>
<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="quranAr.php">القرآن</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                </ul>
                <p style="color:black;"> <a style="color:black;" class="nav-link" class="nav-link"  href="https://github.com/bochamaakram"> &copy;جميع الحقوق محفوظة 2024</a></p>
            </ul>
      </div>
    </div>
</div>
</footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

