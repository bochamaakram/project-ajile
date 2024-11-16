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
        background-image: url("IMGG/mos1.jpg");
    background-size: cover;
}
    .about-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #0F1035;
    text-indent: 50px;
    background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
    border-radius: 25px;
    margin: auto;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
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
    .text-center.position-relative.p-5.lead{
            line-height: 40px;
    }
    .text-center.position-relative.p-5.lead span {
        font-size: 30px;
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
                    <li class="nav-item d-flex justify-content-center"><a style="color: black;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="quran.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Quran</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="quran.php#audio">Audio Recording</a></li>
                    <li><a class="dropdown-item" href="quran.php#juze">Quran Juzes</a></li>
                    <li><a class="dropdown-item" href="quran.php#sura">Quran Surahs</a></li>
                </ul>
                </li>
                        <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                        <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpage.php">library</a></li>
                        <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="Prayer.html">Prayer Times</a></li>
                </ul>
            </div>
            <li class="nav-item d-flex justify-content-left"><a style="color: black;" class="nav-link" href="profil.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
            <li class="nav-item d-flex justify-content-center"><a style="color: black;" class="nav-link" href="distroy.php">Log out</a></li>
            <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="welcomAr.php">Arabic</a></li>
        </div>
        </nav>
    </div>
    </header>
    <!-- الصفحة الرئيسية -->
    <div class="p-5 bg-body-tertiary rounded-4" style="background-image:url(IMGG/mos1.jpg);background-size:contain;background-repeat:no-repeat">
        <div class="main-wrapper about-container">
            <div class="container py-5 section right col-xs-9">
                <h1 class="display-1 fw-bold" style="color: black;">Islam</h1>
                <p class=" fs-4" style="color: black;">
                In Islam, purification and prayer are fundamental acts of worship that connect a believer to Allah.
                Wudu (ablution) cleanses both the body and soul, preparing Muslims for Salah (prayer), 
                the cornerstone of faith and devotion. Through these practices, we attain spiritual discipline, 
                mindfulness, and closeness to our Creator.
                Begin your journey with guidance on wudu and prayer below.</p>
                <a href="#topbar" id="gotopBtn"><button class="btn btn-outline-secondary" type="button">More information</button></a>
            </div>
        </div>

        
        <div data-bs-spy="scroll" data-bs-target="#gotop" class="row featurette" style="margin-top: 30px;">
            <div id="topbar" class=" col-md-8">
                <h1 class="text-center position-relative p-5 lead" style="color: black;"> <span>Step 1: Niyyah (Intention)</span>  <br>

The first step in performing wudu is known as “Niyyah” (intention). This involves having the intention to perform wudu and make a firm resolve to obey Allah in this act of worship. It is important to remember that simply intending in your heart alone is not enough—you must verbalize it as well. An example of how one might verbally express their intention could be:

“I intend to perform Wudu, seeking nearness to Allah SWT.”</h1>
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
                <h1 class="text-center position-relative p-5 lead" style="color: black;"> <span>Step 2: Wash Hands</span> <br> 

Once you have made your Niyyah, it’s time to start washing! Begin by rinsing your hands three times with clean water, rubbing them together while doing so. Make sure you reach between your fingers and thumbs during this process. This step symbolizes the importance of cleanliness before beginning wudu and is one of the main ways of cleaning oneself in Islam.</h1>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 lead" style="color: black;"><span>Step 3: Rinse Mouth</span> <br>

The next step is to rinse your mouth three times with a handful of water, making sure to reach all areas inside your mouth (including the gums and back of your tongue). Swallowing some of this water as you are doing so is permissible, but it’s important not to do it excessively so that none of the water remains after completing this process. Again, this step underscores the importance of cleanliness before performing wudu.<h1>
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
                <h1 class="text-center position-relative p-5 lead" style="color: black;"><span>Step 4: Clean Nostrils</span> <br>

After rinsing your mouth, you’ll want to move on to cleaning your nostrils. To do this, take a handful of water in one hand and snort it up into your left nostril three times before repeating the same with the right nostril. Make sure to rub both sides of your nose as you’re doing so. This step is done to ensure that any impurities from inside your nose are removed prior to performing wudu.<h1>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 lead" style="color: black;"><span>Step 5: Wash Face</span> <br>

The fifth step in completing wudu involves washing the face—from the hair-line all the way down to the chin and from one earlobe to the other. Here, you’ll want to use enough water so that it covers your entire face and make sure not to miss any spots! Again, like the previous steps, this step is designed to ensure that any impurities on the face are completely washed off.<h1>
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
                <h1 class="text-center position-relative p-5 lead" style="color: black;"><span>Step 6: Wash Arms</span> <br>

The sixth step in wudu involves washing both arms three times up to and including the elbows. This includes rubbing your hands over each arm from fingertips to elbows, ensuring that all areas of the arm are cleaned before continuing with other parts of wudu. Make sure you use enough water so that it covers your entire arm from wrist to elbow and remember not to forget the spaces between your fingers!<h1>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 lead" style="color: black;"><span>Step 7: Wipe Head</span> <br>

Once you have finished washing your arms, move on to wiping the head. Take a handful of water and pour it over your head (starting at your forehead) so that it covers your entire scalp. Then, use the remaining water to wipe the top and back of your head until it is completely dry. This step symbolizes purity coming from above, as well as humility before Allah SWT.<h1>
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
                <h1 class="text-center position-relative p-5 lead" style="color: black;"><span>Step 8: Wash Feet</span> <br>

The final step in performing wudu is to wash both feet three times up to and including the ankles. Make sure you use enough water so that it covers your entire foot from toes to ankle and don’t forget to rub between each toe! Once again, this step ensures that any impurities on the feet are removed prior to prayer.

Once these 8 steps have been completed, one’s wudu is considered valid and they may proceed to offer prayer. May Allah SWT accept all of our acts of worship and guide us to obey His commands with sincerity and faithfulness. Ameen.<h1>
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
                    <li class="nav-item d-flex justify-content-center"><a style="color: black;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
                          <li class="nav-item d-flex justify-content-center"><a style="color:black;"  class="nav-link" href="quran.php">Quran</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpage.php">library</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="Prayer.html">Prayer Times</a></li>
                </ul>
                <hr style="color:black;" class="featurette-divider">
                <p style="color:black;"> <a style="color:black;" class="nav-link" class="nav-link"  href="https://github.com/bochamaakram">&copy; 2024 All rights reserved</a></p>
            </ul>
      </div>
    </div>
  </div>
</footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>