<?php
// upload_audio.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = __DIR__ . "/audios/";
    
    if (isset($_FILES["audio"])) {
        $fileName = basename($_FILES["audio"]["name"]); // Filename with username
        $targetFilePath = $targetDir . $fileName;
        
        if (move_uploaded_file($_FILES["audio"]["tmp_name"], $targetFilePath)) {
            echo "Audio uploaded successfully.";
        } else {
            echo "Error uploading audio.";
        }
    } else {
        echo "No audio file received.";
    }
}
?>
