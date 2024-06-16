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
    <title>Security Settings</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .modal-container {
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            color: #247700;
            margin-bottom: 20px;
        }
        .btn-close {
            background-color: #247700;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-close:hover {
            background-color: #1a5800;
        }
        .form-section {
            margin-top: 20px;
            text-align: left;
        }
        .form-section label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-section input[type="text"],
        .form-section input[type="password"] {
            width: calc(100% - 20px);
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .form-section .btn-update {
            background-color: #247700;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-section .btn-update:hover {
            background-color: #1a5800;
        }
    </style>
</head>
<body>
    <div class="modal-container">
        <h1>Security Settings</h1>
        <p>Adjust your security settings here.</p>
        
        <div class="form-section">
            <label for="currentPassword">Current Password:</label>
            <input type="password" id="currentPassword" name="currentPassword" required>
            
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required>
            
            <button class="btn-update" onclick="updateSecuritySettings()">Update Settings</button>
        </div>
        
        <button class="btn-close" onclick="closePopup()">Close</button>
    </div>

    <script>
        function closePopup() {
            window.location.href = 'home.php'; // Redirect to home.php
        }

        function updateSecuritySettings() {
            // Example function for updating security settings
            var currentPassword = document.getElementById('currentPassword').value;
            var newPassword = document.getElementById('newPassword').value;

            // Placeholder logic to update settings
            alert(`Updating security settings:
                Current Password: ${currentPassword}
                New Password: ${newPassword}`);
        }
    </script>
</body>
</html>
