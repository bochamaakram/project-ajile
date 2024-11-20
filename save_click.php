<?php
session_start();

// Include database connection
require "connexion.php";

try {
    // Check if the user is authenticated
    if (!isset($_SESSION["user_id"])) {
        if (!empty($_POST['email'])) {
            // Ensure $email is sanitized
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

            // Prepare the query to fetch user details
            $query = "SELECT * FROM profile WHERE email = :param01";
            $resultat = $connexion->prepare($query); 
            $resultat->bindValue(":param01", $email);
            
            // Execute the query
            $resultat->execute(); 
            $x = $resultat->fetch(PDO::FETCH_ASSOC);

            // If a user is found, set session user_id
            if ($x) {
                $_SESSION["user_id"] = $x['user_id'];
            } else {
                echo json_encode(["status" => "error", "message" => "User not found"]);
                exit;
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Email not provided"]);
            exit;
        }
    }

    // Handle POST requests
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the JSON data sent from the client
        $data = json_decode(file_get_contents("php://input"), true);

        // Check for required data
        if (!isset($data['click_count'])) {
            echo json_encode(["status" => "error", "message" => "Missing click_count"]);
            exit;
        }

        // Get data from session and request
        $click_count = $data['click_count'];
        $user_id = $_SESSION["user_id"];
        $date = date("Y-m-d");

        // Prepare the insert query
        $stmt = $connexion->prepare("
            INSERT INTO button_clicks (id, click_date, click_count) 
            VALUES (:user_id, :click_date, :click_count)
        ");
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':click_date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':click_count', $click_count, PDO::PARAM_INT);

        // Execute the query and return appropriate response
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Click count updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Database error"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid request method"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
