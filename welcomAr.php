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
      background-color: linear-gradient(135deg, #DCF2F1, #7FC7D9);
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
                    <li class="nav-item d-flex justify-content-center"><a style="color: aliceblue;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
                          <li class="nav-item"><a style="color:aliceblue;"  class="nav-link" href="quranAr.php">القرآن</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="quranaudioAr.php">القرآن الصوتي</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;"  class="nav-link" href="bookpageAr.php">مكتبة</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="loginAr.php">تسجيل الدخول</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="signupAr.php">إنشاء حساب</a></li>
                </ul>
            </div>
            <li class="nav-item d-flex justify-content-left"><a style="color: aliceblue;" class="nav-link" href="profilAr.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="الملف الشخصي"></a></li>
            <li class="nav-item d-flex justify-content-center"><a style="color: aliceblue;" class="nav-link" href="distroy.php">تسجيل الخروج</a></li>
            <li class="nav-item d-flex justify-content-center "><a style="color:#0F1035;" class="nav-link" href="welcom.php">الانجليزية</a></li>
        </div>
      </nav>
    </div>
    </header>
    <!-- الصفحة الرئيسية -->
    <div class="p-5 bg-body-tertiary rounded-4" style="background: linear-gradient(135deg, #7FC7D9, #DCF2F1);">
        <div class="main-wrapper about-container">
            <div class="container py-5 section right col-xs-9">
                <h1 class="display-1 fw-bold" style="color: aliceblue;">معلومات عنا</h1>
                <p class="col-md-8 fs-4" style="color: aliceblue;">
                    مرحبًا بكم في منصتنا! نحن ملتزمون بتوفير الموارد اللازمة لتعلم واستكشاف القرآن الكريم والتعاليم الإسلامية الأخرى.
                    هدفنا هو خدمة الطلاب والعلماء وكل من يهتم بتعميق فهمه للقرآن الكريم والتاريخ الإسلامي.
                </p>
                <div id="gotop">
                    <a href="loginAr.php"><button class="btn btn-outline-primary" type="submit" name="login">تسجيل الدخول</button></a>
                    <a href="signupAr.php"><button class="btn btn-outline-primary" type="submit" name="signup">التسجيل</button></a><br>
                </div>
                <a href="#topbar" id="gotopBtn"><button class="btn btn-outline-primary" type="button">المزيد من المعلومات</button></a>
            </div>
        </div>

        <hr class="featurette-divider">

        <div data-bs-spy="scroll" data-bs-target="#gotop" class="row featurette">
            <div id="topbar" class="topbar col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: aliceblue;">مانجا: Junjika no Rekonin</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: aliceblue;">"هل يجوز قتل الناس؟" قصة انتقام مشوقة كتبها شيريو ناكاتاكي، القادم الجديد في مجلة بيساتسو شونن. شين، إذا تم تحويل شخص ما، دعه يذهب ولا تفعل شيئًا. يجب أن تُمنح له فرصة الولادة من جديد. "جدي، آمل ألا يُعيد تجسيده بنفسه". للتغلب على عدة وحوش غير بشرية، أصبح الصبي شيئًا غير بشري أيضًا. تم تسمية شين أورما، الطالب في الصف السادس، بـ"الجسم التجريبي: أ" من قبل خمسة من زملائه، وتعرض للتنمر القاسي وعاش في الجحيم. كانت راحته الوحيدة مع شقيقه الذي أحبه ووالديه اللذين حماه... حتى قتل الوحوش الخمسة عائلته. عندما فقد كل شيء أخيرًا وواجه الجحيم الحقيقي، وُلدت رغبة مظلمة داخل شين. وُلد من جديد تحت تدريب جده الذي خدم في وحدة سرية خلال الحرب العالمية الثانية. الآن، بعد أربع سنوات، يظهر أمام عدوه المحدد. "لن أسمح لأي أحد أن يقف في طريق انتقامي".</h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="350px" width="250px" src="img/exp (2).jpeg" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8 order-md-2">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: aliceblue;">مانجا: Sakamoto Days</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: aliceblue;">تارو ساكاموتو كان القاتل الأسطوري، يخشاه الأشرار ويُعجب به القتلة المحترفون. ولكن في أحد الأيام... وقع في الحب! تقاعد، وتزوج، وأصبح أباً ثم... زاد وزنه! الرجل البدين الذي يدير المتجر المحلي هو في الحقيقة قاتل أسطوري سابق! هل يستطيع حماية أسرته من الخطر؟ استعد لتجربة جديدة من سلسلة الكوميديا المليئة بالحركة!</h1>
            </div>
            <div class="d-flex justify-content-center col-md-4 order-md-1">
                <img height="350px" width="250px" src="img/exp (3).jpeg" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: aliceblue;">مانجا: Killer Peter</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: aliceblue;">قاتل قديم تعرض للخيانة ولكن تم تجديد شبابه بطريقة ما. ومع ذلك، لم يعد يتعرف عليه أحد؟! "إذاً، سأكون الأقوى مجددًا!" قاتل بييترو، بيادرو القاتل، مانجا بادي هو موقع مخصص لمحبي الأنمي، ألعاب الفيديو، والكوسبلاي. حيث يمكنك العثور على جميع الميمات المتعلقة بالأنمي، التوصيات، المراجعات، اقتراحات المانجا، وأكثر من ذلك. تجد الترجمات المجانية لأحدث المحتويات التي يتم تحديثها باستمرار على مانجا بادي الآن متاحة.</h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="350px" width="250px" src="img/exp (4).jpeg" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="container my-5">
            <div class="position-relative p-5 text-light text-center border border-danger border-4 rounded-5">
                <svg class="bi mt-5 mb-3" style="fill: #288945;" height="100" width="100"><use xlink:href="#geo-fill"></use></svg>
                <h1 class="display-5 fw-bold">المزيد من المانجا؟</h1>
                <p class="col-md-8 fs-4 mx-auto">اكتشف مجموعتنا الكاملة من المانجا المجانية من خلال زيارة موقعنا الإلكتروني <a style="color: #333;" href="https://example.com" target="_blank">هنا</a>.</p>
                <a href="#gotop" id="gotopBtn"><button class="btn btn-outline-success" type="button">العودة للأعلى</button></a>
            </div>
        </div>
    </div>
<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <li class="nav-item d-flex justify-content-center "><h3 style="color:aliceblue;">explore more </h3></li>
                <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" aria-current="page" href="index.html">home page</a></li>
                <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="manga-page.html">More Manga</a></li>
                <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="contact.html">Contact</a></li>
                <hr style="color:aliceblue;" class="featurette-divider">
                <p style="color:aliceblue;">&copy; 2024 جميع الحقوق محفوظة</p>
            </ul>
      </div>
    </div>
</footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

