<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["name"]) || !isset($_SESSION["role"]) || !isset($_SESSION["email"])) {
    header("Location: loginAr.php");
    exit();
}

// Calculate time spent in the current session
if (isset($_SESSION["login_time"])) {
    $current_time = time();
    $time_spent = $current_time - $_SESSION["login_time"]; // Time since last calculation
    $_SESSION["total_time_spent"] += $time_spent; // Add to total time spent
    $_SESSION["login_time"] = $current_time; // Reset login time for the next calculation
}

// Convert total time spent to hours and minutes
$hours = floor($_SESSION["total_time_spent"] / 3600);
$minutes = floor(($_SESSION["total_time_spent"] % 3600) / 60);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بطاقة الملف الشخصي</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&display=swap" rel="stylesheet">

    <style>
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
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f0f0; direction: rtl; }
        .card { display: flex; background: white; border-radius: 15px; width: 400px; height: 320px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); flex-direction: column; }
        .header { height: 120px; background: linear-gradient(90deg, rgba(238, 77, 58, 1) 0%, rgba(255, 186, 0, 1) 100%); }
        .profile-info { padding: 20px; padding-top: 40px; text-align: right; }
        .profile-info h2 { font-size: 1.5em; color: #333; }
        .profile-info p { color: #777; margin: 5px 0; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header"></div>
        <div class="profile-info">
            <h2>الاسم: <?php echo htmlspecialchars($_SESSION["name"]); ?></h2>
            <p>الدور: <?php echo htmlspecialchars($_SESSION["role"]); ?></p>
            <p>البريد الإلكتروني: <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
            <p>الوقت الكلي المستغرق: <?php echo "$hours ساعة و $minutes دقيقة"; ?></p>
        </div>
    </div>
</body>
</html>
