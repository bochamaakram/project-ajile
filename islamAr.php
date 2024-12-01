<!DOCTYPE html>
<html lang="en"  >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Irshad.edu</title>
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
    text-indent: 50px;
    backdrop-filter: blur(5px);
    border-radius: 25px;
    margin: auto;
    background-image: url("IMGG/470549.jpg");
    text-align: left;
    width: 80%;
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
    height: 100vh;
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
footer {
    
    background-color: #C4DFDF;
    
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
    .text-center.position-relative.p-5.lead{
            line-height: 40px;
    }
    .text-center.position-relative.p-5.lead span {
        font-size: 30px;
    }
    .introduction {
    background-image: url("IMGG/pexels.jpg");
    background-size: cover;
    background-repeat: no-repeat; 
    color: white;
    height: 100vh; 
    display: flex; 
    flex-direction: column; 
    justify-content: flex-start;
    align-items: center; 
    text-align: center; 
    position: relative; 
    padding-top: 0; 
}

header {
    background-color: rgba(255, 255, 255, 0); 
    backdrop-filter: blur(600px); 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); 
    width: 100%; 
    position: absolute; 
    top: 0; 
    z-index: 10; 
}

.introduction-content {
    margin: 60px 80px;
    padding: 120px; 
    text-indent: 20px;
    text-indent: 20px;
    text-align: center;
    font-weight: bold !important;
    font-size: 2rem;
}
#is{
    background-color: #E3F4F4;
    border-radius: 10px 20px;
}
#index{
    background-color: #E3F4F4;
    border-radius: 20px 10px;
}
.col-md-8 h1 {
    text-align: right;
    letter-spacing: 1.5px;
    line-height: 40px;
}
.col-md-8 h1 span{
    font-size: 30px;
    font-weight: bold;
}
    .btn{
        color: white;
    }
  /* Remove padding for screens smaller than 400px */
  @media (max-width: 600px) {
    .introduction-content {
        margin: 50% 10%;
        padding: 10px;
        text-indent: 20px;
        text-indent: 20px;
        text-align: center;
        font-weight: normal !important;
        font-size: 1rem;
    }
    .p-5 {
    padding: 10px !important;
}
  }
</style>
</head>
<body>
    <!-- الصفحة الرئيسية -->
    <div class="introduction">
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
                  <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="index.php">الصفحة الرئيسية</a></li>
                      <ul class="navbar-nav"> 
                          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="quran.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">القرآن</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="quranAr.php#audio">تسجيل الصوت</a></li>
                  <li><a class="dropdown-item" href="quranAr.php#juze">أجزاء القرآن</a></li>
                  <li><a class="dropdown-item" href="quranAr.php#sura">سور القرآن</a></li>
                </ul>
              </li>
            
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                          <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="quranAr.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">مواقيت الصلاة</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="PrayerAr.html#pray">مواقيت الصلاة</a></li>
                            <li><a class="dropdown-item" href="PrayerAr.html#gotop">تسبيح</a></li>
                            <li><a class="dropdown-item" href="PrayerAr.html#gotop">الاذكار</a></li>
                        </ul>
                    </li>
                      </ul>
                      <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="islamAr.php" id="index">إسلام</a></li>
                  </div>
                    <li class="nav-item d-flex justify-content-left"><a style="color:black;" class="nav-link" href="profilAr.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="distroy.php">تسجيل الخروج</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="islam.php">الانجليزية</a></li>
              </div>
          </nav>
      </div>
  </header>
    <div class="introduction-content">
        <h1 class="display-1 fw-bold">الإسلام</h1>
        <p>
            
في الإسلام، يعتبر الطهارة والصلاة من العبادات الأساسية التي تربط المؤمن بالله <br>
الوضوء يطهر الجسد والروح، ويهيئ المسلمين للصلاة، حجر الأساس للإيمان والتقوى<br>
 ومن خلال هذه الممارسات، نحقق الانضباط الروحي، واليقظة، والقرب من خالقنا<br>
 ابدأ رحلتك بالإرشادات حول الوضوء والصلاة أدناه

        </p>
        <a href="#topbar" id="gotopBtn">
            <button class="btn btn-outline-secondary" type="button" style="font-weight:600">مزيد من المعلومات</button>
        </a>
    </div>
</div>


    <div class="p-5 bg-body-tertiary rounded-4" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">

        
    <hr class="featurette-divider"id="topbar">
        <div data-bs-spy="scroll" data-bs-target="#gotop" class="row featurette" style="margin-top: 30px;">
            <div  class=" col-md-8">
                <h1 class="text position-relative p-5 lead" style="color: black;"> <span>الخطوة الأولى: النية</span>  <br>

                الخطوة الأولى في الوضوء تُعرف باسم "النية" <br>
 وتتضمن هذه النية أن يكون لديك نية الوضوء وتتخذ قرارًا حازمًا بطاعة الله في هذا العمل العبادي <br>
 من المهم أن تتذكر أن مجرد النية في قلبك وحدها لا تكفي - يجب عليك أيضًا النطق بها <br>
 مثال على كيفية التعبير عن نيتك لفظيًا يمكن أن يكون: "أنوي أن أتوضأ، أسعى إلى التقرب إلى الله سبحانه وتعالى
</h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="250px" width="400px" src="IMGG/wudu/niya.jpeg" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="d-flex justify-content-center col-md-4 ">
                <img height="250px" width="400px" src="IMGG/wudu/hand1.jpeg" alt="">
            </div>
            <div class="col-md-8 ">
                <h1 class="text position-relative p-5 lead" style="color: black;"> <span >الخطوة الثانية: غسل اليدين</span> <br> 
                بمجرد أن تنتهي من النية<br>
 حان وقت البدء في الغسل! ابدأ بشطف يديك ثلاث مرات بالماء النظيف، وافركهما معًا أثناء القيام بذلك<br>
 تأكد من الوصول إلى ما بين أصابعك وإبهامك أثناء هذه العملية<br>
ترمز هذه الخطوة إلى أهمية النظافة قبل بدء الوضوء وهي إحدى الطرق الرئيسية لتنظيف النفس في الإسلام
</h1>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text position-relative p-5 lead" style="color: black;"><span>الخطوة 3: شطف الفم</span> <br>
                الخطوة التالية هي المضمضة ثلاث مرات بكمية من الماء <br>
 مع الحرص على الوصول إلى جميع المناطق داخل الفم (بما في ذلك اللثة وظهر اللسان) <br>
 ويجوز بلع بعض هذا الماء أثناء القيام بذلك <br>
 ولكن من المهم عدم المبالغة في ذلك حتى لا يبقى شيء من الماء بعد إتمام هذه العملية <br>
 ومرة أخرى، تؤكد هذه الخطوة على أهمية النظافة قبل أداء الوضوء
<h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="250px" width="400px" src="IMGG/wudu/mouth.jpeg" alt="">
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="d-flex justify-content-center col-md-4">
                <img height="250px" width="400px" src="IMGG/wudu/noise.jpeg" alt="">
            </div>
            <div class="col-md-8">
                <h1 class="text position-relative p-5 lead" style="color: black;"><span>الخطوة 4: تنظيف فتحتي الأنف</span> <br>

                بعد المضمضة، عليك أن تنتقل إلى تنظيف فتحتي الأنف <br>
 للقيام بذلك، خذ حفنة من الماء في يدك واستنشقها في فتحة الأنف اليسرى ثلاث مرات <br>
 قبل أن تكرر نفس الشيء مع فتحة الأنف اليمنى <br>
 تأكد من فرك جانبي أنفك أثناء القيام بذلك. يتم القيام بهذه الخطوة للتأكد من إزالة أي شوائب من داخل أنفك قبل أداء الوضوء
<h1>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text position-relative p-5 lead" style="color: black;"><span>الخطوة 5: غسل الوجه</span> <br>

                الخطوة الخامسة في إتمام الوضوء هي غسل الوجه <br>
 من منبت الشعر حتى الذقن ومن شحمة الأذن إلى شحمة الأذن الأخرى <br>
ستحتاج إلى استخدام كمية كافية من الماء بحيث تغطي وجهك بالكامل وتأكد من عدم تفويت أي بقع <br>
 مرة أخرى مثل الخطوات السابقة، تم تصميم هذه الخطوة لضمان غسل أي شوائب على الوجه تمامًا
<h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="250px" width="400px" src="IMGG/wudu/face.jpeg" alt="">
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="d-flex justify-content-center col-md-4">
                <img height="250px" width="400px" src="IMGG/wudu/hand2.jpeg" alt="">
            </div>
            <div class="col-md-8">
                <h1 class="text position-relative p-5 lead" style="color: black;"><span>الخطوة 6: غسل الذراعين</span> <br>

                الخطوة السادسة في الوضوء هي غسل الذراعين ثلاث مرات حتى المرفقين <br>
 ويشمل ذلك فرك اليدين على كل ذراع من أطراف الأصابع إلى المرفقين <br>
 والتأكد من تنظيف جميع مناطق الذراع قبل الاستمرار في أجزاء أخرى من الوضوء <br>
 تأكد من استخدام كمية كافية من الماء بحيث تغطي ذراعك بالكامل من الرسغ إلى المرفق <br>
وتذكر ألا تنسى المسافات بين الأصابع
<h1>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text position-relative p-5 lead" style="color: black;"><span>الخطوة 7: امسح الرأس</span> <br>

                بعد الانتهاء من غسل اليدين انتقل إلى مسح الرأس <br>
 خذ حفنة من الماء واسكبها على رأسك (بدءًا من جبهتك) بحيث تغطي فروة رأسك بالكامل <br>
 ثم استخدم الماء المتبقي لمسح الجزء العلوي والخلفي من رأسك حتى يجف تمامًا <br>
 هذه الخطوة ترمز إلى الطهارة القادمة من الأعلى، وكذلك التواضع أمام الله سبحانه وتعالى
<h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="250px" width="400px" src="IMGG/wudu/hair.jpeg" alt="">
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="d-flex justify-content-center col-md-4">
                <img height="250px" width="400px" src="IMGG/wudu/feet.jpeg" alt="">
            </div>
            <div class="col-md-8">
                <h1 class="text position-relative p-5 lead" style="color: black;"><span>الخطوة 8: غسل القدمين</span> <br>
                الخطوة الأخيرة في الوضوء هي غسل القدمين ثلاث مرات حتى الكعبين <br>
 تأكد من استخدام كمية كافية من الماء <br>
 بحيث تغطي قدمك بالكامل من أصابع القدم إلى الكاحل ولا تنس أن تفرك بين كل إصبع <br>
 ومرة أخرى، تضمن هذه الخطوة إزالة أي شوائب على القدمين قبل الصلاة <br>
 بمجرد إكمال هذه الخطوات الثماني <br>
 يُعتبر الوضوء صحيحًا ويمكن للمرء المضي قدمًا في أداء الصلاة <br>
 نسأل الله سبحانه وتعالى أن يتقبل جميع أعمال عبادتنا ويهدينا إلى طاعة أوامره بإخلاص وإخلاص <br>
 آمين
<h1>
            </div>
        </div>
        </div>
    </div>
    </div>
    <footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="PrayerAr.html">مواقيت الصلاة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="quranAr.php">القرآن</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                    <hr class="featurette-divider">
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