<?php
include 'dbcon.php';
session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Please login first'); window.location.href='login.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $email = $_SESSION['email'];
    $file = $_FILES['file'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed with error code " . $file['error']);
    }

    $imageData = file_get_contents($file['tmp_name']);
    $imageData = base64_encode($imageData);

    $query = "SELECT qr_code_data FROM registration WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($storedQRCodeData);
    $stmt->fetch();
    $stmt->close();

    if ($imageData === $storedQRCodeData) {
        // Fetch user information for updating attendance
        $query = "SELECT name, studentId, email, branch FROM registration WHERE email = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($name, $studentId, $email, $branch);
        $stmt->fetch();
        $stmt->close();

        // Check if record exists in attendance table
        $query = "SELECT tracker FROM attendance WHERE email = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Update existing record
            $query = "UPDATE attendance SET tracker = tracker + 1 WHERE email = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
        } else {
            // Insert new record
            $query = "INSERT INTO attendance (name, studentId, email, branch, tracker) VALUES (?, ?, ?, ?, 1)";
            $stmt = $con->prepare($query);
            $stmt->bind_param("ssss", $name, $studentId, $email, $branch);
            $stmt->execute();
        }
        $stmt->close();

        echo "<script>alert('QR Code Data matches! Attendance recorded.'); window.location.href='new.php';</script>";
    } else {
        echo "<script>alert('QR Code Data does not match!');</script>";
    }
}
?>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <style></style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
<body class="min-h-screen flex justify-center items-center">
    <div class="container flex flex-col md:flex-row items-center w-2/3 
     justify-center">
    <div class="left mx-14">

        <h1 class="mx-6 text-3xl">Attendance Uploading</h1><br>
        <p class="text-sm text-gray-700 mx-6">
            Upload Your QR Code For Mark Attendance!
        </p>
    </div>
    <div class="w-2/4">
        <form method="post" class="right flex flex-col w-full bg-white rounded-lg p-8 shadow-lg" enctype="multipart/form-data" >
                <input type="file" class="px-4 h-12 my-2 border border-gray-200 border-1 rounded-lg" name="file" placeholder="Upload Your QR Code" accept="image/png" required>
                <button type="submit" name="submit" id="submitBtn" class="bg-blue-600 hover:bg-blue-700 text-white my-2 py-3 rounded-lg transition-all font-bold">Upload</button>

        </form>

    </div>
    </div>
</body>
</html>