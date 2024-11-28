<?php
session_start();
require "connexion.php";

// Fetch daily data
$dailyQuery = "SELECT click_date, SUM(click_count) AS total_clicks FROM button_clicks WHERE click_date >= CURDATE() - INTERVAL 7 DAY GROUP BY click_date ORDER BY click_date";
$dailyResult = $connexion->query($dailyQuery)->fetchAll(PDO::FETCH_ASSOC);

// Fetch weekly data
$weeklyQuery = "SELECT YEARWEEK(click_date, 1) AS week, SUM(click_count) AS total_clicks FROM button_clicks WHERE click_date >= CURDATE() - INTERVAL 28 DAY GROUP BY week ORDER BY week";
$weeklyResult = $connexion->query($weeklyQuery)->fetchAll(PDO::FETCH_ASSOC);

// Fetch monthly data
$monthlyQuery = "SELECT DATE_FORMAT(click_date, '%Y-%m') AS month, SUM(click_count) AS total_clicks FROM button_clicks WHERE click_date >= CURDATE() - INTERVAL 1 YEAR GROUP BY month ORDER BY month";
$monthlyResult = $connexion->query($monthlyQuery)->fetchAll(PDO::FETCH_ASSOC);

// Encode data as JSON for use in JavaScript
$data = [
    'daily' => $dailyResult,
    'weekly' => $weeklyResult,
    'monthly' => $monthlyResult
];
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    /* Container for the charts */
    .chart-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
    }
    /* Individual chart div */
    .chart-box {
        flex: 1 1 300px; /* Grow/shrink with a minimum width of 300px */
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
</head>
<body>
<h1 style="text-align: center;">Click Count Statistics</h1>

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
const data = <?php echo json_encode($data); ?>;
// Prepare data for daily chart
const dailyLabels = data.daily.map(item => item.click_date);
const dailyData = data.daily.map(item => item.total_clicks);
// Prepare data for weekly chart
const weeklyLabels = data.weekly.map(item => Week ${item.week});
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
</body> 