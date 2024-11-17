
<?php
session_start();
require "connexion.php"; // Ensure database connection

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

// Retrieve existing description from the database if not set in the session
if (!isset($_SESSION["description"])) {
    $query = "SELECT description FROM profile WHERE email = :email";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION["description"] = $result ? $result['description'] : '';
}

// Update description in the database and session on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["description"])) {
    $description = $_POST["description"];
    $_SESSION["description"] = $description; // Store in session

    // Update the database
    $query = "UPDATE profile SET description = :description WHERE email = :email";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
    $stmt->execute();
}


// Set description for display
$description = $_SESSION["description"];


?>
<style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .bg-image {
            background-image: url('./IMGG/360_F_330592858_EAqLmiadqxII1K1EmMvhbAMz6BAx14q5.jpg'); /* Set the image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            backdrop-filter: blur(10px); /* Blurs the card content */
            background-color: rgba(255, 255, 255, 0.7); /* Adds a translucent white background */
        }
        
    </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="bg-image">
        <div class="card w-50 shadow">
            <div class="card-header bg-info text-black d-flex justify-content-between align-items-center" style="height: 60px;">
                <h4 class="mb-0 d-flex align-items-center">
                    <img style="width: 25px; height: 25px; margin-right: 8px;" src="IMGG/user.png" alt="profile"> Profile Card
                </h4>
                <a href="index.php" class="btn btn-dark text-white d-flex align-items-center">
                    Home Page
                    <img style="width: 25px; height: 25px; margin-left: 8px;" src="./IMGG/enter.png" alt="Homepage">
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Name: <?php echo htmlspecialchars($_SESSION["name"]); ?></h5>
                <p class="card-text">Role: <?php echo htmlspecialchars($_SESSION["role"]); ?></p>
                <p class="card-text">Email: <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
                <p class="card-text">Total Time Spent: <?php echo "$hours hours and $minutes minutes"; ?></p>

                <h5 class="mt-4">Description</h5>
                <form method="post">
                    <div class="form-group">
                        <textarea name="description" class="form-control" rows="4" placeholder="Add Description to your Profile"><?php echo htmlspecialchars($description); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Description</button>
                </form>
            </div>    
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>