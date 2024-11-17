<?php
session_start();
if ($_SESSION['role'] !== 'educator') {
    echo json_encode(["error" => "Unauthorized"]);
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
$stmt = $pdo->query("SELECT id, student_id, file_path FROM audio_submissions WHERE status = 'pending'");
$pendingAudios = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($pendingAudios);
?>