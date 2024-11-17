<?php
// submit_audio.php
session_start();$targetDir = __DIR__ . "C:\xampp\htdocs\PHP\project agile\audios";

// Create the directory if it doesn't exist
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Check if the audio file was uploaded
if (isset($_FILES["audio"]) && $_FILES["audio"]["error"] === UPLOAD_ERR_OK) {
    $audioFile = $_FILES["audio"];
    
    // Generate a unique file name to avoid overwriting
    $uniqueFileName = uniqid("audio_", true) . ".mp3";
    $targetFilePath = $targetDir . $uniqueFileName;
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($audioFile["tmp_name"], $targetFilePath)) {
        echo "Audio file uploaded successfully!";
    } else {
        echo "Error: Could not save the audio file.";
    }
} else {
    echo "Error: No audio file uploaded.";
}
?>
