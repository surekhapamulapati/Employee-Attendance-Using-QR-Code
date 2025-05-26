<?php
include 'dbcon.php';
session_start();

if (!isset($_SESSION['email'])) {
    echo "<script>alert('Invalid access!'); window.location.href='login.php';</script>";
    exit;
}

$email = $_SESSION['email'];

$query = "SELECT * FROM attendance WHERE email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$attendanceData = $result->fetch_assoc();
$stmt->close();

if (!$attendanceData) {
    echo "<script>alert('No attendance record found!'); window.location.href='attendance.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Record</title>
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
            padding: 10px;  /* Reduced padding */
            border-radius: 8px;
            width: 60%;  /* Reduced width */
            max-width: 500px;  /* Max width to make it smaller */
            text-align: center;
        }
        h2 {
            color: #007BFF;
            font-size: 42px;  /* Reduced font size */
        }
        table {
            margin-top: 20px;
            width: 60%;  /* Reduced width */
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }
        th, td {
            padding: 8px;  /* Reduced padding */
            border: 2px solid gray;  /* Thinner border */
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        td {
            background-color: #f8f8f8;
        }
    </style>
</head>
<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
<div class="container">
    <h2>Attendance Record</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Branch</th>
            <th>Tracker</th>
            <th>Last Update</th>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($attendanceData['name']); ?></td>
            <td><?php echo htmlspecialchars($attendanceData['studentId']); ?></td>
            <td><?php echo htmlspecialchars($attendanceData['email']); ?></td>
            <td><?php echo htmlspecialchars($attendanceData['branch']); ?></td>
            <td><?php echo htmlspecialchars($attendanceData['tracker']); ?></td>
            <td><?php echo htmlspecialchars($attendanceData['last_update']); ?></td>
        </tr>
    </table>
</div>

<script>
    // Redirect to thank you page after 5 seconds
    setTimeout(function() {
        window.location.href = "thankyou.php";
    }, 2000); // 5000ms = 5 seconds
</script>

</body>
</html>
