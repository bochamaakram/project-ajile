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
                  $_SESSION["user_id"] = $x['user_id'];
                  $_SESSION["name"] = $x['name'];
                  $_SESSION["gender"] = $x['gender'];
                  $_SESSION["role"] = $x['role'];
                  $_SESSION["login_time"] = time();
                  if (!isset($_SESSION["total_time_spent"])) {
                      $_SESSION["total_time_spent"] = 0;
                  }
                  
                  // Redirect to index.php upon successful login
                  header("Location: index.php");
                  exit();
              } else {
                  $err_mss = "Incorrect email or password"; 
              }
            }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <style>
      .navbar-toggler:focus{
            box-shadow: none !important;
            
        }
        .navbar-toggler{
            border: none !important;
        }
      body{
        font-family: "Urbanist", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
        background-image: url("IMGG/470549.jpg");
        background-size: cover;
        background-repeat: no-repeat;
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
  
  
  nav a.nav-link {
      color: aliceblue;
  }
  .nav-link:hover {
    transform: scale(1.07);
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
  
  .container-fluid{
    background-color: rgba(255, 255, 255, 0); 
    backdrop-filter: blur(600px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}
  
</style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid" id="navv">
            <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="Homepage"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center">
                        <a style="color:white;" class="nav-link" aria-current="page" href="index.php">Home Page</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Main Content -->
<div class="p-5 bg-body-tertiary rounded-4" id="container" style=" height: 100vh;">
    <div class="container py-5 text-center">
                <div class="form-container ">
            <form method="POST" action="">
                <h3 class="text-light">Login</h3><br>
                <label for="email" class="text-light">Email:</label>
                <input type="email" class="form-control mb-4 " id="email" name="email" placeholder="Enter your email" required>
                
                <label for="password" class="text-light">Password:</label>
                <input type="password" class="form-control mb-4" id="password" name="password" placeholder="Enter your password" required>
                <?php if ($err_mss): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($err_mss); ?></div>
                <?php endif; ?> 
                
                <button type="submit" class="btn btn-outline-secondary" style="color:white" name="login">Login</button>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>