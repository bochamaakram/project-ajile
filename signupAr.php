<?php
require "connexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // قراءة البيانات من النموذج
    $name = trim($_POST['name']);
    $gender = $_POST['gender'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $age = (int)$_POST['age'];
    $role = $_POST['role'];

    // التحقق من المدخلات
    if (!empty($name) && !empty($gender) && filter_var($email, FILTER_VALIDATE_EMAIL) &&
        !empty($password) && $age >= 16 && !empty($role)) {
        
        // التحقق من رمز تأكيد دور المعلم
        if ($role === "educator" && (!isset($_POST['confirmation_code']) || $_POST['confirmation_code'] !== "661219")) {
            echo "<p class='text-danger'>رمز تأكيد المعلم غير صحيح.</p>";
            exit();
        }

        // تشفير كلمة المرور
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // إعداد الاستعلام
        $query = "INSERT INTO profile (name, gender, email, password, age, role) VALUES (:name, :gender, :email, :password, :age, :role)";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":gender", $gender);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $hashedPassword);
        $stmt->bindValue(":age", $age);
        $stmt->bindValue(":role", $role);

        // تنفيذ الاستعلام
        if ($stmt->execute()) {
            echo "<p class='text-success'>تم إنشاء الحساب بنجاح!</p>";
            header("Location: login.php");
            exit();
        } else {
            echo "<p class='text-danger'>خطأ: " . implode(", ", $stmt->errorInfo()) . "</p>";
        }
    } else {
        echo "<p class='text-danger'>يرجى تعبئة جميع الحقول بشكل صحيح.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>التسجيل</title>
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="css/home.css">
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
     border-radius: 25px;
     padding: 25px;
      max-width: 400px;
      margin: auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }
  .form-container label {
      margin-top: 8px;
      text-align: right;
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
      text-align: right;
  }
  .form-container input[type="radio"] {
      margin: 0 5px 10px 0;
  }
  #container{
  background-image: url("IMGG/471133.jpg");
    background-size: cover;
    height: 100vh;
 }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="logo" href="welcomAr.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="الصفحة الرئيسية"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center"><a style="color:black;" class="nav-link" aria-current="page" href="indexAr.php">الصفحة الرئيسية</a></li>
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
                
                <input type="text" id="name" name="name" placeholder= " أدخل إسمك الكامل" required>
        
                <label>الجنس:</label>
                <input type="radio" name="gender" value="M" id="M" required>ذكر
                <input type="radio" name="gender" value="F" id="F" style="margin-right: 55px;" required>أنثى<br>
        
                <label for="email">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
        
                <label for="password">كلمة المرور:</label>
                <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>
        
                <label for="age">العمر:</label>
                <input type="number" id="age" name="age" placeholder="أدخل عمرك" min="1" required>
        
                <label>الدور:</label>
                <input type="radio" name="role" value="student" id="student" required>طالب
                <input type="radio" name="role" value="educator" id="educator" style="margin-right: 55px;" required>معلم<br>
                
                <button type="submit" class="btn btn-outline-secondary" style="color:black">إنشاء حساب</button>
            </form>
        </div>
    </div>
</div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
// التحقق من دور المعلم
function verifyEducatorRole() {
    const educatorRole = document.getElementById("educator").checked;
    if (educatorRole) {
        const confirmationCode = prompt("يرجى إدخال رمز تأكيد المعلم:");
        if (!confirmationCode || confirmationCode.trim() !== "661219") {
            alert("الرمز غير صحيح. يرجى المحاولة مرة أخرى.");
            return false; // منع إرسال النموذج
        }
    }
    return true; // السماح بإرسال النموذج
}

// التحقق من العمر
function verifyAge() {
    const age = parseInt(document.getElementById("age").value, 10); // الحصول على قيمة العمر
    if (isNaN(age) || age < 16) {
        alert("يجب أن يكون عمرك 16 عامًا أو أكثر للتسجيل في هذا الموقع.");
        return false; // منع إرسال النموذج
    }
    return true; // السماح بإرسال النموذج
}

</script>
</body>
</html>
