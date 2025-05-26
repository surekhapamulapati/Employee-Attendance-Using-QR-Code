<?php
include 'dbcon.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM registration WHERE email=? AND password=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['password']) {
            $_SESSION['email'] = $email;
            $_SESSION['face_data'] = $row['face_data'];
            echo "<script>alert('Password verified!'); window.location.href='face_auth.php';</script>";
        } else {
            echo "<script>alert('Invalid email or password!'); window.location.href='login.php';</script>";
        }
        
    } else {
        echo "<script>alert('User not found!'); window.location.href='login.php';</script>";
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
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
<body class="min-h-screen flex justify-center items-center">
    <div class="container flex flex-col md:flex-row items-center w-2/3 
     justify-center">
    <div class="left mx-14">
        <h1 class="mx-6 text-3xl">Login Form</h1><br>
        <p class="text-sm text-gray-700 mx-6">
            Employee Can Login Here To Mark Their Attendance!
        </p>
    </div>
    <div class="w-2/4">
        <form action="login.php" method="post" class="right flex flex-col w-full bg-white rounded-lg p-8 shadow-lg">
                <input type="email" class="px-4 h-12 my-2 border border-gray-200 border-1 rounded-lg" name="email" placeholder="Your Email" required>
                <input type="password" class="px-4 h-12 my-2 border border-gray-200 border-1 rounded-lg" name="password" placeholder="Password" required>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white my-2 py-3 rounded-lg transition-all font-bold" name="login">Login</button>
            <span class="text-blue-600 text-center hover:underline my-2 cursor-pointer">
                Forgot password?
            </span>       

        </form>
        <div class="text-center w-full my-5 text-sm">
            <a href="register.php" class="text-blue-700 underline"><br>Go To Registration Form</a>
             If You Are A New User!
        </div>
    </div>
    </div>
</body>
</html>