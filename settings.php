<?php
session_start();

// Example user data (replace with actual user data retrieval)
$userName = "Admin";
$userPhoto = "images/admin.jpg"; // Replace with actual path or URL

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
    <title>Settings</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            overflow: hidden; /* Prevent scrolling behind the modal */
        }
        .modal {
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            padding: 20px;
            max-width: 800px;
            width: 100%;
            overflow-y: auto; /* Enable scrolling if content exceeds modal height */
            max-height: calc(100vh - 40px); /* Take into account padding */
            position: relative;
        }
        header {
            background-color: #247700;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            border-radius: 10px 10px 0 0;
            margin-bottom: 20px;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            border-top: 2px solid #247700;
            margin-top: 20px;
            border-radius: 0 0 10px 10px;
        }
        footer p {
            margin: 0;
        }
        .content {
            padding: 20px 0;
        }
        .user-info {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .user-info img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .user-info h2 {
            color: #247700;
            margin: 0;
            font-size: 1.8em;
        }
        .settings-section {
            text-align: left;
            margin-bottom: 30px;
        }
        .settings-section h2 {
            color: #247700;
            border-bottom: 2px solid #247700;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .setting-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .setting-item:last-child {
            border-bottom: none;
        }
        .setting-item label {
            font-weight: bold;
            margin-right: 10px;
        }
        .setting-item input[type="checkbox"] {
            margin-right: 5px;
        }
        .setting-item input[type="text"],
        .setting-item textarea {
            width: 100%;
            padding: 5px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .btn-secondary {
            background-color: #247700;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #1a5800;
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
    </style>
</head>
<body>
    <div class="modal">
        <header>
            <h1>Dallas Family Clinic Dashboard</h1>
        </header>
        <div class="content">
            <div class="user-info">
                <img src="<?php echo $userPhoto; ?>" alt="User Photo">
                <h2><?php echo $userName; ?></h2>
            </div>
            
            <div class="settings-section">
                <h2>Notification Settings</h2>
                <div class="setting-item">
                    <label for="emailNotifications">Email Notifications:</label>
                    <input type="checkbox" id="emailNotifications" name="emailNotifications" checked> Enable
                </div>
                <div class="setting-item">
                    <label for="smsNotifications">SMS Notifications:</label>
                    <input type="checkbox" id="smsNotifications" name="smsNotifications"> Enable
                </div>
            </div>
            
            <div class="settings-section">
                <h2>Profile Settings</h2>
                <div class="setting-item">
                    <label for="changePassword">Change Password:</label>
                    <button class="btn-secondary" onclick="openChangePassword()">Change Password</button>
                </div>
                <div class="setting-item">
                    <label for="editProfile">Edit Profile:</label>
                    <button class="btn-secondary" onclick="openEditProfile()">Edit Profile</button>
                </div>
            </div>

            <div class="settings-section">
                <h2>Clinic Information</h2>
                <div class="setting-item">
                    <label for="clinicName">Clinic Name:</label>
                    <input type="text" id="clinicName" name="clinicName" value="Dallas Family Clinic">
                </div>
                <div class="setting-item">
                    <label for="clinicAddress">Clinic Address:</label>
                    <textarea id="clinicAddress" name="clinicAddress" rows="3">123 Main St, Dallas, TX</textarea>
                </div>
                <div class="setting-item">
                    <label for="contactEmail">Contact Email:</label>
                    <input type="email" id="contactEmail" name="contactEmail" value="info@dallasclinic.com">
                </div>
                <div class="setting-item">
                    <label for="contactPhone">Contact Phone:</label>
                    <input type="tel" id="contactPhone" name="contactPhone" value="+1 (123) 456-7890">
                </div>
                <div class="setting-item">
                    <label for="workingHours">Working Hours:</label>
                    <input type="text" id="workingHours" name="workingHours" value="Mon-Fri: 8:00 AM - 5:00 PM">
                </div>
            </div>

            <button class="btn-close" onclick="closeModal()">Close Settings</button>
        </div>
        <footer>
            <p>&copy; <?php echo date('Y'); ?> Dallas Family Clinic. All rights reserved.</p>
        </footer>
    </div>

    <script>
        function openChangePassword() {
            // Placeholder action for opening change password page
            alert("Open change password page");
        }

        function openEditProfile() {
            // Placeholder action for opening edit profile page
            alert("Open edit profile page");
        }

        function closeModal() {
            var modal = document.querySelector('.modal');
            modal.style.display = 'none'; // Hide the modal
            document.body.style.overflow = 'auto'; // Restore scrolling
            window.location.href = 'home.php'; // Redirect to home.php
        }
    </script>
</body>
</html>
