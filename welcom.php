<?php
    session_start();
    if(!isset($_SESSION["password"])){ 
        header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
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
      background-color: linear-gradient(135deg, #7FC7D9, #DCF2F1);
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
            <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="Homepage"></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
          </button>
          <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center"><a style="color:aliceblue;" class="nav-link" aria-current="page" href="index.php">Home</a></li>
                  <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="quran.php">Quran</a></li>
                  <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                  <li class="nav-item d-flex justify-content-center "><a style="color:aliceblue;" class="nav-link" href="bookpage.php">Library</a></li>
                </ul>
          </div>
        <li class="nav-item d-flex justify-content-left"><a style="color:aliceblue;" class="nav-link" href="profil.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="Profile"></a></li>
        <li class="nav-item d-flex justify-content-center"><a style="color:aliceblue;" class="nav-link" href="distroy.php">Log Out</a></li>
        <li class="nav-item d-flex justify-content-center "><a style="color:#0F1035;" class="nav-link" href="welcomAr.php">Arabic</a></li>
        </div>
      </nav>
    </div>
    </header>

<!-- Main Content -->
<div class="p-5 bg-body-tertiary rounded-4" style="background: linear-gradient(135deg, #7FC7D9, #DCF2F1);">
    <div class="main-wrapper about-container">
        <div class="container py-5 section right col-xs-9">
          <h1 class="display-1 fw-bold" style="color:aliceblue;">About Us</h1>
          <p class="col-md-8 fs-4" style="color:aliceblue;">
            Welcome to our platform! We are dedicated to providing resources for learning and exploring the Quran and other Islamic teachings. Our mission is to serve students, scholars, and anyone interested in deepening their understanding of the Quran and Islamic history.
          </p>
          <div id="gotop">
            <a href="login.php"><button class="btn btn-outline-primary" type="submit" name="login">Login</button></a>
            <a href="signup.php"><button class="btn btn-outline-primary" type="submit" name="signup">Sign Up</button></a><br>
          </div>
        <a href="#topbar" id="gotopBtn"><button class="btn btn-outline-primary" type="button">Learn More</button></a>
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- Featurettes -->
    <div data-bs-spy="scroll" data-bs-target="#gotop" class="row featurette">
      <div id="topbar" class="topbar col-md-8">
        <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color:aliceblue;">Manga: Junjika no Rekonin</h1>
        <h1 class="text-center position-relative p-5 lead" style="color:aliceblue;">
          "Is it okay to kill people?" A thrilling revenge suspense by Shiryu Nakatake. "Shun, if someone is converted, let him go and do nothing. He should be given a chance to be reborn." "Grandpa, I hope he doesn't reincarnate himself." To defeat several non-human monsters, the boy also became something non-human. Shin Uruma, a sixth-grade student, was labeled "Experimental body: A" by five classmates and was severely bullied. He lived in hell until the five monsters killed his family. As he loses everything, a dark "wish" is born inside Shun. Reborn under his grandfather's training, he now seeks revenge.
        </h1>
      </div>
      <div class="d-flex justify-content-center col-md-4">
        <img height="350px" width="250px" src="img/exp (2).jpeg" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-8 order-md-2">
        <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color:aliceblue;">Manga: Sakamoto Days</h1>
        <h1 class="text-center position-relative p-5 lead" style="color:aliceblue;">
          Taro Sakamoto was the ultimate assassin, feared by villains and admired by hitmen. But one day...he fell in love! Now he's a family man who gained weight. The neighborhood store’s chubby owner is a legendary hitman in disguise. Can he protect his family from danger? Get ready for a unique action-comedy series!
        </h1>
      </div>
      <div class="d-flex justify-content-center col-md-4 order-md-1">
        <img height="350px" width="250px" src="img/exp (3).jpeg" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-8">
        <h1 class="text-center position-relative p-5 featurette-heading fw-normal lh-1" style="color:aliceblue;">Manga: Killer Peter</h1>
        <h1 class="text-center position-relative p-5 lead" style="color:aliceblue;">
          An old killer betrayed, rejuvenated, but unrecognized. "Then I'm the strongest again!" Mangabuddy is dedicated to anime, manga, and gaming fans, offering a variety of content, including memes, reviews, fanfiction, and more.
        </h1>
      </div>
      <div class="d-flex justify-content-center col-md-4">
        <img height="350px" width="250px" src="img/exp (4).jpeg" alt="">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- Contact Section -->
    <div class="container my-5">
        <div class="position-relative p-5 text-light text-center border border-danger border-4 rounded-5">
          <h1>Contact Us</h1>
          <p class="col-lg-6 mx-auto mb-4">Feel free to reach out for more information or inquiries.</p>
          <a href="contact.html"><button class="btn btn-outline-danger px-5 mb-5" type="button">Contact List</button></a>
        </div>
    </div>
</div>

<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <li class="nav-item d-flex justify-content-center"><h3 style="color:aliceblue;">Explore More</h3></li>
                <li class="nav-item d-flex justify-content-center"><a style="color:aliceblue;" class="nav-link" href="index.html">Home</a></li>
                <li class="nav-item d-flex justify-content-center"><a style="color:aliceblue;" class="nav-link" href="manga-page.html">More Manga</a></li>
                <li class="nav-item d-flex justify-content-center"><a style="color:aliceblue;" class="nav-link" href="contact.html">Contact</a></li>
                <hr class="featurette-divider">
                <p style="color:aliceblue;">&copy; 2024 All rights reserved</p>
            </ul>
      </div>
    </div>
</footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
