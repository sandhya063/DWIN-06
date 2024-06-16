<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== TRUE) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dallas Family Clinic Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset and global styles */
        body {
            font-family: 'Roboto', sans-serif;
            background: url('images/hos.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        /* Container styling */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        /* Header styling */
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #247700;
        }

        .header h1 {
            margin: 0;
            color: #247700;
            font-size: 2em;
        }

        .header img {
            height: 70px;
            width: auto;
        }

        /* Navigation styling */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 2px solid #ddd;
            margin-top: 20px;
        }

        .nav a {
            color: #fff;
            background-color: #247700;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .nav a:hover {
            background-color: #1a5800;
        }

        .dropdown-toggle {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 200px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            top: 100%;
            right: 0;
            padding-top: 10px;
        }

        .dropdown-content a {
            color: white;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a:hover {
            background-color: #f4f4f4;
        }

        .dropdown-toggle:hover .dropdown-content {
            display: block;
        }

        /* Content section styling */
        .content {
            padding: 20px 0;
            display: grid;
            gap: 20px;
        }

        .section {
            background-color: #fafafa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .section h2 {
            margin-bottom: 15px;
            color: #247700;
            font-size: 1.3em;
        }

        .section ul {
            list-style: none;
            padding: 0;
        }

        .section ul li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .section ul li:last-child {
            border-bottom: none;
        }

        .section ul li i {
            margin-right: 10px;
            color: #247700;
        }

        .section ul li a {
            color: #247700;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .section ul li a:hover {
            color: #1a5800;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="images/logo.png" alt="Dallas Family Clinic Logo"> <h1>Dallas Family Clinic Dashboard</h1>
        </div>
        <div class="nav">
            <a href="home.php"><i class="fas fa-home"></i> Home</a>
            <a href="viewpatient.php"><i class="fas fa-user-injured"></i> Patients</a>
            <a href="appointments.php"><i class="fas fa-calendar-check"></i> Appointments</a>
            <a href="doctor.php"><i class="fas fa-user-md"></i> Doctors</a>
            <div class="dropdown-toggle">
                <a href="#" onclick="openSettingsPage('settings.php')"><i class="fas fa-cog"></i> Settings <i class="fas fa-angle-down"></i></a>
                <div class="dropdown-content">
                    <a href="#" onclick="openSettingsPage('settings.php')">General Settings</a>
                    <a href="#" onclick="openSettingsPage('profile.php')">Profile</a>
                    <a href="#" onclick="openSettingsPage('security.php')">Security</a>
                </div>
            </div>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
        <div class="content">
            <div class="section">
                <h2>Quick Links:</h2>
                <ul>
                    <li><i class="fas fa-user-plus"></i> <a href="addpatient.php">Add Patient</a></li>
                    <li><i class="fas fa-calendar-alt"></i> <a href="viewappointments.php">View Appointments</a></li>
                    <li><i class="fas fa-file-medical-alt"></i> <a href="reports.php">Generate Report</a></li>
                </ul>
            </div>
            <div class="section">
                <h2>Recent Activities:</h2>
                <ul>
                    <li><i class="fas fa-plus-circle"></i> Patient John Doe added</li>
                    <li><i class="fas fa-calendar-plus"></i> Appointment for Jane Smith scheduled</li>
                </ul>
            </div>
            <div class="section">
                <h2>Notifications:</h2>
                <ul>
                    <li><i class="fas fa-envelope"></i> New message from Dr. Smith</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function openSettingsPage(url) {
            window.open(url, '_blank');
        }
    </script>
</body>
</html>
