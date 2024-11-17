<?php
    session_start();
    if(!isset($_SESSION["password"])){ 
        header("Location: indexAr.php");
}
?>
<!DOCTYPE html>
<html lang="en"  >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>منصة ارشاد</title>
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&display=swap" rel="stylesheet"><style>
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
    transform: scale(1.02);
    color: #d1e7dd;
  }
        .navbar-toggler:focus{
            box-shadow: none !important;
            
        }
        .navbar-toggler{
            border: none !important;
        }
  .col-md-8.fs-4{
    direction: rtl;
    text-align: right;
  }
</style>
</head>
<body>
    <header>
    <div class="container-fluid"></div>
        <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="الصفحة الرئيسية"></a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon top-bar"></span>
                <span class="toggler-icon middle-bar"></span>
                <span class="toggler-icon bottom-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center"><a style="color: black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
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
            <li class="nav-item d-flex justify-content-left"><a style="color: black;" class="nav-link" href="profilAr.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
            <li class="nav-item d-flex justify-content-center"><a style="color: black;" class="nav-link" href="distroy.php">تسجيل الخروج</a></li>
            <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="welcom.php">الانجليزية</a></li>
        </div>
      </nav>
    </div>
    </header>
    <!-- الصفحة الرئيسية -->
    <div class="p-5 bg-body-tertiary rounded-4" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
        <div class="main-wrapper about-container">
            <div class="container py-5 section right col-xs-9">
                <h1 class="display-1 " style="color: black;font-weight:100">معلومات عنا</h1>
                <p class="col-md-8 fs-4" style="color: black;">
                    مرحبًا بكم في منصتنا! نحن ملتزمون بتوفير الموارد اللازمة لتعلم واستكشاف القرآن الكريم والتعاليم الإسلامية الأخرى.<br>
                    هدفنا هو خدمة الطلاب والعلماء وكل من يهتم بتعميق فهمه للقرآن الكريم والتاريخ الإسلامي.
                </p>
                <div id="gotop">
                    <a href="loginAr.php"><button class="btn btn-outline-secondary" type="submit" name="login">تسجيل الدخول</button></a>
                    <a href="signupAr.php"><button class="btn btn-outline-secondary" type="submit" name="signup">التسجيل</button></a><br>
                </div>
                <a href="#topbar" id="gotopBtn"><button class="btn btn-outline-secondary" type="button">المزيد من المعلومات</button></a>
            </div>
        </div>

        <hr class="featurette-divider">

        <div data-bs-spy="scroll" data-bs-target="#gotop" class="row featurette">
            <div id="topbar" class="topbar col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">تحفيظ القرآن</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">تحفيظ القرآن الكريم مع قواعد التجويد تحت إشراف نخبة من الشيوخ الكرام</h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="350px" width="250px" src="IMGG/memo (1).jpg" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8 order-md-2">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">القرآن الصوتي</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">وجود مكتبة صوتية كبيرة تتضمن القرآن الكريم برواية ورش عن نافع</h1>
            </div>
            <div class="d-flex justify-content-center col-md-4 order-md-1">
                <img height="350px" width="250px" src="IMGG/audio.jpg" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">مكتبة</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">مكتبة كبيرة تتضمن كتب في الشريعة الإسلامية و الفقه غنية بالمعلومات الدينية و الدنيوية</h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="350px" width="250px" src="IMGG/lib.jpg" alt="">
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="d-flex justify-content-center col-md-4">
                <img height="350px" width="250px" src="IMGG/quran.jpg" alt="">
            </div>
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">القرآن</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">مكتبة قرآنية مقسمة وفق الأجزاء و السور مع إمكانية التحفيظ</h1>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">أوقات الصلاة</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">أوقات الصلوات الخمس وفق كل مدينة</h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="350px" width="250px" src="IMGG/prayer.jpg" alt="">
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="d-flex justify-content-center col-md-4">
                <img height="350px" width="250px" src="IMGG/remote.jpg" alt="">
            </div>
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">تحفيظ القرآن عن بعد</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">تتبع طريقك في حفظ القرآن بعد إرسال مقطع صوتي لشيخك إن تعذر حضورك لدار القرآن  و إستقبال ملاحظاته</h1>
            </div>
        </div>

        

        
    </div>
<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center"><a style="color: black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                          <li class="nav-item d-flex justify-content-center"><a style="color:black;"  class="nav-link" href="quranAr.php">القرآن</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                </ul>
                <hr style="color:black;" class="featurette-divider">
                <p style="color:black;"> <a style="color:black;" class="nav-link" class="nav-link"  href="https://github.com/bochamaakram"> &copy;جميع الحقوق محفوظة 2024</a></p>
            </ul>
      </div>
    </div>
</footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

