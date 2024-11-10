<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES["audio"])) {
  $targetDir = __DIR__ . "/audios/";

  if (!is_dir($targetDir)) {
      mkdir($targetDir, 0777, true);
  }

  if (isset($_FILES["audio"]) && $_FILES["audio"]["error"] === UPLOAD_ERR_OK) {
      $audioFile = $_FILES["audio"];
      $uniqueFileName = uniqid("audio_", true) . ".webm";
      $targetFilePath = $targetDir . $uniqueFileName;
      
      if (move_uploaded_file($audioFile["tmp_name"], $targetFilePath)) {
          echo "Audio file uploaded successfully!";
      } else {
          echo "Error: Could not save the audio file.";
      }
  } else {
      echo "Error: No audio file uploaded.";
  }
} else {
    echo "Error: Invalid request.";
}
?>
