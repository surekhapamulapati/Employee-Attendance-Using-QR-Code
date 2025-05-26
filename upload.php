<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $file = $_FILES['file'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed with error code " . $file['error']);
    }

    $imageData = file_get_contents($file['tmp_name']);
    $imageData = base64_encode($imageData);

    $query = "UPDATE registration SET qr_code_data = ? WHERE name = ? AND email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('sss', $imageData, $name, $email);

    if ($stmt->execute()) {
        echo "QR Code Data stored successfully";
    } else {
        echo "Failed to store QR Code Data";
    }
    $stmt->close();
    $con->close();
}
?>