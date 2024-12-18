<?php
session_start();
require 'connexion.php';

$err_mss = "";
$err_mss1 = "";

// Redirect to login if required session variables are missing
if (!isset($_SESSION["name"], $_SESSION["role"], $_SESSION["email"], $_SESSION["age"], $_SESSION["password"])) {
    header("Location: login.php");
    exit();
}

// Initialize session variable for tracking total time spent
if (!isset($_SESSION["total_time_spent"])) {
    $_SESSION["total_time_spent"] = 0;
}

// Calculate time spent in the session
if (isset($_SESSION["login_time"])) {
    $current_time = time();
    $time_spent = $current_time - $_SESSION["login_time"];
    $_SESSION["total_time_spent"] += $time_spent;
    $_SESSION["login_time"] = $current_time;
}

// Convert total time spent to hours and minutes
$hours = floor($_SESSION["total_time_spent"] / 3600);
$minutes = floor(($_SESSION["total_time_spent"] % 3600) / 60);

// Fetch profile data if not already set
if (!isset($_SESSION["description"], $_SESSION["class"])) {
    try {
        $query = "SELECT * FROM profile WHERE email = :email";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set session variables
        $_SESSION["description"] = $result['description'] ?? '';
        $_SESSION["class"] = $result['class'] ?? '';
    } catch (PDOException $e) {
        echo "Error fetching profile data: " . $e->getMessage();
        exit();
    }
}

// Update description in the database on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
    $description = filter_var($_POST["description"] ?? '', FILTER_SANITIZE_STRING);
    $_SESSION["description"] = $description;

    try {
        $query = "UPDATE profile SET description = :description WHERE email = :email";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error updating profile: " . $e->getMessage();
    }
}


if (isset($_POST['change_password'])) {
    // Get the form inputs
    $c_password = $_POST['cp'];
    $new_password = $_POST['np'];
    $confirm_password = $_POST['c_np'];

    // Validate the passwords
    if (empty($new_password) || empty($confirm_password)|| empty($c_password)) {
        $err_mss= "all fields are required.";
        $error_occurred = true;
    } elseif ($new_password !== $confirm_password) {
         $err_mss="Passwords do not match";
         $error_occurred = true;
    }elseif ($c_password!==$_SESSION["password"]) {
        $err_mss="old Passwords  not correct";
        $error_occurred = true;
    } else {
        // Hash the new password (for security)
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
// Make sure to store user's email in the session after login
        

        // Update the password in the database
        $sql = "UPDATE profile SET password = :password WHERE email = :email";
        $stmt1 = $connexion->prepare($sql);
        $stmt1->bindValue(':password', $new_password, PDO::PARAM_STR);
        $stmt1->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
        $stmt1->execute();
        if ($stmt1) {
           
            $err_mss1= "Password changed successfully!";
             $error_occurred = true;
            session_destroy();
        } else {
             $err_mss= "Failed to change the password.";
             $error_occurred = true;
        }
    }
}

// Update class in the database on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_class'])) {
    $class = filter_var($_POST["class"] ?? '', FILTER_SANITIZE_STRING);
    $_SESSION["class"] = $class;

    try {
        $query = "UPDATE profile SET class = :class WHERE email = :email";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':class', $class, PDO::PARAM_STR);
        $stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error updating profile: " . $e->getMessage();
    }
}
// Fetch user_id if not set
if (!isset($_SESSION['user_id'])) {
    try {
        $query = "SELECT user_id FROM profile WHERE email = :email";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $result['user_id'];
    } catch (PDOException $e) {
        echo "Error fetching user ID: " . $e->getMessage();
        exit();
    }
}

// Fetch completed Juz data for the current user
try {
    $query = "SELECT * FROM student_completed_juz WHERE user_id = :user_id";
    $stmt = $connexion->prepare($query);
    $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $completed_juz = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching Juz data: " . $e->getMessage();
    exit();
}


// Escape output for safety
$description = htmlspecialchars($_SESSION["description"]);
$class = htmlspecialchars($_SESSION["class"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingDung | Profile Template</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>  
    @media (max-width: 600px) {
        .no-gutters>.col, .no-gutters>[class*=col-] {
            padding-right: 10px;
            padding-left: 10px;
}
    }
    </style>
</head>
<body style="background-image: url('IMGG/pixelcut-export.jpeg'); background-size: cover;
        background-repeat: no-repeat;">
    <div class="container light-style flex-grow-3 container-p-y ">
    <div class="container d-flex justify-content-between align-items-center mb-5">
        <h4 class="font-weight-bold py-3 mb-0">
            <img style="width: 25px; height: auto;" src="./IMGG/settings.png"> Account settings
        </h4>
        <a href="index.php" class="btn btn-secondary">Go Back <img style="width: 25px; height: auto;" src="./IMGG/enter.png"></a>
    </div> 
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <form method="POST">
                                <div class="card-body media align-items-center">
                                    <div class="media-body ml-4">
                                        <h1><?php echo htmlspecialchars($_SESSION["name"]); ?></h1>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($_SESSION["name"]); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Role</label>
                                        <input type="text" class="form-control mb-1" name="role" value="<?php echo htmlspecialchars($_SESSION["role"]); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" class="form-control mb-1" name="email" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>">
                                    </div>
                                    <form method="POST" action="">
                                        <label for="form-label">Profile class:</label><br>
                                        <textarea id="class" name="class" rows="1" cols="10" maxlength="255"><?= htmlspecialchars($class); ?></textarea><br><br>
                                        <button type="submit" name="update_class" class="btn btn-primary">Update class</button>
                                    </form>
                                </div>
                            </form>

                            
                        </div>
                        <div class="tab-pane fade mt-3" id="account-change-password">
                        <form method="post"><!-- Use 'op' as name to match PHP -->    
                            <label for="new_password">old Password:</label>
                            <input type="password" id="c_password" name="cp" class="form-control " required><br>
                            <label for="new_password">New Password:</label>
                            <input type="password" id="new_password" name="np" class="form-control " required><br>
                            
                            <label for="confirm_password">Confirm New Password:</label>
                            <input type="password" id="confirm_password" class="form-control" name="c_np" required><br> 
                            <h4 style="color: green;"><?php echo htmlspecialchars($err_mss1); ?></h4>
                            <h4 style="color: red;"><?php echo htmlspecialchars($err_mss); ?></h4>
                            
                            <button type="submit" name="change_password" class="btn btn-primary  mb-5">Change Password</button>
                        </form>

                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                            <form method="POST" action="">
                                <label for="description">Profile Description:</label><br>
                                <textarea id="description" name="description" rows="4" cols="50"><?= htmlspecialchars($description); ?></textarea><br><br>
                                <button type="submit" name="update_profile" class="btn btn-primary">Update Description</button>
                            </form>
                                <div class="form-group">
                                <label class="form-label">Total Time Spent:</label>
                                <input type="text" class="form-control" value="<?php echo "$hours hours and $minutes minutes"; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">age</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($_SESSION["age"]); ?>">
                                </div>
                                <div>
                                    <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>
                                                <th>Juz that you have completed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($completed_juz): ?>
                                                <?php foreach ($completed_juz as $row): ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($row['juz']); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="2" class="text-center">No Juz completed yet.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const errorOccurred = <?php echo json_encode($error_occurred); ?>;
    
    if (errorOccurred) {
        // Automatically switch to the "Change Password" tab if there's an error
        const changePasswordTab = document.querySelector('a[href="#account-change-password"]');
        const allTabs = document.querySelectorAll('.tab-pane');
        
        // Remove active class from all tabs
        allTabs.forEach(tab => tab.classList.remove('active', 'show'));
        document.querySelectorAll('.list-group-item').forEach(item => item.classList.remove('active'));

        // Activate "Change Password" tab
        document.querySelector('#account-change-password').classList.add('active', 'show');
        changePasswordTab.classList.add('active');
    }

    
});


    </script>
</body>
</html>
 

