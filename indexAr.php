<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة ارشاد</title>
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
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #0F1035;
    background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
    border-radius: 25px;
    border-radius: 25px;
    margin: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: right;
    width: 70%;
    height: 80%;
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
    padding:0px 60px ;
  }
  
  
  .backbody {
    background-color: linear-gradient(135deg, #D2E9E9, #E3F4F4);
    color: #333;
    direction: rtl;
    text-align: right;
  }
  header, footer {
      background-color: #C4DFDF;
  }
  nav a.nav-link {
      color: #0F1035;
  }
  .nav-link:hover {
    transform: scale(1.07);
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
</style>
</head>
<body>
  <header>
      <div class="container-fluid">
          <nav class="navbar navbar-expand-lg navbar-light">
              <div class="container-fluid">
                  <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="toggler-icon top-bar"></span>
                      <span class="toggler-icon middle-bar"></span>
                      <span class="toggler-icon bottom-bar"></span>
                  </button>
                  <a class="logo" href="welcomAr.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="الصفحة الرئيسية"></a>
                  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                  <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="index.php" id="index">الصفحة الرئيسية</a></li>
                      <ul class="navbar-nav"> 
                          <li class="nav-item dropdown">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="quranAr.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">القرآن</a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="quranAr.php#audio">تسجيل الصوت</a></li>
                                  <li><a class="dropdown-item" href="quranAr.php#juze">أجزاء القرآن</a></li>
                                  <li><a class="dropdown-item" href="quranAr.php#sura">سور القرآن</a></li>
                                </ul>
                              </li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                      </ul>
                  </div>
                    <li class="nav-item d-flex justify-content-left"><a style="color:black;" class="nav-link" href="profilAr.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="distroy.php">تسجيل الخروج</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="index.php">الانجليزية</a></li>
              </div>
          </nav>
      </div>
  </header>
  
  <!-- Page Content -->
  <div class="p-5 rounded-4 backbody container-fluid" id="bbody" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
  <div class="p-5 rounded-4 backbody container-fluid" id="bbody" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
      <div class="main-wrapper about-container">
          <div class="container py-5 section right col-xs-9">
              <p class="col-md-8 fs-4">
                  مرحباً بكم في منصتنا! نحن ملتزمون بتوفير الموارد اللازمة لتعلم واستكشاف القرآن الكريم والتعاليم الإسلامية الأخرى.
              </p>
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