<?php
session_start();
require 'connexion.php';
$err_mss = "";
// Redirect to login if required session variables are missing
if (!isset($_SESSION["name"]) || !isset($_SESSION["role"]) || !isset($_SESSION["email"]) || !isset($_SESSION["age"])|| !isset($_SESSION["password"]) ) {
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
if (!isset($_SESSION["description"])) {
    try {
        $query = "SELECT * FROM profile WHERE email = :email";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION["description"] = $result['description'] ?? '';
    } catch (PDOException $e) {
        echo "Error fetching profile data: " . $e->getMessage();
        exit();
    }
}

// Update description in the database on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
    // Sanitize input
    $description = filter_var($_POST["description"] ?? '', FILTER_SANITIZE_STRING);

    // Update session variables
    $_SESSION["description"] = $description;

    // Update database
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
    } elseif ($new_password !== $confirm_password || $c_password!==$_SESSION["password"]) {
        echo "Passwords do not match.";
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
            echo "Password changed successfully!";
        } else {
            echo "Failed to change the password.";
        }
    }
}
$description = htmlspecialchars($_SESSION["description"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingDung | Profile Template</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Account settings</h4>
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
                                </div>
                                <div class="text-right mt-3">
                                    <button type="submit" class="btn btn-primary" name="save">Save changes</button>&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                        <form method="post"><!-- Use 'op' as name to match PHP -->    
                            <label for="new_password">c Password:</label>
                            <input type="password" id="c_password" name="cp" class="form-control mb-1" required><br>
                            <label for="new_password">New Password:</label>
                            <input type="password" id="new_password" name="np" class="form-control mb-1" required><br> <!-- Use 'np' as name to match PHP -->
                            
                            <label for="confirm_password">Confirm New Password:</label>
                            <input type="password" id="confirm_password" class="form-control mb-1" name="c_np" required><br> <!-- Use 'c_np' as name to match PHP -->
                            
                            <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
                        </form>

                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                            <form method="POST" action="">
                                <label for="description">Profile Description:</label><br>
                                <textarea id="description" name="description" rows="4" cols="50"><?= htmlspecialchars($description); ?></textarea><br><br>
                                <button type="submit" name="update_profile">Update Description</button>
                            </form>
                                <div class="form-group">
                                <label class="form-label">Total Time Spent:</label>
                                <input type="text" class="form-control" value="<?php echo "$hours hours and $minutes minutes"; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">age</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($_SESSION["age"]); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="custom-select">
                                        <option>USA</option>
                                        <option selected>Canada</option>
                                        <option>UK</option>
                                        <option>Germany</option>
                                        <option>France</option>
                                    </select>
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
</body>
</html>