<?php
include 'dbcon.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

$query = "SELECT * FROM attendance";
$result = $con->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
    <div class="flex justify-center items-center min-h-screen">
        <div class="container w-full max-w-4xl bg-white rounded-lg p-8 shadow-lg">
            <h1 class="text-3xl mb-6 text-center">Admin Dashboard</h1>
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Employee ID</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Branch</th>
                        <th class="py-2 px-4">Tracker</th>
                        <th class="py-2 px-4">Last Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="py-2 px-4"><?php echo $row['name']; ?></td>
                        <td class="py-2 px-4"><?php echo $row['studentId']; ?></td>
                        <td class="py-2 px-4"><?php echo $row['email']; ?></td>
                        <td class="py-2 px-4"><?php echo $row['branch']; ?></td>
                        <td class="py-2 px-4"><?php echo $row['tracker']; ?></td>
                        <td class="py-2 px-4"><?php echo $row['last_update']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
