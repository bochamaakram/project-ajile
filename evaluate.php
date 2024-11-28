<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $fileName = $data['fileName'];
    $action = $data['action'];
    
    $targetDir = __DIR__ . "/audios/";
    $filePath = $targetDir . basename($fileName);
    
    if (file_exists($filePath)) {
        if ($action === 'good') {
            // If marked as "Good Job", delete the file
            unlink($filePath);
            echo "Audio file evaluated as 'Good Job' and deleted.";
        } elseif ($action === 'more') {
            // Handle "Needs More Work" without deleting the file
            echo "Audio file evaluated as 'Needs More Work'.";
        }
    } else {
        echo "Error: Audio file not found.";
    }
} else {
    echo "Error: Invalid request.";
}
?>
