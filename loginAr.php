<?php
            session_start();
            require "connexion.php";

            $err_mss = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
                $email = $_POST["email"];
                $pass = $_POST["password"];
                
                $query = "SELECT * FROM profile WHERE email = :param01 AND password = :param02";
                $resultat = $connexion->prepare($query); 
                $resultat->bindValue(":param01", $email);
                $resultat->bindValue(":param02", $pass);
                $resultat->execute(); 
                
                $x = $resultat->fetch(PDO::FETCH_ASSOC);
                
                if ($x) {
                    $_SESSION["email"] = $x['email'];
                    $_SESSION["password"] = $x['password'];
                    $_SESSION["name"] = $x['name'];
                    $_SESSION["name"] = $x['name'];
                    $_SESSION["gender"] = $x['gender'];
                    $_SESSION["role"] = $x['role'];
                    if (!isset($_SESSION["total_time_spent"])) {
                        $_SESSION["total_time_spent"] = 0;
                    }
                    
                    // Redirect to index.php upon successful login
                    header("Location: indexAr.php");
                    exit();
                    
                } else {
                    $err_mss = "البريد الإلكتروني أو كلمة المرور غير صحيحة"; 
                }
            }
            ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول</title>
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&display=swap" rel="stylesheet">

    <style>
      .navbar-toggler:focus{
            box-shadow: none !important;
            
        }
        .navbar-toggler{
            border: none !important;
        }
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
    text-align: right;
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
      background-color: #C4DFDF;
  }
  nav a.nav-link {
      color: aliceblue;
  }
  .nav-link:hover {
    transform: scale(1.02);
    color: #d1e7dd;
  }
  .form-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: white;
      backdrop-filter: blur(5px);
      border-radius: 30px;
      padding: 30px;
      max-width: 400px;
      margin: auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }
  #container{
    background-image: url("IMGG/470549.jpg");
    background-size: cover;
    height: 100vh;
    display: flex;
    align-items: center;

  }
</style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="logo" href="welcomAr.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="الصفحة الرئيسية"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center">
                        <a style="color:black;font-size:18px" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- المحتوى الرئيسي -->
<div class="p-5 bg-body-tertiary rounded-4" id="container" style= "height: 100vh;">
    <div class="container py-5 text-center">
        <div class="form-container">
            <form method="POST" action="">
                <h3 class="text-light">تسجيل الدخول</h3><br>
                <?php if ($err_mss): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($err_mss); ?></div>
                <?php endif; ?>
                <label for="email" class="text-light">البريد الإلكتروني:</label>
                <input type="email" class="form-control mb-3" id="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
                
                <label for="password" class="text-light">كلمة المرور:</label>
                <input type="password" class="form-control mb-3" id="password" name="password" placeholder="أدخل كلمة المرور الخاصة بك" required>
                
                <button type="submit" class="btn btn-outline-secondary" style="color:white" name="login">تسجيل الدخول</button>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
