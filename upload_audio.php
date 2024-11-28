<?php
// upload_audio.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = __DIR__ . "/audios/";
    
<<<<<<< HEAD
    // Get additional data (student name and selected Juz)
    $studentName = isset($_POST['student_name']) ? trim($_POST['student_name']) : 'Unknown';
    $selectedJuz = isset($_POST['juz']) ? trim($_POST['juz']) : 'Unknown';

    // Validate and sanitize student name and Juz
    $studentName = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $studentName); // Replace invalid characters with underscores
    $selectedJuz = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $selectedJuz);
    // Validate the file type (e.g., only accept .mp3 and .webm files)
    $allowedExtensions = ['mp3', 'webm'];
    $fileExtension = strtolower(pathinfo($audioFile["name"], PATHINFO_EXTENSION));
    
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Error: Invalid file type. Only .mp3 and .webm files are allowed.";
        exit;
    }

    // Generate a file name based on student name, selected Juz, and a unique identifier
    $uniqueFileName = "{$studentName}_{$selectedJuz}_" . uniqid("audio_", true) . "." . $fileExtension;
    $targetFilePath = $targetDir . DIRECTORY_SEPARATOR . $uniqueFileName;
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($audioFile["tmp_name"], $targetFilePath)) {
        echo "Audio file uploaded successfully!";
=======
    if (isset($_FILES["audio"])) {
        $fileName = basename($_FILES["audio"]["name"]); // Filename with username
        $targetFilePath = $targetDir . $fileName;
        
        if (move_uploaded_file($_FILES["audio"]["tmp_name"], $targetFilePath)) {
            echo "Audio uploaded successfully.";
        } else {
            echo "Error uploading audio.";
        }
>>>>>>> 5bc19e4e0ff4af5203c4b50186ff157e8a52f94d
    } else {
        echo "No audio file received.";
    }
}
?>
