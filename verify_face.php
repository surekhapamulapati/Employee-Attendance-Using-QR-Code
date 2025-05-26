<?php
include 'dbcon.php';
session_start();

if (!isset($_SESSION['email']) || !isset($_POST['imageData'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];
$imageData = $_POST['imageData'];
$imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
$imageData = str_replace(' ', '+', $imageData);
$decodedImage = base64_decode($imageData);

$tempImagePath = tempnam(sys_get_temp_dir(), 'face_') . '.jpg';
file_put_contents($tempImagePath, $decodedImage);

$faceData = $_SESSION['face_data'];
$faceData = str_replace('data:image/jpeg;base64,', '', $faceData);
$faceData = str_replace(' ', '+', $faceData);
$decodedFaceData = base64_decode($faceData);

$storedFacePath = tempnam(sys_get_temp_dir(), 'stored_face_') . '.jpg';
file_put_contents($storedFacePath, $decodedFaceData);

$command = escapeshellcmd("python3 face_recognition.py $tempImagePath $storedFacePath");
$output = shell_exec($command);
$result = json_decode($output, true);

if ($result['status'] == 'Face matched') {
    echo "<script>alert('Face matched! Attendance marked.'); window.location.href='attendance.php';</script>";
} else {
    echo "<script>alert('Face matched!'); window.location.href='attendance.php';</script>";
}

unlink($tempImagePath);
unlink($storedFacePath);
?>
