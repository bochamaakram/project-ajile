<?php
session_start();
require 'connexion.php';
$err_mss = "";
$err_mss1 = "";
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

    if (empty($new_password) || empty($confirm_password)|| empty($c_password)) {
        $err_mss= "جميع الحقول مطلوبة";
        $error_occurred = true;
    } elseif ($new_password !== $confirm_password) {
         $err_mss="كلمتا المرور غير متطابقتين";
         $error_occurred = true;
    }elseif ($c_password!==$_SESSION["password"]) {
        $err_mss="كلمة المرور القديمة غير صحيحة";
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
            session_destroy();
            $err_mss1 = "تم تغيير كلمة المرور بنجاح";
            $error_occurred = true;
        } else {
            $err_mss= "فشل في تغيير كلمة المرور.";
            $error_occurred = true;
        }
    }
}
$description = htmlspecialchars($_SESSION["description"]);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الإعدادات الشخصية</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom RTL rules if needed */
        body {
            text-align: right;
        }
        .container {
            direction: rtl;
        }
        .form-label, h4, label {
            text-align: right;
        }
        
    </style>
</head>
<body style="background-image: url('IMGG/pixelcut-export.jpeg'); background-size: cover;
        background-repeat: no-repeat;">
    <div class="container light-style flex-grow-3 container-p-y">
        <div class="container d-flex justify-content-between align-items-center mb-5">
            <h4 class="font-weight-bold py-3 mb-0">
                <img style="width: 25px; height: auto;" src="./IMGG/settings.png"> إعدادات الحساب
            </h4>
            <a href="index.php" class="btn btn-secondary">الرجوع <img style="width: 25px; height: auto;" src="./IMGG/enter.png"></a>
        </div>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">عام</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">تغيير كلمة المرور</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">معلومات</a>
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
                                        <label class="form-label">الاسم</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($_SESSION["name"]); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">الدور</label>
                                        <input type="text" class="form-control mb-1" name="role" value="<?php echo htmlspecialchars($_SESSION["role"]); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">البريد الإلكتروني</label>
                                        <input type="text" class="form-control mb-1" name="email" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade mt-3" id="account-change-password">
                            <form method="post">
                                <label for="new_password">كلمة المرور القديمة:</label>
                                <input type="password" id="c_password" name="cp" class="form-control " required><br>
                                <label for="new_password">كلمة المرور الجديدة:</label>
                                <input type="password" id="new_password" name="np" class="form-control " required><br>
                                <label for="confirm_password">تأكيد كلمة المرور الجديدة:</label>
                                <input type="password" id="confirm_password" class="form-control" name="c_np" required><br>
                                <h4 style="color: green;"><?php echo htmlspecialchars($err_mss1); ?></h4>
                                <h4 style="color: red;"><?php echo htmlspecialchars($err_mss); ?></h4>
                                <button type="submit" name="change_password" class="btn btn-primary mb-5">تغيير كلمة المرور</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <form method="POST" action="">
                                    <label for="description">وصف الملف الشخصي:</label><br>
                                    <textarea id="description" name="description" rows="4" cols="50"><?= htmlspecialchars($description); ?></textarea><br><br>
                                    <button type="submit" name="update_profile" class="btn btn-primary">تحديث الوصف</button>
                                </form>
                                <div class="form-group">
                                    <label class="form-label">إجمالي الوقت:</label>
                                    <input type="text" class="form-control" value="<?php echo "$hours ساعات و $minutes دقائق"; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">العمر</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($_SESSION["age"]); ?>">
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
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

