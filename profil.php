
<?php
session_start();
require 'connexion.php';






// Redirect to login if required session variables are missing
if (!isset($_SESSION["name"]) || !isset($_SESSION["role"]) || !isset($_SESSION["email"]) || !isset($_SESSION["age"])) {
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

// Retrieve user data from the database if not already in session
if (!isset($_SESSION["description"]) || !isset($_SESSION["Instagram"]) || !isset($_SESSION["LinkedIn"]) || 
    !isset($_SESSION["Google"]) || !isset($_SESSION["Twitter"]) || !isset($_SESSION["Facebook"])) {
    try {
        $query = "SELECT * FROM profile WHERE email = :email";
        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION["description"] = $result['description'] ?? '';
        $_SESSION["Twitter"] = $result['Twitter'] ?? '';
        $_SESSION["Instagram"] = $result['Instagram'] ?? '';
        $_SESSION["LinkedIn"] = $result['LinkedIn'] ?? '';
        $_SESSION["Google"] = $result['Google'] ?? '';
        $_SESSION["Facebook"] = $result['Facebook'] ?? '';
    } catch (PDOException $e) {
        echo "Error fetching profile data: " . $e->getMessage();
        exit();
    }
}

// Update description and social media links in the database and session on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $description = filter_var($_POST["description"] ?? '', FILTER_SANITIZE_STRING);
    $Twitter = filter_var($_POST["Twitter"] ?? '', FILTER_SANITIZE_URL);
    $Instagram = filter_var($_POST["Instagram"] ?? '', FILTER_SANITIZE_URL);
    $LinkedIn = filter_var($_POST["LinkedIn"] ?? '', FILTER_SANITIZE_URL);
    $Google = filter_var($_POST["Google"] ?? '', FILTER_SANITIZE_URL);
    $Facebook = filter_var($_POST["Facebook"] ?? '', FILTER_SANITIZE_URL);

    // Update session variables
    $_SESSION["description"] = $description;
    $_SESSION["Twitter"] = $Twitter;
    $_SESSION["Instagram"] = $Instagram;
    $_SESSION["LinkedIn"] = $LinkedIn;
    $_SESSION["Google"] = $Google;
    $_SESSION["Facebook"] = $Facebook;

    // Update database
    try {
        $query = "UPDATE profile SET 
                  description = :description, 
                  Twitter = :Twitter, 
                  Instagram = :Instagram, 
                  LinkedIn = :LinkedIn, 
                  Google = :Google, 
                  Facebook = :Facebook 
                  WHERE email = :email";

        $stmt = $connexion->prepare($query);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':Twitter', $Twitter, PDO::PARAM_STR);
        $stmt->bindValue(':Instagram', $Instagram, PDO::PARAM_STR);
        $stmt->bindValue(':LinkedIn', $LinkedIn, PDO::PARAM_STR);
        $stmt->bindValue(':Google', $Google, PDO::PARAM_STR);
        $stmt->bindValue(':Facebook', $Facebook, PDO::PARAM_STR);
        $stmt->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
        $stmt->execute();

        
    } catch (PDOException $e) {
        echo "Error updating profile: " . $e->getMessage();
    }
}




// Set variables for display
$description = $_SESSION["description"];
$Twitter = $_SESSION["Twitter"];
$Instagram = $_SESSION["Instagram"];
$LinkedIn = $_SESSION["LinkedIn"];
$Google = $_SESSION["Google"];
$Facebook = $_SESSION["Facebook"];
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
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
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
                                        <div class="alert alert-warning mt-3">
                                            Your email is not confirmed. Please check your inbox.<br>
                                            <a href="javascript:void(0)">Resend confirmation</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mt-3">
                                    <button type="submit" class="btn btn-primary" name="save">Save changes</button>&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                            <form method="POST" action="">
                                <label for="description">Profile Description:</label><br>
                                <textarea id="description" name="description" rows="4" cols="50"><?= htmlspecialchars($description); ?></textarea><br><br>
                                <button type="submit">Update Description</button>
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
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="+0 (123) 456 7891">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" value>
                                </div>
                            </div>
                        </div>
                    <div class="tab-pane fade" id="account-social-links">
                        <form method="POST" action="" id="account-social-links">
                            <label for="Twitter">Twitter:</label>
                            <input class="form-control" type="url" id="Twitter" name="Twitter" value="<?= htmlspecialchars($Twitter); ?>"><br>

                            <label for="Instagram">Instagram:</label>
                            <input class="form-control" type="url" id="Instagram" name="Instagram" value="<?= htmlspecialchars($Instagram); ?>"><br>

                            <label for="LinkedIn">LinkedIn:</label>
                            <input class="form-control" type="url" id="LinkedIn" name="LinkedIn" value="<?= htmlspecialchars($LinkedIn); ?>"><br>

                            <label for="Google">Google:</label>
                            <input class="form-control" type="url" id="Google" name="Google" value="<?= htmlspecialchars($Google); ?>"><br>

                            <label for="Facebook">Facebook:</label>
                            <input type="url" id="Facebook" name="Facebook" value="<?= htmlspecialchars($Facebook); ?>"><br><br>

                            <button type="submit">Update Profile</button>
                        </form>
                    </div>
                        <div class="tab-pane fade" id="account-connections">
                            <div class="card-body">
                                <button type="button" class="btn btn-twitter">Connect to
                                    <strong>Twitter</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i
                                            class="ion ion-md-close"></i> Remove</a>
                                    <i class="ion ion-logo-google text-google"></i>
                                    You are connected to Google:
                                </h5>
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="f9979498818e9c9595b994989095d79a9694">[email&#160;protected]</a>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-facebook">Connect to
                                    <strong>Facebook</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-instagram">Connect to
                                    <strong>Instagram</strong></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone comments on my article</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone answers on my forum
                                            thread</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone follows me</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly product updates</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly blog digest</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
