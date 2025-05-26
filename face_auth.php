<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['face_data'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Authentication</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS CDN -->
</head>
<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
<div class="container bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl text-center font-semibold mb-4">Face Authentication</h2>
    <video id="video" autoplay class="w-full mb-4"></video>
    <button id="capture" class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full">Capture Photo</button>
    <form id="faceAuthForm" action="verify_face.php" method="post" class="hidden">
        <input type="hidden" name="imageData" id="imageData">
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const video = document.getElementById('video');
    const captureButton = document.getElementById('capture');
    const imageDataInput = document.getElementById('imageData');
    const faceAuthForm = document.getElementById('faceAuthForm');

    // Access the device camera and stream to video element
    navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
        video.srcObject = stream;
    });

    captureButton.addEventListener('click', () => {
        const canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0);
        const imageData = canvas.toDataURL('image/jpeg');
        imageDataInput.value = imageData;
        faceAuthForm.submit();
    });
});
</script>

</body>
</html>
