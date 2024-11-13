<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["name"]) || !isset($_SESSION["role"]) || !isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// Calculate time spent in the current session
if (isset($_SESSION["login_time"])) {
    $current_time = time();
    $time_spent = $current_time - $_SESSION["login_time"];
    $_SESSION["total_time_spent"] += $time_spent;
    $_SESSION["login_time"] = $current_time;
}

// Convert total time spent to hours and minutes
$hours = floor($_SESSION["total_time_spent"] / 3600);
$minutes = floor(($_SESSION["total_time_spent"] % 3600) / 60);

// Check if a description has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["description"])) {
    $_SESSION["description"] = $_POST["description"];
}

$description = isset($_SESSION["description"]) ? $_SESSION["description"] : ""; 

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بطاقة الملف الشخصي</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Amiri', serif; /* Optional: Add an Arabic font */
            direction: rtl;
            text-align: right;
        }
        .bg-image {
            background-image: url(IMGG/back.gif);
            background-size: cover;
            background-repeat: no-repeat ;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            text-align: right;
            background: rgba(240, 240, 240, 0.6);
            color: #333;
        }
        .form-control {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="bg-image">
        <div class="card w-50 shadow">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">بطاقة الملف الشخصي</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($_SESSION["name"]); ?>: الاسم </h5>
                <p class="card-text">الدور: <?php echo htmlspecialchars($_SESSION["role"]); ?></p>
                <p class="card-text">البريد الإلكتروني: <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
                <p class="card-text">الوقت الكلي المستغرق: <?php echo "$hours ساعة و $minutes دقيقة"; ?></p>
                <h5 class="mt-4">الوصف</h5>
                <form method="post">
                    <div class="form-group">
                        <textarea name="description" id="textarea" class="card form-control" rows="4"><?php echo htmlspecialchars($description); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">حفظ الوصف</button>
                </form>
                
                <!-- Go Back Button -->
                <a href="index.php" class="btn btn-secondary mt-3">العودة</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
