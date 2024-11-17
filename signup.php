<?php
require "connexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $gender = $_POST['gender'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $age = (int)$_POST['age'];
    $role = $_POST['role'];

    // Validate inputs
    if (!empty($name) && !empty($gender) && filter_var($email, FILTER_VALIDATE_EMAIL) &&
        !empty($password) && $age >= 16 && !empty($role)) {
        
        // Check for educator confirmation code
        if ($role === "educator" && (!isset($_POST['confirmation_code']) || $_POST['confirmation_code'] !== "661219")) {
            echo "<p class='text-danger'>Invalid educator confirmation code.</p>";
            exit();
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL query
        $query = "INSERT INTO profile (name, gender, email, password, age, role) VALUES (:name, :gender, :email, :password, :age, :role)";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":gender", $gender);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $hashedPassword);
        $stmt->bindValue(":age", $age);
        $stmt->bindValue(":role", $role);

        // Execute the query
        if ($stmt->execute()) {
            echo "<p class='text-success'>Account created successfully!</p>";
            header("Location: login.php");
            exit();
        } else {
            echo "<p class='text-danger'>Error: " . implode(", ", $stmt->errorInfo()) . "</p>";
        }
    } else {
        echo "<p class='text-danger'>Please fill all the fields correctly.</p>";
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
        background-image: url("IMGG/471133.jpg");
        background-size: cover;
        background-repeat: no-repeat;
      }
      
  .about-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #0F1035;
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
      color: #333;
      direction: rtl;
      text-align: right;
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
     border-radius: 25px;
     padding: 25px;
     max-width: 400px;
     margin: auto;
     box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
 }
 .form-container label {
     margin-top: 8px;
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
     padding: 5px;
     margin-top: 5px;
     border-radius: 5px;
     border: 1px solid #ddd;
 }
 .form-container input[type="radio"] {
     margin: 0 5px 10px 0;
 }
 #container{
  background-image: url("IMGG/471133.jpg");
    background-size: cover;
    height: 100vh;
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
        <div class="container-fluid">
            <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="Homepage"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center"><a style="color:black;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Main Content -->
<div class="p-5 bg-body-tertiary rounded-4" id="container" >
    <div class="container py-5 text-center">
        <div class="form-container">
            <form method="POST" action="" id="registrationForm" onsubmit="return verifyEducatorRole() && verifyAge()">
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
        
                <label>Gender:</label>
                <input type="radio" name="gender" value="M" id="M" required>Male
                <input type="radio" name="gender" value="F" id="F" style="margin-left: 55px;" required>Female<br>
        
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
        
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
        
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" placeholder="Enter your age" min="1" required>
        
                <label>Role:</label>
                <input type="radio" name="role" value="student" id="student" required>Student
                <input type="radio" name="role" value="educator" id="educator" style="margin-left: 55px;" required>Educator<br>
                
                <button type="submit" class="btn btn-outline-secondary" style="color:black">Create Account</button>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
function verifyEducatorRole() {
    const educatorRole = document.getElementById("educator").checked;
    if (educatorRole) {
        const confirmationCode = prompt("Please enter the educator confirmation code:");
        if (!confirmationCode || confirmationCode.trim() !== "661219") {
            alert("Incorrect code. Please try again.");
            return false; // Prevent form submission
        }
    }
    return true; // Allow form submission
}

function verifyAge() {
    const age = parseInt(document.getElementById("age").value, 10); // Get age input value
    if (isNaN(age) || age < 16) {
        alert("You must be 16 years or older to register on this site.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}
</script>
</body>
</html>
