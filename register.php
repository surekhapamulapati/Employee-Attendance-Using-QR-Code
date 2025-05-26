<?php
include('dbcon.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $studentId = $_POST['studentId'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $branch = $_POST['branch'];
    $faceData = $_POST['faceData'];
    $query = "INSERT INTO registration (name, studentId, email, password, branch, face_data) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param('ssssss', $name, $studentId, $email, $password, $branch, $faceData);
    if ($stmt->execute()) {
        echo "<script>alert('Registered successfully'); window.location.href='idGeneration.php';</script>";
    } else {
        echo "<script>alert('Registration failed');</script>";
    }
    $stmt->close();
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
<body class="min-h-screen flex justify-center items-center">
    <div class="container flex flex-col md:flex-row items-center w-2/3 justify-center">
        <div class="left mx-14">
            <h1 class="mx-6 text-3xl">Registration Form</h1><br>
            <p class="text-sm text-gray-700 mx-6">New Employee Can Register Here!</p>
        </div>
        <div class="w-2/4">
            <form method="post" class="right flex flex-col w-full bg-white rounded-lg p-8 shadow-lg">
                <input type="text" class="px-4 h-12 my-2 border border-gray-200 rounded-lg" name="name" placeholder="Your Name" required>
                <input type="text" class="px-4 h-12 my-2 border border-gray-200 rounded-lg" name="studentId" placeholder="Employee ID" required>
                <input type="email" class="px-4 h-12 my-2 border border-gray-200 rounded-lg" name="email" placeholder="Your Email" required>
                <input type="password" class="px-4 h-12 my-2 border border-gray-200 rounded-lg" name="password" placeholder="Password" required>
                <select name="branch" class="px-4 h-12 my-2 border border-gray-200 rounded-lg" required>
                    <option value="" disabled selected>Select Your Branch</option>
                    <option value="CSE">CSE</option>
                    <option value="CSBS">CSBS</option>
                    <option value="DS">DS</option>
                    <option value="CSIT">CSIT</option>
                    <option value="CSIOT">CSIOT</option>
                    <option value="IT">IT</option>
                    <option value="CIVIL">CIVIL</option>
                    <option value="AI">AI</option>
                    <option value="AIML">AIML</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                </select>        
                <button type="button"  class="bg-blue-600 hover:bg-blue-700 text-white my-2 py-3 rounded-lg transition-all font-bold" onclick="captureFaceData()">Capture Face Data</button>
        <video id="video" autoplay></video>
        <input type="hidden" name="faceData" id="faceData">                
                <button type="submit" name="submit" id="submitBtn" class="bg-blue-600 hover:bg-blue-700 text-white my-2 py-3 rounded-lg transition-all font-bold">Register</button>
                <canvas id="canvas"></canvas>

            </form>
        </div>
    </div>
<script>
    function captureFaceData() {
        const video = document.getElementById('video');
        const constraints = { video: true };
        navigator.mediaDevices.getUserMedia(constraints).then((stream) => {
            video.srcObject = stream;
        }).catch((error) => {
            console.error('Error accessing media devices.', error);
        });

        video.addEventListener('play', () => {
            setTimeout(() => {
                const canvas = document.getElementById('canvas');
                const context = canvas.getContext('2d');
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                const faceData = canvas.toDataURL('image/png');
                document.getElementById('faceData').value = faceData;
                video.srcObject.getTracks().forEach(track => track.stop());
                alert('Face data captured successfully');
            }, 3000); // Wait for 3 seconds to ensure video stream is fully started
        });
    }
</script>
</body>
</html>