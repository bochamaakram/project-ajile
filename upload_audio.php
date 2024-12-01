<?php
session_start();

// Set the target directory for uploads
$targetDir = __DIR__ . DIRECTORY_SEPARATOR . "audios";

// Create the directory if it doesn't exist
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Check if the audio file was uploaded
if (isset($_FILES["audio"]) && $_FILES["audio"]["error"] === UPLOAD_ERR_OK) {
    $audioFile = $_FILES["audio"];
    // Get student name from the session
    $studentName = $_SESSION["name"] ?? "Unknown";

    // Validate and sanitize the student name
    $studentName = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $studentName); // Replace invalid characters with underscores

    // Validate the file type (e.g., only accept .mp3 and .webm files)
    $allowedExtensions = ['mp3', 'webm'];
    $fileExtension = strtolower(pathinfo($audioFile["name"], PATHINFO_EXTENSION));
    
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "Error: Invalid file type. Only .mp3 and .webm files are allowed.";
        exit;
    }

    // Generate a unique file name based on the student name and a unique identifier
    $uniqueFileName = "{$studentName}_" . uniqid("audio_", true) . "." . $fileExtension;
    $targetFilePath = $targetDir . DIRECTORY_SEPARATOR . $uniqueFileName;
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($audioFile["tmp_name"], $targetFilePath)) {
        echo "Audio file uploaded successfully!";
    } else {
        echo "Error: Could not save the audio file.";
    }
} else {
    // Handle different upload errors
    $errorMessages = [
        UPLOAD_ERR_INI_SIZE   => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
        UPLOAD_ERR_FORM_SIZE  => "The uploaded file exceeds the MAX_FILE_SIZE directive specified in the HTML form.",
        UPLOAD_ERR_PARTIAL    => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE    => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION  => "A PHP extension stopped the file upload.",
    ];
    
    $errorCode = $_FILES["audio"]["error"];
    $errorMessage = $errorMessages[$errorCode] ?? "Unknown error occurred.";
    
    echo "Error: $errorMessage";
}
?>