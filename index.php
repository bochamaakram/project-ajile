<!DOCTYPE html>
<html lang="en"  >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Irshad.edu </title>
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
</style>
</head>
<body>
  <header>
      <nav class="navbar navbar-expand-lg navbar-light navbar navbar-light ">
      <div class="container-fluid">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="toggler-icon top-bar"></span>
          <span class="toggler-icon middle-bar"></span>
          <span class="toggler-icon bottom-bar"></span>
        </button>
        <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="Homepage"></a>
        <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
              <ul class="navbar-nav nav-underline">
                  <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="quran.php">Quran</a></li>
                  <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                  <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="bookpage.php">Library</a></li>
                  <li class="nav-item d-flex justify-content-center "><a style="color:black;" class="nav-link" href="Prayer.html">Prayer Times</a></li>
              </ul>
        </div>
          <li class="nav-item d-flex justify-content-left"><a style="color: black;" class="nav-link" href="profil.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="profil"></a></li>
          <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="distroy.php">Log out</a></li>
          <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="indexAr.php">Arabic</a></li>
      </div>
    </nav>
  </div>
  </header>
<!--page-->
<div class="p-5 rounded-4 container-fluid " style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
  
  <div class="main-wrapper about-container">
    <div class="container py-5 section right col-xs-9">
      <p class="col-md-8 fs-4 " style="color:#0F1035;">
        Welcome to our platform! We are dedicated to providing resources for learning and exploring the Quran and other Islamic teachings.
      </p>
      <div id="gotop">
        <a href="login.php"><button class="btn btn-outline-secondary" type="button">login</button></a>
        <a href="signup.php"><button class="btn btn-outline-secondary" type="button">signup </button></a><br>
      </div>
    </div>
</div>
    
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

