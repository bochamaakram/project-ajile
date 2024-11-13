<?php
            require "connexion.php";
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $age = $_POST['age'];
                $role = $_POST['role'];
                if (!empty($name) && !empty($gender) && !empty($email) && !empty($password) && !empty($age) && !empty($role)) {
                    $query = "INSERT INTO profile (name, gender, email, password, age, role) VALUES(:param1, :param2, :param3, :param4, :param5, :param6)";
                    $resultat = $connexion->prepare($query);
                    $resultat->bindValue(":param1", $name);
                    $resultat->bindValue(":param2", $gender);
                    $resultat->bindValue(":param3", $email);
                    $resultat->bindValue(":param4", $password);
                    $resultat->bindValue(":param5", $age);
                    $resultat->bindValue(":param6", $role);
                    if ($resultat->execute()) {
                        echo "<p class='text-light'>Account created successfully!</p>";
                        // Redirect to index.php upon successful login
                        header("Location: login.php");
                        exit();
                    } else {
                        echo "<p class='text-light'>Error: " . $stmt->error . "</p>";
                    }
                }
            }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <style>body{
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
    text-align: right;
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
      color: black;
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
      background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
      border-radius: 15px;
      padding: 30px;
      max-width: 400px;
      margin: auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }
 .form-container label {
     margin-top: 10px;
     text-align: left;
     direction: ltr;
     width: 100%;
     color: #fff;
 }
 .form-container input[type="text"],
 .form-container input[type="email"],
 .form-container input[type="password"],
 .form-container input[type="number"] {
     width: 100%;
     padding: 8px;
     margin-top: 5px;
     border-radius: 5px;
     border: 1px solid #ddd;
 }
 .form-container input[type="radio"] {
     margin: 0 5px 10px 0;
 }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="Homepage"></a>
                    <li class="nav-item d-flex justify-content-center"><a style="color:black;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
        </div>
    </nav>
</header>

<!-- Main Content -->
<div class="p-5 bg-body-tertiary rounded-4" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
    <div class="container py-5 text-center">
        <h1>Signup Page</h1>
        <div class="form-container">
            <form method="POST" action="">
                <h2 style="color:black;">Registration</h2>
                
                <label style="color:black;" for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
        
                <label style="color:black;">Gender:</label>
                <input type="radio" name="gender" value="M" id="M" required><span style="color:black;">Male</span><br>
                <input type="radio" name="gender" value="F" id="F" required><span style="color:black;">Female</span><br>
        
                <label style="color:black;" for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
        
                <label style="color:black;" for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
        
                <label style="color:black;" for="age">Age:</label>
                <input type="number" id="age" name="age" placeholder="Enter your age" min="1" required>
        
                <label style="color:black;">Role:</label>
                <input type="radio" name="role" value="student" id="student" required><span style="color:black;">Student</span><br>
                <input type="radio" name="role" value="educator" id="educator" required><span style="color:black;">Educator</span><br>
                
                <hr style="color:black;" class="featurette-divider">
                <button type="submit" class="btn btn-outline-secondary">Create Account</button>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
