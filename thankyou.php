<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:#FFFFFF;
            margin: 0;
        }
        .container {
            padding: 20px;  /* Added padding for more space */
            border-radius: 8px;
            width: 60%;  /* Reduced width */
            max-width: 500px;  /* Max width to make it smaller */
            text-align: center;
        }
        h2 {
            color: #007BFF;
            font-size: 42px;  /* Adjusted font size */
        }
        p {
            font-size: 18px;
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
<div class="container">
    <h2>Thank You!</h2>
    <p>Your attendance record has been successfully viewed. We appreciate your promptness.</p>
    <p>You will be redirected shortly...</p>
</div>

<script>
    // Optional: You can add a redirect to another page after a few seconds
    setTimeout(function() {
        window.location.href = "index.php";  // Redirect to login page after 5 seconds
    }, 5000); // 5000ms = 5 seconds
</script>

</body>
</html>
