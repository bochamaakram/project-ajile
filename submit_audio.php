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
<<<<<<< HEAD
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
=======
    echo "Error: No audio file uploaded.";
>>>>>>> 5bc19e4e0ff4af5203c4b50186ff157e8a52f94d
}
?>
