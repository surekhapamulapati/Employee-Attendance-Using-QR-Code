<?php
include 'dbcon.php';

// Fetch the most recently updated values from the database using the 'id' column
$query = "SELECT * FROM registration ORDER BY last_update DESC LIMIT 1";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $studentId = $row['studentId'];
    $email = $row['email'];
    $branch = $row['branch'];
} else {
    die("No records found or error in query.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Generation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 800px;
            margin: 0 20px;
        }
        .id-card {
            width: 100%;
            max-width: 400px;
            height: 300px;
            border: 3px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            padding: 20px;
            position: relative;
            font-size: 16px;
            display: none; /* Initially hidden */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .id-card h4 {
            margin: 10px 0;
            font-size: 14px;
        }
        .id-card #qrcode {
            align-self: center; /* Center the QR code */
            margin-top: 10px;
        }
        .id-card img {
            width: 80px;
            height: 80px;
        }
        .button-container {
            margin-top: 20px;
            text-align: center;
        }
        .button-container button {
            margin: 10px;
            padding: 12px 20px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s;
        }
        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body class="min-h-screen flex justify-center items-center bg-gradient-to-r from-blue-300 via-green-300 to-purple-300">
    <div class="container">
        <div class="left">
            <img src="./logo.png" class="w-60" alt="">
            <h1 class="text-3xl text-center">Your ID Card</h1><br>
            <p class="text-sm text-gray-700 text-center mb-4">
                Generate and download your ID Card here.
            </p>
        </div>

        <div class="button-container">
            <button id="generateButton" class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg transition-all font-bold" type="button" onclick="generateIDCard()">Generate ID Card</button>
        </div>

        <div id="idCard" class="id-card">
            <h4 id="cardName"></h4>
            <h4 id="cardStudentId"></h4>
            <h4 id="cardEmail"></h4>
            <h4 id="cardBranch"></h4>
            <div id="qrcode"></div>
        </div><br>
        <p> Save the QR Code !</p>
        <div class="button-container">
            <button onclick="redirectToUpload()" class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg transition-all font-bold">Upload QR Code</button>
        </div>
    </div>

    <script>
        function generateIDCard() {
            document.getElementById('cardName').textContent = "Name: <?php echo $name; ?>";
            document.getElementById('cardStudentId').textContent = "Student ID: <?php echo $studentId; ?>";
            document.getElementById('cardEmail').textContent = "Email: <?php echo $email; ?>";
            document.getElementById('cardBranch').textContent = "Branch: <?php echo $branch; ?>";

            new QRCode(document.getElementById("qrcode"), {
                text: "Name: <?php echo $name; ?>, Student ID: <?php echo $studentId; ?>, Email: <?php echo $email; ?>, Branch: <?php echo $branch; ?>",
                width: 80,
                height: 80
            });

            document.getElementById('idCard').style.display = 'flex'; // Show the card
            document.getElementById('saveButton').style.display = 'inline-block'; // Show the save button
            document.getElementById('generateButton').style.display = 'none'; // Hide the generate button
        }

        function saveIDCard() {
            const idCard = document.querySelector("#idCard");
            html2canvas(idCard, {
                useCORS: true,  // Ensure that external images (like QR code) are captured
            }).then(canvas => {
                if (canvas) {
                    const link = document.createElement("a");
                    link.download = 'id_card.png'; // Set the filename
                    link.href = canvas.toDataURL("image/png");
                    link.click(); // This triggers the download

                    // Notify the user
                    alert("Your ID Card has been downloaded. Check your Downloads folder.");
                } else {
                    console.error("Canvas could not be created.");
                }
            }).catch(function (error) {
                console.error('Error capturing canvas:', error);
            });
        }

        function redirectToUpload() {
            window.location.href = "storeimg.php"; // Redirect to the image upload page
        }
    </script>
</body>
</html>
