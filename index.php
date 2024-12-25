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
        height: 100vh;
        background-image: url("IMGG/h2.webp");
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
    border-radius: 10px 20px;
  }
  /* Remove padding for screens smaller than 400px */
  h3{
    font-size: 1.4rem;
  }
  @media (max-width: 600px) {
    h3 {
      font-weight: small !important;
      font-size: 0.85rem;
      padding: 0;
    }
    .p-5 {
    padding: 0 !important;
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
    justify-content: space-around;
}
  }
</style>
</head>
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
                    <li class="nav-item d-flex justify-content-center"><a style="color:black;background-color:#C4DFDF;border-radius: 10px; padding: 5px;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
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
            <li class="nav-item d-flex justify-content-center "><a style="color:black;background-color:#C4DFDF;border-radius: 10px;" class="nav-link" href="indexAr.php">Arabic</a></li>
        </div>
      </nav>
    </div>
    </header>
<!--page-->
<div class="p-5 rounded-4 container-fluid " id="bbody" >
  
  <div class="main-wrapper about-container">
    <div class="container py-5 section right col-xs-9">
      <h3 style="color:#0F1035;">
        Welcome to our platform! We are dedicated to providing resources for learning and exploring the Quran and other Islamic teachings.
      </h3>
      <div id="gotop">
        <a href="login.php"><button class="btn btn-outline-secondary" type="button">login</button></a>
        <a href="signup.php"><button class="btn btn-outline-secondary" type="button">signup </button></a><br>
      </div>
    </div>
</div>
    
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

