<?php
include 'dbcon.php';
session_start();

if (isset($_POST['admin_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM registration WHERE email=? AND password=? AND is_admin=1";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $email;
        echo "<script>alert('Admin login successful!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Invalid email or password for admin!'); window.location.href='admin_login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
    <div class="container flex flex-col items-center w-2/3">
        <!-- Form container with column alignment for inputs and button -->
        <form action="admin_login.php" method="post" class=" bg-white rounded-lg p-10 shadow-lg flex flex-col items-center">
            <input type="email" name="email" placeholder="Admin Email" required class=" px-10 h-12 my-2 border border-gray-200 rounded-lg">
            <input type="password" name="password" placeholder="Admin Password" required class=" px-10 h-12 my-2 border border-gray-200 rounded-lg">
            <button type="submit" name="admin_login" class="bg-blue-600 hover:bg-blue-700 text-white my-2 py-4 px-6 rounded-lg font-bold">Login as Admin</button>
        </form>
    </div>
</body>
</html>
