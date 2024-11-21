<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasbih</title>
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
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
    background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
    font-optical-sizing: auto;
    font-style: normal;
    direction: rtl;
    text-align: right;
        }
        .about-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #0F1035;
            height: 100vh;
            background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
            border-radius: 15px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .navbar-toggler .toggler-icon {
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
        .container {
            width: 90%;
            max-width: 400px;
            margin: 0 auto;
        }
        #clickable-div {
            width: 50vh;
            height: 30vh;
            background-color: #F8F6F4;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
            border-radius: 8px;
            text-align: center;
        }
        .top_right{
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 12px;
            color: #FFF;
        }
        .button-container {
            position: relative;
            display: inline-block;
        }
    </style>
</head>
<body>
</head>
<body>
<header>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light navbar navbar-light ">
            <div class="container-fluid">
                <a class="logo" href="welcom.php"><img style="width: 50px; height: auto;" src="Logo.png" alt="الصفحة الرئيسية"></a>
                <div class="collapse navbar-collapse -flex justify-content-center" id="navbarNav">
                </div>
                <li class="nav-item d-flex justify-content-left"><a style="color: black;" class="nav-link" href="profilAr.php"><img style="width: 20px; height: auto;" src="IMGG/profil.png" alt="الملف الشخصي"></a></li>
            </div>
        </nav>
    </div>
</header>
<div class="p-5 rounded-4 container-fluid d-flex justify-content-center  about-container">
    <div class="button-container">
    <button id="clickable-div"><h1 class="d-flex justify-content-center" id="phrase-display"></h1></button>
        <span style="color: black;" class="top_right" id="count"></span></div>
        <div class=" d-flex justify-content-center">
        <a href="Prayer.html"class=" d-flex justify-content-center"><button type="submit" class="d-flex justify-content-center btn btn-outline-secondary">Done</button></a>
        <button id="reset" class="d-flex justify-content-right btn btn-outline-secondary">Reset</button></div>
</div>
<script>
    let count = 0;
    const phrases = [" سبحان الله Subhan allah", "الحمد لله Alhamd lallah", " الله أكبر Allah akbar"];
    const specialPhrase = "لا إله إلا الله وحده لا شريك له، له الملك وله الحمد وهو على كل شيء قدير ";
    const clickableDiv = document.getElementById('clickable-div');
    const reset = document.getElementById('reset');
    const countDisplay = document.getElementById('count');
    const phraseDisplay = document.getElementById('phrase-display');

    // Increment the count and display phrase on each click
    clickableDiv.addEventListener('click', () => {
        count++;
        countDisplay.textContent = count;

        // Show the special phrase every 100 clicks
        if (count % 100 === 0) {
            phraseDisplay.textContent = specialPhrase;
        } else {
            // Cycle through phrases when not at a multiple of 100
            phraseDisplay.textContent = phrases[(count - 1) % phrases.length];
        }
    });
    reset.addEventListener('click', () => {
        count=0;
        countDisplay.textContent = count;
    });

    // Function to send the click count to the server
    function sendClickCount(clickCount) {
        fetch('save_click.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                click_count: clickCount
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Server response:', data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    
    // Call this function before the user leaves the page
    window.addEventListener('beforeunload', () => {
        sendClickCount(count); // Assume 'count' holds the number of clicks
    });
</script>
<div class="p-5 rounded-4 container-fluid d-flex justify-content-center about-container">
<?php
require "connexion.php";

try {
    // Fetch daily data
    $dailyQuery = "
        SELECT click_date, SUM(click_count) AS total_clicks 
        FROM button_clicks 
        WHERE click_date >= CURDATE() - INTERVAL 7 DAY 
        GROUP BY click_date 
        ORDER BY click_date
    ";
    $dailyResult = $connexion->query($dailyQuery)->fetchAll(PDO::FETCH_ASSOC);

    // Fetch weekly data
    $weeklyQuery = "
        SELECT YEARWEEK(click_date, 1) AS week, SUM(click_count) AS total_clicks 
        FROM button_clicks 
        WHERE click_date >= CURDATE() - INTERVAL 28 DAY 
        GROUP BY week 
        ORDER BY week
    ";
    $weeklyResult = $connexion->query($weeklyQuery)->fetchAll(PDO::FETCH_ASSOC);

    // Fetch monthly data
    $monthlyQuery = "
        SELECT DATE_FORMAT(click_date, '%Y-%m') AS month, SUM(click_count) AS total_clicks 
        FROM button_clicks 
        WHERE click_date >= CURDATE() - INTERVAL 1 YEAR 
        GROUP BY month 
        ORDER BY month
    ";
    $monthlyResult = $connexion->query($monthlyQuery)->fetchAll(PDO::FETCH_ASSOC);

    // Encode data as JSON for use in JavaScript
    $data = [
        'daily' => $dailyResult,
        'weekly' => $weeklyResult,
        'monthly' => $monthlyResult
    ];
} catch (PDOException $e) {
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    exit;
}
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* Styling */
    .chart-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
    }
    .chart-box {
        flex: 1 1 300px;
        max-width: 400px;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .chart-box h2 {
        font-size: 18px;
        margin-bottom: 10px;
    }
</style>
<h1 style="text-align: center;">tasbih Statistics</h1>
<div class="chart-container">
    <div class="chart-box">
        <h2>Daily Clicks (Last 7 Days)</h2>
        <canvas id="dailyChart"></canvas>
    </div>
    <div class="chart-box">
        <h2>Weekly Clicks (Last 4 Weeks)</h2>
        <canvas id="weeklyChart"></canvas>
    </div>
    <div class="chart-box">
        <h2>Monthly Clicks (Last 12 Months)</h2>
        <canvas id="monthlyChart"></canvas>
    </div>
</div>

<script>
// Data from PHP
const data = <?php echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;

// Prepare data for daily chart
const dailyLabels = data.daily.map(item => item.click_date);
const dailyData = data.daily.map(item => item.total_clicks);

// Prepare data for weekly chart
const weeklyLabels = data.weekly.map(item => `Week ${item.week}`);
const weeklyData = data.weekly.map(item => item.total_clicks);

// Prepare data for monthly chart
const monthlyLabels = data.monthly.map(item => item.month);
const monthlyData = data.monthly.map(item => item.total_clicks);

// Daily Chart
new Chart(document.getElementById("dailyChart"), {
    type: "line",
    data: {
        labels: dailyLabels,
        datasets: [{
            label: "Daily Clicks",
            data: dailyData,
            backgroundColor: "rgba(54, 162, 235, 0.2)",
            borderColor: "rgba(54, 162, 235, 1)",
            borderWidth: 1
        }]
    }
});

// Weekly Chart
new Chart(document.getElementById("weeklyChart"), {
    type: "bar",
    data: {
        labels: weeklyLabels,
        datasets: [{
            label: "Weekly Clicks",
            data: weeklyData,
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            borderColor: "rgba(75, 192, 192, 1)",
            borderWidth: 1
        }]
    }
});

// Monthly Chart
new Chart(document.getElementById("monthlyChart"), {
    type: "line",
    data: {
        labels: monthlyLabels,
        datasets: [{
            label: "Monthly Clicks",
            data: monthlyData,
            backgroundColor: "rgba(153, 102, 255, 0.2)",
            borderColor: "rgba(153, 102, 255, 1)",
            borderWidth: 1
        }]
    }
});
</script>
</div>

</body>
</html>
