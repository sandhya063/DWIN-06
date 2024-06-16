<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Management - Dallas Family Clinic</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .header {
            background-color: #247700;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .header img {
            vertical-align: middle;
            width: 50px; /* Adjust size as needed */
            margin-right: 10px;
        }

        .header h1 {
            display: inline;
            font-size: 1.8rem;
            margin: 0;
        }

        .nav {
            background-color: #78ab4e; /* Updated to green */
            padding: 10px 0;
            text-align: center;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav a:hover {
            background-color: #95c975; /* Lighter green on hover */
        }

        .dropdown-toggle {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a:hover {
            background-color: #555;
        }

        .dropdown-toggle:hover .dropdown-content {
            display: block;
        }
        
        /* Form Styles */
        form {
            width: 45%;
            margin: 15px auto;
            padding: 20px;
            background-color: #f0f8f2; /* Light green background */
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #247700; /* Green label color */
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        textarea {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #247700; /* Green button background */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1rem;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #1a5800; /* Darker green on hover */
        }

        .cancel-btn {
            background-color: #ccc;
            color: #333;
        }

        .cancel-btn:hover {
            background-color: #999;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header img {
                width: 40px; /* Adjust size as needed */
            }
            .header h1 {
                font-size: 1.5rem;
            }
            .nav a {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
            .dropdown-content {
                min-width: 140px;
            }
        }
    </style>
    <script>
        function openSettingsPage(page) {
            // Redirect to the specified settings page
            window.location.href = page;
        }

        function validateForm() {
            var patientId = document.getElementById("patient_id").value;
            var doctorId = document.getElementById("doctor_id").value;
            var appointmentDate = document.getElementById("appointment_date").value;
            var appointmentTime = document.getElementById("appointment_time").value;
            var reason = document.getElementById("reason").value;

            if (patientId.trim() === "" || doctorId.trim() === "" || appointmentDate.trim() === "" || appointmentTime.trim() === "" || reason.trim() === "") {
                alert("Please fill in all fields.");
                return false;
            }
            return true;
        }

        function confirmCancel() {
            if (confirm("Are you sure you want to cancel?")) {
                window.location.href = 'appointments.php';
            }
        }
    </script>
</head>
<body>
    <div class="header">
        <img src="images/logo.png" alt="Dallas Family Clinic Logo">
        <h1>Dallas Family Clinic</h1>
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
    <h1>Appointment Form</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
        <div class="input-group">
            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" required>
        </div>
        <div class="input-group">
            <label for="doctor_id">Doctor ID:</label>
            <input type="text" id="doctor_id" name="doctor_id" required>
        </div>
        <div class="input-group">
            <label for="appointment_date">Appointment Date:</label>
            <input type="date" id="appointment_date" name="appointment_date" required>
        </div>
        <div class="input-group">
            <label for="appointment_time">Appointment Time:</label>
            <input type="time" id="appointment_time" name="appointment_time" required>
        </div>
        <div class="input-group">
            <label for="reason">Reason for Visit:</label><br>
            <textarea id="reason" name="reason" rows="4" required></textarea>
        </div>
        <input type="submit" value="Save">
        <input type="button" value="Cancel" onclick="confirmCancel()" class="cancel-btn">
    </form>
</body>
</html>
