<?php
session_start();
include 'dbcon.php';

$query = "SELECT file_data FROM users WHERE email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('s', $_SESSION['email']);
$stmt->execute();
$result = $stmt->get_result();
$known_faces = [];

while ($row = $result->fetch_assoc()) {
    $data = base64_decode($row['file_data']);
    $known_face_path = tempnam(sys_get_temp_dir(), 'known_face');
    file_put_contents($known_face_path, $data);
    $known_faces[] = $known_face_path;
}

$stmt->close();
$con->close();

$command = escapeshellcmd("python3 face_recognition.py " . implode(" ", $known_faces));
$output = shell_exec($command);
$result = json_decode($output, true);

foreach ($known_faces as $face_path) {
    unlink($face_path);
}

if ($result['status'] == 'Face matched') {
    echo "<script>alert('Face matched! Attendance marked.'); window.location.href='success_page.php';</script>";
} else {
    echo "<script>alert('Face matched!'); window.location.href='attendance.php';</script>";
}
?>
