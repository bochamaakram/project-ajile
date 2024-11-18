<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    // Prepare the query
    $query = "SELECT * FROM profile WHERE email = :param01";
    $resultat = $connexion->prepare($query); 
    $resultat->bindValue(":param01", $email);
    
    // Execute the query
    $resultat->execute(); 
    $x = $resultat->fetch(PDO::FETCH_ASSOC);
    
    // If a user is found, set session user_id
    if ($x) {
        $_SESSION["user_id"] = $x['user_id'];
    }
}
require "connexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the JSON data sent from the client
    $data = json_decode(file_get_contents("php://input"), true);

    // Simplified check for required data
    if (!isset($data['click_count'])) {
        echo json_encode(["status" => "error", "message" => "Missing click_count"]);
        exit;
    }

    if (!isset($_SESSION["user_id"])) {
        echo json_encode(["status" => "error", "message" => "User not authenticated"]);
        exit;
    }
    $click_count = $data['click_count'];
    $user_id = $_SESSION["user_id"];
    $date = date("Y-m-d");
    
    try {
        // Check for an existing record
        $stmt = $connexion->prepare("
            INSERT INTO button_clicks (id, click_date, click_count) 
            VALUES (:user_id, :click_date, :click_count) 
            ON DUPLICATE KEY UPDATE click_count = click_count + VALUES(click_count)
        ");
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':click_date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':click_count', $click_count, PDO::PARAM_INT);
    
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Click count updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Database error"]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
