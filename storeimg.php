<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
<body class="min-h-screen flex justify-center items-center">
    <div class="container flex flex-col md:flex-row items-center w-2/3 
     justify-center">
    <div class="left mx-14">
        <img src="./logo.png" class="w-60" alt="">
        <h1 class="mx-6 text-3xl">Upload QR Code</h1>
        <p class="text-sm text-gray-700 mx-6">
            Click your picure or add an account
        </p>
    </div>
    <div class="w-2/4">
        <form id="uploadForm" class="right flex flex-col w-full bg-white rounded-lg p-8 shadow-lg">
                <input type="text" id="name" class="px-4 h-12 my-2 border border-gray-200 border-1 rounded-lg" name="name" placeholder="Your Name" required>
                <input type="email" id="email" class="px-4 h-12 my-2 border border-gray-200 border-1 rounded-lg" name="email" placeholder="Email" required>
                <input type="file" id="fileInput" class="px-4 h-12 my-2 border border-gray-200 border-1 rounded-lg" name="file" accept="image/png" required>
                <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white my-2 py-3 rounded-lg transition-all font-bold" onclick="uploadQRCode()">Upload</button>
        </form>
    </div>
</div>

<script>
    function uploadQRCode() {
        const form = document.getElementById('uploadForm');
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();

        xhr.open('POST', 'upload.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                alert('QR Code Data stored successfully');window.location.href='login.php';
            }
        };
        xhr.send(formData);
    }
</script>
</body>
</html>