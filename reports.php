<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

// Check if patient_id is provided in the URL
if (!isset($_GET['patient_id'])) {
    header("Location: reports.php");
    exit;
}

$patient_id = $_GET['patient_id'];

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "miketorres";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient's details
$sql = "SELECT * FROM patient WHERE patient_id = $patient_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $patient = $result->fetch_assoc();
} else {
    echo "No patient found with the given ID.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Medical Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .header, .footer {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            width: 100%;
            position: fixed;
        }
        .header {
            top: 0;
        }
        .footer {
            bottom: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            margin-top: 60px;
            margin-bottom: 60px;
            text-align: left;
        }
        h2 {
            margin-top: 0;
        }
        .details {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Patient Medical Report</h1>
    </div>
    <div class="container">
        <h2>Patient Details</h2>
        <div class="details">
            <span class="label">Patient ID:</span> <?php echo htmlspecialchars($patient['patient_id']); ?>
        </div>
        <div class="details">
            <span class="label">First Name:</span> <?php echo htmlspecialchars($patient['first_name']); ?>
        </div>
        <div class="details">
            <span class="label">Last Name:</span> <?php echo htmlspecialchars($patient['last_name']); ?>
        </div>
        <div class="details">
            <span class="label">Phone Number:</span> <?php echo htmlspecialchars($patient['phone_number']); ?>
        </div>
        <div class="details">
            <span class="label">Health Number:</span> <?php echo htmlspecialchars($patient['health_number']); ?>
        </div>
        <div class="details">
            <span class="label">Postal Code:</span> <?php echo htmlspecialchars($patient['postal_code']); ?>
        </div>
        <div class="details">
            <span class="label">Country:</span> <?php echo htmlspecialchars($patient['country']); ?>
        </div>
        <div class="details">
            <span class="label">Address:</span> <?php echo htmlspecialchars($patient['address']); ?>
        </div>
        <div class="details">
            <span class="label">Gender:</span> <?php echo htmlspecialchars($patient['gender']); ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </div>
</body>
</html>
