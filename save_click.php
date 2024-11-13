<?php
session_start();
require "connexion.php";

// Log errors to a file (helpful for debugging)
error_reporting(E_ALL);
ini_set('log_errors', 'On');
ini_set('error_log', 'error_log.txt');

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Read the JSON data sent from JavaScript
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if $data and click_count are set
    if (isset($data['click_count']) && isset($_SESSION["user_id"])) {
        $click_count = $data['click_count'];
        $user_id = $_SESSION["user_id"];

        // Check if there is already a record for today for this user
        $qer_test = "SELECT * FROM button_clicks WHERE click_date = CURDATE() AND id = :user_id";
        $resl = $connexion->prepare($qer_test);
        $resl->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $resl->execute();
        $vl = $resl->fetch(PDO::FETCH_ASSOC);

        if ($vl) {
            // Update existing record
            $new_count = $vl['click_count'] + $click_count;
            $query = "UPDATE button_clicks SET click_count = :new_count WHERE click_date = CURDATE() AND id = :user_id";
            $update_stmt = $connexion->prepare($query);
            $update_stmt->bindValue(":new_count", $new_count, PDO::PARAM_INT);
            $update_stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);

            if ($update_stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Click count updated successfully"]);
            } else {
                error_log("Database error on update: " . json_encode($update_stmt->errorInfo()));
                echo json_encode(["status" => "error", "message" => "Error updating click count"]);
            }
        } else {
            // Insert a new row for today
            $sql = "INSERT INTO button_clicks (click_date, click_count, id) VALUES (CURDATE(), :click_count, :user_id)";
            $resultat = $connexion->prepare($sql);
            $resultat->bindValue(":click_count", $click_count, PDO::PARAM_INT);
            $resultat->bindValue(":user_id", $user_id, PDO::PARAM_INT);

            if ($resultat->execute()) {
                echo json_encode(["status" => "success", "message" => "Click count saved successfully"]);
            } else {
                error_log("Database error on insert: " . json_encode($resultat->errorInfo()));
                echo json_encode(["status" => "error", "message" => "Error saving click count"]);
            }
        }
    } else {
        error_log("No click_count or user_id received in request");
        echo json_encode(["status" => "error", "message" => "No click_count or user_id received"]);
    }
} else {
    error_log("Invalid request method: " . $_SERVER["REQUEST_METHOD"]);
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
