<?php
session_start();
require "connexion.php"; // يفترض أن "connexion.php" يحتوي على الاتصال بقاعدة البيانات PDO
// جلب جميع ملفات الطلاب الشخصية
$query = "SELECT * FROM profile WHERE role = 'student'";
$resultat = $connexion->prepare($query);
$resultat->execute();
$students = $resultat->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["Submit_feedback"]) && isset($_POST["user_id"])) {
    $query = "INSERT INTO students_feedback (user_id, feedback) VALUES(:user_id, :feedback)";
    $result = $connexion->prepare($query);
    $result->bindValue(":user_id", $_POST["user_id"]);
    $result->bindValue(":feedback", $_POST["feedback"]);

    if ($result->execute()) {
        $feedback = $_POST["feedback"];
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملفات الطلاب الشخصية</title>
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
            font-family: "Urbanist", sans-serif;
            font-weight: 500;
            direction: rtl;
            text-align: right;
        }
        .main-wrapper {
            margin: 20px;
            background-color: #F8F6F4;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: right; /* Align text to the right for RTL */
        }
        .table th {
            background-color: #C4DFDF;
            color: #0F1035;
        }
        textarea {
            resize: none;
        }
        header, footer {
            background-color: #C4DFDF;
        }
        .navbar-toggler:focus {
            box-shadow: none !important;
        }
        .navbar-toggler {
            border: none !important;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid ">
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon top-bar"></span>
                    <span class="toggler-icon middle-bar"></span>
                    <span class="toggler-icon bottom-bar"></span>
                </button>
                <a class="navbar-brand" href="welcome.php"><img src="Logo.png" alt="الصفحة الرئيسية" style="width: 50px;"></a>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center"><a style="color:black;" class="nav-link" aria-current="page" href="index.php">الصفحة الرئيسية</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="quran.php">القرآن</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="quranaudio.php">تلاوة القرآن</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="bookpage.php">المكتبة</a></li>
                </ul>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link" href="profil.php"><img src="IMGG/profil.png" alt="الملف الشخصي" style="width: 20px;"></a>
                    <a class="nav-link" href="distroy.php">تسجيل الخروج</a>
                </div>
            </div>
        </nav>
    </header>

<div class="p-5 rounded-4 container-fluid " style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
    <div class="main-wrapper ">
        <h1 class="text-center">ملفات الطلاب الشخصية</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الجنس</th>
                    <th>التعليقات</th>
                    <th>الإجراء</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student): ?>
    <tr>
        <td><?php echo htmlspecialchars($student['name']); ?></td>
        <td><?php echo htmlspecialchars($student['gender']); ?></td>
        <td>
            <form action="" method="post">
                <textarea class="mb-2 col-10 btn btn-outline-secondary" name="feedback" rows="1" cols="25" placeholder="ادخل ملاحظة عن التلميد..."></textarea>
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($student['user_id']); ?>">
        </td>
        <td>
                <input type="submit" name="Submit_feedback" value="حفظ الملاحضة" class="btn btn-outline-secondary">
            </form>
        </td>
    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center"><a style="color:black;" class="nav-link" aria-current="page" href="index.php">الصفحة الرئيسية</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="quran.php">القرآن</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="quranaudio.php">تلاوة القرآن</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="bookpage.php">المكتبة</a></li>
                </ul>
                <hr style="color:aliceblue;" class="featurette-divider">
                <p style="color:aliceblue;"> <a style="color:black;" class="nav-link" class="nav-link"  href="https://github.com/bochamaakram">&copy; 2024 جميع الحقوق محفوظة</a></p>
            </ul>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
