<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة إرشاد</title>
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&display=swap" rel="stylesheet">

    <style>
body{
  font-family: "Amiri", serif;
  font-weight: 400;
  font-style: normal;
  height: 100vh;
  background-image: url("IMGG/h2.webp");
  background-size: cover;
  background-repeat: no-repeat
}
  .about-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #0F1035;
    border-radius: 25px;
    margin: auto;
    backdrop-filter: blur(5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: right;
    width: 70%;
    height: 80%;
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
    padding:0px 60px ;
  }
  
  .backbody {
    background-color: linear-gradient(135deg, #D2E9E9, #E3F4F4);
    color: #333;
    direction: rtl;
    text-align: right;
  }
  header, footer {
    backdrop-filter: blur(5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }
  nav a.nav-link {
      color: #0F1035;
  }
  .nav-link:hover {
    transform: scale(1.07);
    color: #d1e7dd;
  }
        .navbar-toggler:focus{
            box-shadow: none !important;
            
        }
        .navbar-toggler{
            border: none !important;
        }
        #bbody{
          height: 89vh;
    display: flex;
    align-items: center;
        }
  #index{
    background-color: #E3F4F4;
    border-radius: 20px 10px;
    transform: scale(1);
  }
  /* Remove padding for screens smaller than 400px */
  h3{
    font-weight: bold !important;
  }
  @media (max-width: 600px) {
    h3 {
      font-weight: small !important;
      font-size: 0.85rem;
      padding: 0;
    }
      body{
        background-image: url("IMGG/indexmini.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        
      }
    nav a.nav-link {
        font-size: 14px; /* Make navbar links smaller */
    }

    .navbar-toggler {
        font-size: 18px; /* Adjust toggle size */
    }

    .text-center.position-relative.p-5.lead {
        line-height: 30px; /* Reduce line height */
    }

    .text-center.position-relative.p-5.lead span {
        font-size: 20px; /* Reduce span font size */
    }

    .introduction {
        height: auto; /* Allow height to adjust dynamically */
        padding: 20px; /* Add padding for spacing */
    }
.about-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #0F1035;
    border-radius: 25px;
    backdrop-filter: blur(5px);
    margin: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: left;
    width: 70%;
    height: fit-content;
}
    .p-5 {
    padding: 0 !important;
}
  .section {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding:10px ;
  }
  .navbar>.container, .navbar>.container-fluid, .navbar>.container-lg, .navbar>.container-md, .navbar>.container-sm, .navbar>.container-xl, .navbar>.container-xxl {
    display: flex;
    flex-wrap: inherit;
    align-items: center;
    align-content: flex-start;
    justify-content: space-around;
}
  }
</style>
</head>
<body>
    <header >
    <div >
        <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid" >
            
            <li class="nav-item d-flex justify-content-center "><a style="color:black;background-color:#C4DFDF;border-radius: 10px;" class="nav-link" href="index.php">الانجليزية</a></li>
            <li class="nav-item d-flex justify-content-center"><a style="color: white;" class="nav-link" href="distroy.php">تسجيل الخروج</a></li>
            <li class="nav-item d-flex justify-content-left"><a style="color: black;" class="nav-link" href="profilAr.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>

            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon top-bar"></span>
                <span class="toggler-icon middle-bar"></span>
                <span class="toggler-icon bottom-bar"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="islamAr.php">إسلام</a></li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-item d-flex justify-content-center" href="PrayerAr.html" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;" class="click">مواقيت الصلاة</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="PrayerAr.html#audio">مواقيت الصلاة</a></li>
                        <li><a class="dropdown-item" href="PrayerAr.html#juze">تسبيح</a></li>
                        <li><a class="dropdown-item" href="PrayerAr.html#sura"style="z-index:3;">الأذكار</a></li>
                    </ul>
                    </li>
                <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                    <li class="nav-item dropdown" style="position: relative;z-index: 10">
                        <a class="nav-link dropdown-toggle nav-item d-flex justify-content-center" href="quran.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">القرآن</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="quran.php#audio">تسجيل الصوت</a></li>
                    <li><a class="dropdown-item" href="quran.php#juze">أجزاء القرآن</a></li>
                    <li><a class="dropdown-item" href="quran.php#sura">سور القرآن</a></li>
                </ul>
                </li>
                <li class="nav-item d-flex justify-content-center"><a style="color:black;background-color:#C4DFDF;border-radius: 10px; padding: 5px;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                </ul>
            </div>
            <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="الصفحة الرئيسية"></a>
            
        </div>
        </nav>
    </div>
    </header>
  
  <!-- Page Content -->
  <div class="p-5 rounded-4 backbody container-fluid" id="bbody" >
      <div class="main-wrapper about-container">
          <div class="container py-5 section right col-xs-9">
              <h3>
                  مرحباً بكم في منصتنا! نحن ملتزمون بتوفير الموارد اللازمة لتعلم واستكشاف القرآن الكريم والتعاليم الإسلامية الأخرى.
              </h3>
              <div id="gotop" class="d-flex gap-2">
                  <a href="loginAr.php"><button class="btn btn-outline-secondary" type="button">تسجيل الدخول</button></a>
                  <a href="signupAr.php"><button class="btn btn-outline-secondary" type="button">التسجيل</button></a>
              </div>
          </div>
      </div>
  </div>
    
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
