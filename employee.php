<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-500 via-green-400 to-purple-600">
<body class="min-h-screen flex justify-center items-center bg-gray-100">
    <div class="container flex flex-col md:flex-row items-center w-2/3 justify-center bg-white p-10 rounded-lg shadow-lg">
        <!-- Left side content -->
        <div class="left mx-14 text-center md:text-left">
            <h1 class="text-3xl font-semibold text-gray-800">Welcome to Employee Portal</h1><br>
            <p class="text-sm text-gray-400">
                Choose an option to either log in or register to access your attendance system.
            </p>
        </div>
        
        <!-- Right side with buttons -->
        <div class="w-2/4 flex flex-col items-center">
            <button onclick="window.location.href='login.php'" class="bg-blue-600 hover:bg-blue-700 text-white my-4 py-3 w-full rounded-lg transition-all font-bold">
                Employee Login
            </button>
            
            <button onclick="window.location.href='register.php'" class="bg-green-600 hover:bg-green-700 text-white my-4 py-3 w-full rounded-lg transition-all font-bold">
                Employee Registration
            </button>
            
            <div class="text-center w-full my-5 text-sm">
                <p class="text-gray-600">If you are an existing user, click Login. If you are a new user, click Registration to sign up.</p>
            </div>
        </div>
    </div>
</body>
</html>
