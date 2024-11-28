<?php
session_start();
require "connexion.php"; // Assumes connexion.php has your PDO connection

// Ensure educator's class is available in the session
if (!isset($_SESSION['class'])) {
    die("Educator class not set. Please log in as an educator.");
}
$educator_class = $_SESSION['class'];

// Fetch all students in the educator's class
$query = "SELECT * FROM profile WHERE role = 'student' AND class = :class";
$resultat = $connexion->prepare($query);
$resultat->bindValue(":class", $educator_class);
$resultat->execute();
$students = $resultat->fetchAll(PDO::FETCH_ASSOC);

// Insert Juz as completed for a student
if (isset($_POST["mark_completed"]) && isset($_POST["user_id"]) && isset($_POST["juz"])) {
    $user_id = $_POST["user_id"];
    $juz = $_POST["juz"];

    // Insert the completed Juz into the database
    $query = "INSERT INTO student_completed_juz (user_id, juz) VALUES(:user_id, :juz)";
    $result = $connexion->prepare($query);
    $result->bindValue(":user_id", $user_id);
    $result->bindValue(":juz", $juz);

    if ($result->execute()) {
        echo "<div class='alert alert-success'>Juz $juz marked as completed for student.</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to mark Juz as completed.</div>";
    }
}

// Insert feedback and Juz into the database
if (isset($_POST["Submit_feedback"]) && isset($_POST["user_id"])) {
    $connexion->beginTransaction();

    try {
        // Insert feedback
        $feedback_query = "INSERT INTO students_feedback (user_id, feedback) VALUES(:user_id, :feedback)";
        $feedback_stmt = $connexion->prepare($feedback_query);
        $feedback_stmt->bindValue(":user_id", $_POST["user_id"]);
        $feedback_stmt->bindValue(":feedback", $_POST["feedback"]);
        $feedback_stmt->execute();

        // Insert Juz as read
        if (isset($_POST["juz"])) {
            $juz_query = "INSERT INTO student_read_juz (user_id, juz) VALUES(:user_id, :juz)";
            $juz_stmt = $connexion->prepare($juz_query);
            $juz_stmt->bindValue(":user_id", $_POST["user_id"]);
            $juz_stmt->bindValue(":juz", $_POST["juz"]);
            $juz_stmt->execute();
        }

        $connexion->commit();
    } catch (Exception $e) {
        $connexion->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profiles</title>
    <link rel="icon" href="Logo.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #D2E9E9, #E3F4F4);
            font-family: "Urbanist", sans-serif;
            font-weight: 500;
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
            text-align: center;
        }
        .table th {
            background-color: #C4DFDF;
            color: #0F1035;
        }
        textarea, select {
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
            <div class="container-fluid">
                <a class="navbar-brand" href="welcome.php"><img src="Logo.png" alt="Homepage" style="width: 50px;"></a>
                <div class="navbar-nav">
                    <a class="nav-link" href="profil.php"><img src="IMGG/profil.png" alt="Profile" style="width: 20px;"></a>
                    <a class="nav-link" href="distroy.php">Log out</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="p-5 rounded-4 container-fluid" style="background: linear-gradient(135deg, #D2E9E9, #E3F4F4);">
        <div class="main-wrapper">
            <h1 class="text-center">Student Profiles</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Feedback</th>
                        <th>Juz</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($student['name']); ?></td>
                        <td><?php echo htmlspecialchars($student['gender']); ?></td>
                        <td>
                            <form action="" method="post">
                                <textarea class=" btn btn-outline-secondary" name="feedback" rows="1" cols="20" placeholder="Enter your notes here..."></textarea>
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($student['user_id']); ?>">
                        </td>
                        <td>
    <div class="btn-group">
        <form action="your_processing_script.php" method="POST">
            <div class="col-7"><select name="juz" class="form-select btn btn-outline-secondary" required>
                <option value="" disabled selected>Select Juz</option>
                <?php for ($i = 1; $i <= 30; $i++): ?>
                    <option value="<?php echo $i; ?>">Juz <?php echo $i; ?></option>
                <?php endfor; ?>
            </select></div>
            <div class="col-5">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($student['user_id']); ?>">
            <input type="submit" name="mark_completed" value="Mark as Completed" class="btn btn-outline-secondary"></div>
        </form>
    </div>
</td>
                        <td>
                                <input type="submit" name="Submit_feedback" value="Submit Feedback" class="btn btn-outline-secondary">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<footer>
    <div class="container-fluid w-100">
        <div class="d-flex justify-content-center">
            <ul class="navbar-nav">
                <hr class="featurette-divider">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item d-flex justify-content-center"><a style="color:black;" class="nav-link" aria-current="page" href="index.php">Home Page</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="quran.php">Quran</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="quranaudio.php">Quran audio</a></li>
                    <li class="nav-item d-flex justify-content-center "><a style="color: black;" class="nav-link" href="bookpage.php">Library</a></li>
                </ul>
                <hr style="color:aliceblue;" class="featurette-divider">
                <p style="color:aliceblue;"> <a style="color:black;" class="nav-link" class="nav-link"  href="https://github.com/bochamaakram">&copy; 2024 All rights reserved</a></p>
            </ul>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
