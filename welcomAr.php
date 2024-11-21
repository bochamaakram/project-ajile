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
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&display=swap" rel="stylesheet">

    <style>
        .timeline{
    position: relative;
    top: 250px;
    margin: 50px auto;
    padding: 40px 0px;
    width: 1000px;
    box-sizing: border-box;
}
.timeline::before{
    content: "";
    position: absolute;
    left: 50%;
    width: 4px;
    height: 100%;
    background: rgba(0, 79,252,1);

}
.timeline ul{
    margin: 0;
    padding: 0;
}
.timeline li{
    list-style: none;
    position: relative;
    width: 50%;
    padding: 20px 40px;
    box-sizing: border-box;
}
.timeline li:nth-child(odd){
    float: left;
    text-align: right;
    clear: both;
}
.timeline li:nth-child(even){
    float: right;
    text-align: left;
    clear: both;
}
.content{
    background: #2b2e2d;
    padding: 20px;
    padding-bottom: 20px;
}
.timeline li:nth-child(odd)::before{
    content: "";
    position: absolute;
    top: 24px;
    right: -6px;
    width: 10px;
    height: 10px;
    background: rgba(49, 53, 52, 1);
    border-radius: 50%;
    box-shadow: 0 0 0 3px rgba(0, 79, 252, 1);
}
.timeline li:nth-child(even)::before{
    content: "";
    position: absolute;
    top: 24px;
    left: -4px;
    width: 10px;
    height: 10px;
    background: rgba(49, 53, 52, 1);
    border-radius: 50%;
    box-shadow: 0 0 0 3px rgba(0, 79, 252, 1);
}
.timeline ul li h3{
    margin: 0;
    padding: 0;
    font-weight: 600;
    color: #fff;
}
.timeline ul li p{
    color: #fff;
    margin: 10px 0 0;
    padding: 0;
}
h1{
    color: #fff;
    text-align: center;
    font-size: 60px;
}
ul li:hover{
    border-color: rgb(255, 145, 0) ;
}
#About{
    color:black;
    font-weight: 500;
}
#About:hover{
    transform: scale(1.5);
}
#menu{
    color: black;
    font-weight: 500;
}
#contact{
    color: black;
    font-weight: 500;
}
#menu:hover{
    transform: scale(1.5);
    color: black;
}
#contact:hover{
    transform: scale(1.5);
    color: black;
}
@media (max-width:1000px){
    .timeline{
        width: 100%;
    }
}
@media (max-width:767px){
    .row #car .card{
        display: none;
        float: none;
        width: 40px;
        font-size: small;
    }
    .row #car .card .card-img-top{
        display: none;
    }
    #chi{
        display: none;
    }
    h1{
        text-align: center;
        font-size: 40px;
        padding: 0 20px ;
    }
    .timeline{
        width: 100%;
        padding-bottom: 0;
    }
    .timeline::before{
        left: 20px;
    }
    .timeline li:nth-child(odd),
    .timeline li:nth-child(even){
        width: 100%;
        text-align: left;
        padding-left: 50px;
        padding-bottom: 50px;
    }
    .timeline li:nth-child(odd)::before,
    .timeline li:nth-child(even)::before{
        top: -18px;
        left: 16px;
    }
    .timeline li:nth-child(odd) .time,
    .timeline li:nth-child(even) .time{
        top: -30px;
        left: 50px;
        right: inherit;
    }
}

  body{
  font-family: "Amiri", serif;
  font-weight: 400;
  font-style: normal;
  background: linear-gradient(135deg, #7FC7D9, #DCF2F1);
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
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .main-wrapper {
    height: 100vh;
  }
  .backbody {
      color: #333;
      direction: rtl;
      text-align: right;
  }
  header, footer {
      background-color: #365486;
  }
  nav a.nav-link {
      color: rgb(220, 242, 241);
  }
  .nav-link:hover {
    transform: scale(1.07);
  }
  
  html, body {
    background: linear-gradient(135deg, #7FC7D9, #DCF2F1);
    min-height: 100%;
    margin: 0;
    padding: 0;
    background-attachment: fixed; 
}
.content {
    text-align: right;
    direction: rtl;
}



</style>
</head>
<body>
    <header>
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
<<<<<<< HEAD
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
=======
                    <li class="nav-item d-flex justify-content-center"><a style="color: aliceblue;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                          <li class="nav-item"><a style="color:aliceblue;"  class="nav-link" href="quranAr.php">القرآن</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="loginAr.php">تسجيل الدخول</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="signupAr.php">إنشاء حساب</a></li>
>>>>>>> 9032b1afda11b452f59ed58b3c76cef0158536f7
                </ul>
            </div>
            <li class="nav-item d-flex justify-content-left"><a style="color: aliceblue;" class="nav-link" href="profilAr.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="الملف الشخصي"></a></li>
            <li class="nav-item d-flex justify-content-center"><a style="color: aliceblue;" class="nav-link" href="distroy.php">تسجيل الخروج</a></li>
            <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="welcom.php">الانجليزية</a></li>
        </div>
      </nav>
    </div>
    </header>
    <!-- الصفحة الرئيسية -->
    <div class="p-5 bg-body-tertiary rounded-4" >
        <div class="main-wrapper about-container">
            <div class="container py-5 section right col-xs-9">
                <div class="timeline">
                  <ul>
                    <li>
                      <div class="content">
                        <h3 style="text-align: initial;">تحفيظ القرآن</h3>
                        <p style="text-align: initial;">تحفيظ القرآن الكريم مع قواعد التجويد تحت إشراف نخبة من الشيوخ الكرام</p>
                      </div>
                    </li>
                    <li>
                      <div class="content">
                        <h3> القرآن الصوتي</h3>
                        <p>مكتبة صوتية كبيرة تتضمن القرآن الكريم برواية ورش عن نافع</p>
                      </div>
                    </li>
                    <li>
                      <div class="content">
                        <h3 style="text-align: initial;"> مكتبة</h3>
                        <p style="text-align: initial;">مكتبة كبيرة تتضمن كتب في الشريعة الإسلامية و الفقه غنية بالمعلومات الدينية و الدنيوية</p>
                      </div>
                    </li>
                    <li>
                      <div class="content">
                        <h3 > القرآن الكريم</h3>
                        <p>مكتبة قرآنية مقسمة وفق الأجزاء و السور مع إمكانية التحفيظ</p>
                      </div>
                    </li>
                    <li>
                      <div class="content">
                        <h3 style="text-align: initial;"> أوقات الصلاة</h3>
                        <p style="text-align: initial;">أوقات الصلوات الخمس وفق كل مدينة</p>
                      </div>
                    </li>
                    <li>
                      <div class="content">
                        <h3> الحفظ عن بعد</h3>
                        <p>تتبع طريقك في حفظ القرآن بعد إرسال مقطع صوتي لشيخك إن تعذر حضورك لدار القرآن  و إستقبال ملاحظاته</p>
                      </div>
                    </li>
                  </ul>
                </div>
      </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

