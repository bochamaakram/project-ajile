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
    backdrop-filter: blur(15px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 25px;
    width: 70%;
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
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 1100px;
    text-align: center;
    margin:30px ;
  }
  
  .backbody {
      color: #333;
      direction: rtl;
      text-align: right;
  }
  footer {
      background-color: #C4DFDF;
  }
  
  header{
    backdrop-filter: blur(10px);
    position: absolute;
    top:0 ;
    width: 100%;
    z-index: 20;
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
        .col-md-8.fs-4{
    direction: ltr;
    text-align: left;
  }
  #F1{
    height: 100vh;
    background-image: url("IMGG/inside.webp");
    background-size: cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
    .btn{
        color: white;
    }
    .container{
        padding: 20px;
        margin: 0px;
    }
  /* Remove padding for screens smaller than 400px */
  h3{
    font-weight: bold !important;
  }
  @media (max-width: 600px) {
    h3 {
      font-weight: small !important;
      font-size: 0.9rem;
      padding: 0;
    }
  #F1{
    background-image: url("IMGG/well.jpg");
    background-size: cover;
    background-repeat: no-repeat;
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
    max-width: fit-content;
    justify-content: center;
    align-items: center;
    padding:10px ;
  }
  .btn {
    width: 100%;
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
  }
</style>
</head>
<div id="F1"class="container-fluid">
<body>
    <header>
    <div class="container-fluid">
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
                <a class="nav-link dropdown-toggle nav-item d-flex justify-content-center" href="quran.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Quran</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="quran.php#audio">Audio Recording</a></li>
                  <li><a class="dropdown-item" href="quran.php#juze">Quran Juzes</a></li>
                  <li><a class="dropdown-item" href="quran.php#sura">Quran Surahs</a></li>
                </ul>
              </li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;"  class="nav-link" href="bookpage.php">library</a></li>
                          <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-item d-flex justify-content-center" href="quran.php" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">Prayer times</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Prayer.html#pray">Prayer times</a></li>
                            <li><a class="dropdown-item" href="Prayer.html#tasbih">Tasbih</a></li>
                            <li><a class="dropdown-item" href="Prayer.html#tasbih">Adkar</a></li>
                        </ul>
                    </li>
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="islam.php">Islam</a></li>
                </ul>
            </div>
            <li class="nav-item d-flex justify-content-left"><a style="color: black;" class="nav-link" href="profil.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
            <li class="nav-item d-flex justify-content-center"><a style="color: white;" class="nav-link" href="distroy.php">Log out</a></li>
            <li class="nav-item d-flex justify-content-center "><a style="color:black;background-color:#C4DFDF;border-radius: 10px;" class="nav-link" href="welcomAr.php">Arabic</a></li>
        </div>
      </nav>
    </div>
    </header>
    <!-- الصفحة الرئيسية -->
    <div class="main-wrapper about-container">
            <div class="container section right ">
                <h1 class="display-1" style="color: black;font-weight:100">About Us</h1>
                <h3 style="color: black;">
Welcome to our platform! We are committed to providing the necessary resources to learn and explore the Holy Quran and other Islamic teachings.
                    Our goal is to serve students, scholars and anyone interested in deepening their understanding of the Holy Quran and Islamic history.
                </h3>
                <div id="gotop">
                    <a href="#topbar" id="gotopBtn"><button class="btn btn-outline-secondary" type="button">More information</button></a>
                    <a href="login.php"><button class="btn btn-outline-secondary" type="submit" name="login">login</button></a>
                    <a href="signup.php"><button class="btn btn-outline-secondary" type="submit" name="signup">signup</button></a>
                </div>
            </div>
        </div>
</div>

    <div class="p-5 bg-body-tertiary rounded-4" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
        <hr class="featurette-divider"id="topbar">

        <div data-bs-spy="scroll" data-bs-target="#gotop" class="row featurette">
            <div  class=" col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">Quran Memorization</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">Memorization of the Holy Quran with the rules of intonation under the supervision of a group of honorable sheikhs<</h1>
            </div>
            <div class="d-flex justify-content-center col-md-4">
                <img height="350px" width="250px" src="IMGG/memo (1).jpg" alt="">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="d-flex justify-content-center col-md-4 ">
                <img height="350px" width="250px" src="IMGG/audio.jpg" alt="">
            </div>
            <div class="col-md-8 ">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">Quran audio</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">A large audio library that includes the Holy Quran with the narration of Warsh from Nafi</h1>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">library</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">A large library that includes books on Islamic law and jurisprudence rich in religious and worldly information<h1>
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
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">Quran</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">Quranic library divided according to parts and surahs with the possibility of memorization<h1>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-8">
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">Prayer Times</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">The times of the five prayers according to each city<h1>
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
                <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color: black;">Memorizing the Quran remotely</h1>
                <h1 class="text-center position-relative p-5 lead" style="color: black;">Follow your way in memorizing the Quran after sending an audio clip to your sheikh if you cannot attend the House of Quran and receive his notes<h1>
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
                          <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="islam.php">Islam</a></li>
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